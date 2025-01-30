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
use App\Models\Shipment;
use App\Models\ShipmentPackage;
use App\Models\ShipmentStatus;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

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


<<<<<<< HEAD
    public function ShowShipmentDetail(){
           $viewData = [
          'meta_title' =>  ' Shipment Details ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
=======
    public function ShowShipmentDetail($trackingNumber)
    {
        // Fetch shipment details
        $shipment = Shipment::where('tracking_number', $trackingNumber)
            ->with(['packages', 'statuses' => function($query) {
                $query->orderBy('status_date', 'desc');
            }])
            ->firstOrFail();

        $viewData = [
            'meta_title' => 'Shipment Details - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services',
>>>>>>> 300dd19d538206ddf44d053fec638ecb14b3e567
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627',
            'shipment' => $shipment
        ];

        return view('track-shipment-detail', $viewData);
    }

<<<<<<< HEAD

=======
    public function trackShipment(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|string'
        ]);

        // Find the shipment with the given tracking number
        $shipment = Shipment::where('tracking_number', $request->tracking_number)->first();

        if ($shipment) {
            // Redirect to tracking details page with the tracking number
            return redirect()->route('track-shipment-detail', ['tracking_number' => $shipment->tracking_number]);
        }

        // If shipment not found, redirect back with an error
        return back()->with('error', 'Tracking number not found');
    }
>>>>>>> 300dd19d538206ddf44d053fec638ecb14b3e567

    public function ShowShipment(){
           $viewData = [
          'meta_title' =>  ' Track Shipment ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('track-shipment', $viewData);
    }

<<<<<<< HEAD
    public function ShowFaqs(){
           $viewData = [
          'meta_title' =>  ' Frequently Asked Question ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('faqs', $viewData);   
    }

    
=======
    public function showSendShipment()
    {
        return view('send-shipment');
    }

    public function showContact()
{
    $viewData = [
        'meta_title' => 'Contact Us - ' . config('website.name'),
        'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Contact us for any queries or support.',
        'meta_image' => url('assets/images/logo/favicon.png'),
        'data_wf_page' => '63b261b248057c80966627'
    ];
    return view('contact', $viewData);
}


public function submitContact(Request $request)
{
    try {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        Contact::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'is_read' => false
        ]);

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Contact form error: ' . $e->getMessage());

        return back()
            ->withInput()
            ->with('error', 'Sorry, there was an error sending your message. Please try again later.');
    }
}

>>>>>>> 300dd19d538206ddf44d053fec638ecb14b3e567
}
