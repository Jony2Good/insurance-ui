<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function makePersonalPage() 
   {
      return view('dashboard.components.personal');
   }

   public function makeBillingPage()
    {
        return view('dashboard.components.billing');
    }

    public function makeAutoPage()
    {
        return view('dashboard.components.auto');
    }

    public function makePoliciesPage()
    {
        return view('dashboard.components.policies');
    }

    public function makeOsagoPage()
    {
        return view('dashboard.components.osago');
    }
}
