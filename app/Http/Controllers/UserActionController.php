<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserActionController extends Controller
{
    public function updatePersonals(Request $request)
    {
        \Log::info('req', [1 => print_r($request->all(), true)]);
    }

    public function updateBills(Request $request)
    {
        \Log::info('req', [1 => print_r($request->all(), true)]);
    }
    public function updateAuto(Request $request)
    {
        \Log::info('req', [1 => print_r($request->all(), true)]);
    }
}
