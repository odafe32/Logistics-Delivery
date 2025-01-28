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
  public function index()
{
    $data = [
        'meta' => [
           'meta_title' => config('website.name') . ' - Shipping & Logistics',
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ],
        'service_section' => [
            'background' => [
                'class' => 'service pb-140 position-relative half-bg-white bg-neutral',
                'pattern_image' => [
                    'src' => 'assets/images/shapes/pattern-bg.png',
                    'class' => 'position-absolute bottom-0 tw-start-0 w-100 h-50'
                ]
            ],
            'header' => [
                'container_class' => 'max-w-856-px mx-auto text-center tw-pb-16 tw-mb-6',
                'subtitle' => [
                    'text' => 'Safe Transportation & Logistics',
                    'class' => 'splitTextStyleTwo cursor-small tw-text-xl fw-bold fst-italic text-decoration-underline text-main-600 tw-mb-305'
                ],
                'title' => [
                    'text' => 'Fastest & Secured Logistics Solution & services',
                    'class' => 'splitTextStyleOne cursor-big'
                ]
            ],
            'content' => [
                'container_class' => 'tw-container-1540-px mx-auto tw-px-4',
                'main_content' => [
                    'class' => 'bg-main-two-600 tw-rounded-2xl position-relative z-1',
                    'background_image' => [
                        'src' => 'assets/images/thumbs/service-bg-img.png',
                        'class' => 'position-absolute tw-end-0 bottom-0 z-n1'
                    ]
                ],
                'tabs' => [
                    'navigation' => [
                        [
                            'id' => 'pills-air-transportation-tab',
                            'target' => 'pills-air-transportation',
                            'icon' => 'assets/images/icons/service-icon1.svg',
                            'text' => 'Air Transportation',
                            'active' => true
                        ],
                        [
                            'id' => 'pills-traini-transport-tab',
                            'target' => 'pills-traini-transport',
                            'icon' => 'assets/images/icons/service-icon5.svg',
                            'text' => 'Train Transportation',
                            'active' => false
                        ],
                        [
                            'id' => 'pills-cargoShipFrieght-tab',
                            'target' => 'pills-cargoShipFrieght',
                            'icon' => 'assets/images/icons/service-icon3.svg',
                            'text' => 'Cargo Ship Frieght',
                            'active' => false
                        ],
                        [
                            'id' => 'pills-Maritime-transportation-tab',
                            'target' => 'pills-Maritime-transportation',
                            'icon' => 'assets/images/icons/service-icon4.svg',
                            'text' => 'Maritime Transportation',
                            'active' => false
                        ],
                        [
                            'id' => 'pills-flightTrans-tab',
                            'target' => 'pills-flightTrans',
                            'icon' => 'assets/images/icons/service-icon5.svg',
                            'text' => 'Flight Transportation',
                            'active' => false
                        ]
                    ],
                    'content' => [
                        'common_features' => [
                            'description' => 'For each project we establish relationships with partners who we know will help us create added value for',
                            'features' => [
                                'Fast Delivery',
                                'Safety',
                                'Good Package',
                                'Privacy'
                            ],
                            'additional_features' => [
                                'Dedicated Transport wise',
                                'Domestics & Logistics'
                            ]
                        ],
                        'service_image' => [
                            'icon' => 'assets/images/icons/service-icon5.svg',
                            'main_image' => 'assets/images/thumbs/service-img.png'
                        ]
                    ]
                ]
            ]
        ]
    ];
        return view('home', $data);
}


    public function NearestOffice(){
           $viewData = [
          'meta_title' =>  ' Nearest Office ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('nearest-office', $viewData);   
    }
    public function ShowShipmentDetail(){
           $viewData = [
          'meta_title' =>  ' Shipment Details ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('track-shipment-detail', $viewData);   
    }
    public function ShowShipment(){
           $viewData = [
          'meta_title' =>  ' Track Shipment ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('track-shipment', $viewData);   
    }

    
}
