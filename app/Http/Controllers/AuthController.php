<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        $viewData = [
            'meta_title' => config('website.name') . ' - Login',
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('auth.login', $viewData);
    }

    public function showRegister()
    {
        $viewData = [
            'meta_title' => config('website.name') . ' - Shipping & Logistics',
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('auth.register', $viewData);
    }

  
}