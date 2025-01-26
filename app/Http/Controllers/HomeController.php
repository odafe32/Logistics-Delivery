<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //
    public function index(){
            $viewData = [
        'meta_title' => 'Home - NoName Logistics Shipping & Logistics',
        'meta_desc' => 'NoName Logistics offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose NoName Logistics for efficient freight shipping & logistics',
        'meta_image' => url('assets/images/logo/favicon.png'),
        'data_wf_page' => '63b261b248057c80966627',
       
    ];

    return view('home', $viewData);
    }


    public function NearestOffice(){
           $viewData = [
        'meta_title' => 'Home - NoName Logistics Shipping & Logistics',
        'meta_desc' => 'NoName Logistics offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose NoName Logistics for efficient freight shipping & logistics',
        'meta_image' => url('assets/images/logo/favicon.png'),
        'data_wf_page' => '63b261b248057c80966627',
       
    ];

    return view('nearest-office', $viewData);   
    }
}
