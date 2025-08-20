<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function makePersonalPage()
    {
        return view('dashboard.components.personal');
    }

    public function makeBillingPage(Request $request)
    {
        $url = config('endpoints.prefix_auth') . config('endpoints.prefix') . 'me';

        $jwt = $request->cookie('access_token');

        $response = Http::acceptJson()
            ->withToken($jwt)
            ->post($url);

        $answer = $response->json();

        return view('dashboard.components.billing', ['balance' => $answer['user']['balance'] ?? 0]);
    }

    public function makeAutoPage()
    {
        return view('dashboard.components.auto');
    }

    public function makePoliciesPage(Request $request)
    {
        $url = config('endpoints.prefix_policy') . config('endpoints.prefix_policy_v1') . 'me';

        $jwt = $request->cookie('access_token');

        $response = Http::acceptJson()
            ->withToken($jwt)
            ->get($url);

        $statusMap = [
            0 => 'Новый',
            1 => 'Расчет выполнен',
            2 => 'Оплата успешна',
            3 => 'Оплата не прошла',
            4 => 'Ошибка',
            5 => 'Полис оплачен и активирован',
            6 => 'Полис отменен',
            7 => 'Авто не прошло проверку по безопасности',
            8 => 'Авто проверено автоматически',
            9 => 'Авто на дополнительной проверке',
            10 => 'Ошибка оплаты',
            11 => 'Ошибка НСИС',
            12 => 'Возврат средств',
        ];

        return view('dashboard.components.policies', ['policies' => $response->json() ?? [], 'status' => $statusMap]);
    }

    public function makeOsagoPage()
    {
        return view('dashboard.components.osago');
    }
}
