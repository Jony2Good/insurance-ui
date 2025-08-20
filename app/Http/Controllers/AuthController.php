<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $url = config('endpoints.prefix_auth') . config('endpoints.prefix') . 'register';

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ];

        \Log::info('register', [
            'url' => $url,
            'data' => $data
        ]);

        $response = Http::acceptJson()->post($url, $data);

        $json = $response->json();

        // Логируем сырой ответ
        \Log::info('register.response', ['response' => $response->json()]);

        if (!$response->successful() || !isset($json['user'])) {
            return response()->json($json, $response->status());
        }

        $userData = $json['user'];

        User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => $request->input('password'),
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function login(Request $request): JsonResponse
    {
        $url = config('endpoints.prefix_auth') . config('endpoints.prefix') . 'login';

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        \Log::info('login', [
            'url' => $url,
            'data' => $data
        ]);

        $response = Http::acceptJson()->post($url, $data);

        $json = $response->json();


        \Log::info('login', [
            'url' => $url,
            'data' => $json
        ]);

        if (!$response->successful() || !isset($json['access_token'])) {
            return response()->json($json, $response->status());
        }

        $token = $json['access_token'];

        $payload = JWTAuth::setToken($token)->getPayload();

        $email = $payload->get('email');


        \Log::info('login', [
            'token' => $token,
            'url' => $url,
            'data' => $payload,
            'email' => $payload->get('email'),
        ]);

        $user = User::where('email', $email)->first();

        \Log::info('user', [
            'user' => $user,
        ]);

        Auth::login($user);

        session(['access_token' => $token]);

        $exp = $payload->get('exp');
        $now = time();
        $secondsToExpire = $exp - $now;

        return response()->json($response->json(), $response->status())
            ->cookie('access_token', $token, $secondsToExpire / 60, null, null, false, true);
    }

    public function logout(Request $request)
    {
        $url = config('endpoints.prefix_auth') . config('endpoints.prefix') . 'logout';
        $jwt = $request->cookie('access_token');

        $response = Http::acceptJson()
            ->withToken($jwt)
            ->post($url, []);

        $answer = $response->json();

        if (isset($answer['error']) && $answer['error'] === true) {
            return response()->json($response->json(), $response->status());
        };

        $cookie = cookie()->forget('access_token');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        auth()->logout();

        return redirect('/')->withCookie($cookie);
    }
}
