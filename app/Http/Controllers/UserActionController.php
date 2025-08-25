<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\OsagoPolicy;

class UserActionController extends Controller
{
    public function updatePersonals(Request $request)
    {
        $url = config('endpoints.prefix_auth') . config('endpoints.prefix') . 'me';

        $jwt = $request->cookie('access_token');

        $response = Http::acceptJson()
            ->withToken($jwt)
            ->put($url, $request->all());

        \Log::info('Отправляю в сервис', [
            2 => $response->json()
        ]);

        $answer = $response->json();

        if (isset($answer['user'])) {
            $userData = $answer['user'];
            $user = User::with(['docs', 'driverLicense'])->where('email', $userData['email'])->first();
            $user->update([
                'name' => $userData['name'],
                'birth_date' => $userData['birth_date']
            ]);

            $user->docs()->delete();
            $user->driverLicense()->delete();

            $user->docs()->create($answer['user']['docs']);
            $user->driverLicense()->create($answer['user']['driver_license']);
        }

        return response()->json($response->json(), $response->status());
    }

    public function updateBills(Request $request)
    {
        $url = config('endpoints.prefix_auth') . config('endpoints.prefix') . 'balance';

        $jwt = $request->cookie('access_token');

        $response = Http::acceptJson()
            ->withToken($jwt)
            ->post($url, $request->all());

        \Log::info('Отправляю в сервис', [
            2 => $request->all()
        ]);

        $answer = $response->json();

        if (isset($answer['user'])) {
            $userData = $answer['user'];
            $user = User::findOrFail(auth()->id());

            $balance = $userData['balance'] + $user->balance;

            $user->update([
                'balance' => $balance
            ]);
            $user->refresh();

            \Log::info($user->balance);
        }

        return response()->json($response->json(), $response->status());
    }
    public function updateAuto(Request $request)
    {
        $url = config('endpoints.prefix_auth') . config('endpoints.prefix') . 'auto';

        $jwt = $request->cookie('access_token');

        $response = Http::acceptJson()
            ->withToken($jwt)
            ->post($url, $request->all());

        \Log::info('Отправляю в сервис', [
            2 => $response->json()
        ]);

        $answer = $response->json();

        if (isset($answer['user'])) {
            $userData = $answer['user'];
            $user = User::with(['vehicle'])->where('email', $userData['email'])->first();

            $user->vehicle()->delete();

            $user->vehicle()->create($answer['user']['vehicle']);
        }

        return response()->json($response->json(), $response->status());
    }


    public function calc(Request $request)
    {
        $url = config('endpoints.prefix_policy') . config('endpoints.prefix_policy_v1') . 'calc';

        $jwt = $request->cookie('access_token');

        $response = Http::acceptJson()
            ->withToken($jwt)
            ->post($url, $request->all());

        \Log::info('Отправляю в policy сервис', [
            'url' => $url,
            'calc request' => $request->all()
        ]);

        $answer = $response->json();

        \Log::info('Ответ из policy сервис', [
            'answer' => $answer
        ]);

        if (empty($answer)) {
            return response()->json([
                'error' => true,
                'message' => 'Системная ошибка при расчете полиса'
            ], $response->status());
        }

        if (isset($answer['error']) && $answer['error'] === true) {
            return response()->json([
                'error' => true,
                'message' => $answer['message'],
                'status' => $answer['policy_status']
            ], 200);
        }

        OsagoPolicy::updateOrCreate(
            ['user_id' => $answer['user_id']],
            [
                'condition' => $answer['policy']['condition'],
                'price' => $answer['price'],
                'number' => $answer['number']
            ]
        );

        return response()->json($response->json(), $response->status());
    }

    public function payment(Request $request)
    {
        $url = config('endpoints.prefix_billing') . config('endpoints.prefix_billing_v1') . 'payment';

        $jwt = $request->cookie('access_token');

        $response = Http::acceptJson()
            ->withToken($jwt)
            ->withHeader('Idempotency-Key', $request->header('Idempotency-Key'))
            ->post($url, $request->all());

        \Log::info('Отправляю в запрос в billing-service', [
            'request' => $request->all()
        ]);

        $answer = $response->json();


        \Log::info('Ответ из billing-service', [
            'answer' => $response->json()
        ]);


        return response()->json($response->json(), $response->status());
    }

    public function file(Request $request)
    {
        $url = config('endpoints.prefix_storage') . config('endpoints.prefix_storage_v1') . 'me';

        $jwt = $request->cookie('access_token');

        $number =  $number = $request->query('number');

        $response = Http::acceptJson()
            ->withToken($jwt)
            ->post($url, ['number' => $number]);

        $answer = $response->json();
        
        if (isset($answer['file'])) {
            $pdfBinary = base64_decode($answer['file']);

            return response($pdfBinary, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="policy-' . $answer['number'] . '.pdf"',
            ]);
        };
        return response()->json($response->json(), $response->status());
    }
}
