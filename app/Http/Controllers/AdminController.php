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

       public function ShowTimelines(){
                   $viewData = [
          'meta_title' =>  ' Shipments -  ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
             return view('admin.timelines', $viewData);   
     }
       public function ShowShipmentDetails(){
                   $viewData = [
          'meta_title' =>  ' Shipments Details -  ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
             return view('admin.shipment-details', $viewData);   
     }
       public function AddTimelines(){
                   $viewData = [
          'meta_title' =>  ' Add Timeline -  ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
             return view('admin.add-timeline', $viewData);   
     }
       public function ShowNewShipment(){
                   $viewData = [
          'meta_title' =>  ' New Shipment -  ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
             return view('admin.new-shipment', $viewData);   
     }
       public function ShowProfile(){
                   $viewData = [
          'meta_title' =>  ' Profile -  ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
             return view('admin.profile', $viewData);   
     }
}
