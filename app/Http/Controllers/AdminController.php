<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
       public function ShowDashboard(){
                   $viewData = [
          'meta_title' =>  ' Dashboard - ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
            return view('admin.dashboard', $viewData);   
            }


       public function ShowUsers(){
                   $viewData = [
          'meta_title' =>  ' Users - ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
             return view('admin.users', $viewData);   
     }

       public function ShowShipments(){
                   $viewData = [
          'meta_title' =>  ' Shipments -  ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
             return view('admin.shipments', $viewData);   
     }
}
