<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', function (Request $request) {

    $url = config('endpoints.prefix_auth') . config('endpoints.prefix') . 'register';

    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password')
    ];

    \Log::info('register', [
        'url' => $url,
        'data' => $data
    ]);

    $response = Http::acceptJson()->post($url, $data);

    // Логируем сырой ответ
    \Log::info('register.response', ['response' => $response->json()]);

    // $resp = [
    //     'message' => 'Пользователь зарегестрирован',
    //     'user' => [
    //         'id' => 3,
    //         'email' => 'xaric@mailinator.com',
    //         'name' => 'Иванов',
    //     ],
    // ];

    // $resp1 = [
    //     'message' => 'Поле name может содержать только кириллицу и пробельные символы.',
    //     'errors' => [
    //         'name' => ['Поле name может содержать только кириллицу и пробельные символы.'],
    //     ],
    // ];



    return response()->json($response->json(), $response->status());
});


Route::post('/login', function (Request $request) {

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


    // $response = [
    //     "access_token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1",
    //     "expires_in" => 3600,
    //     "token_type" => "bearer",
    //     "user" => [
    //         "id" => 1
    //     ]
    // ];

    return response()->json($response->json(), $response->status());
});

