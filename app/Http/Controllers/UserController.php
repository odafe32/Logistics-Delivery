<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Password as PasswordRules;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Shipment;
use App\Models\ShipmentPackage;
use App\Models\ShipmentStatus;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function ShowDashboard(){
        $recentShipments = Shipment::where('user_id', Auth::id())
            ->with(['packages', 'statuses' => function($query) {
                $query->latest('status_date')->limit(1);
            }])
            ->latest()
            ->limit(5)  // Show only last 5 shipments
            ->get();

        $viewData = [
            'meta_title' =>  ' Dashboard ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627',
            'recentShipments' => $recentShipments
        ];
        return view('user.dashboard', $viewData);
    }

    public function ShowNewShipment(){
                   $viewData = [
          'meta_title' =>  ' New Shipment ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('user.new-shipment', $viewData);
    }

    public function ShowTrackShipment(){
                   $viewData = [
          'meta_title' =>  ' Track Shipment ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('user.user-track-shipment', $viewData);
    }

    public function ShowTrackShipmentDetails(){
                   $viewData = [
          'meta_title' =>  '  Shipment Status ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('user.user-track-details', $viewData);
    }

    public function ShowHistory(){
                   $viewData = [
          'meta_title' =>  '  Shipping  History ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('user.shipment-history', $viewData);
    }
    public function ShowSupport(){
                   $viewData = [
          'meta_title' =>  '  Support  ' . config('website.name'),
              'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
           ];
    return view('user.support', $viewData);
    }

    public function ShowProfile()
    {
        $user = Auth::user();
        $viewData = [
            'meta_title' => 'Profile - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627',
            'user' => $user
        ];

        return view('user.profile', $viewData);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20'],
            'job_title' => ['required', 'string', 'max:255'],
            'company_name' => ['required_if:account_type,business', 'nullable', 'string', 'max:255'],
            'industry' => ['required_if:account_type,business', 'nullable', 'string', 'max:255'],
            'profile_image' => ['nullable', 'image', 'max:5120'] // 5MB max
        ]);

        try {
            if ($request->hasFile('profile_image')) {
                // Delete old image if exists
                if ($user->profile_image) {
                    Storage::disk('public')->delete($user->profile_image);
                }

                // Store new image
                $path = $request->file('profile_image')->store('profile-images', 'public');
                $user->profile_image = $path;
                $user->save();
            }

            $user->update($request->except(['profile_image']));

            return back()->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error updating profile: ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        try {
            Auth::user()->update([
                'password' => Hash::make($request->password)
            ]);

            return back()->with('success', 'Password updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error updating password: ' . $e->getMessage());
        }
    }

    public function createShipment(Request $request)
    {
        $request->validate([
            'sender_name' => 'required|string',
            'sender_phone' => 'required|string',
            'sender_email' => 'required|email',
            'sender_address' => 'required|string',
            'recipient_name' => 'required|string',
            'recipient_phone' => 'required|string',
            'recipient_email' => 'required|email',
            'recipient_address' => 'required|string',
            'service_type' => 'required|in:express,standard,economy',
            'weight' => 'required|array',
            'weight.*' => 'required|numeric|min:0.1',
            'length' => 'required|array',
            'length.*' => 'required|numeric|min:1',
            'width' => 'required|array',
            'width.*' => 'required|numeric|min:1',
            'height' => 'required|array',
            'height.*' => 'required|numeric|min:1',
            'contents' => 'required|array',
            'contents.*' => 'required|string'
        ]);

        try {
            DB::beginTransaction();

            // Create shipment
            $shipment = new Shipment();
            $shipment->user_id = Auth::id();
            $shipment->tracking_number = $shipment->generateTrackingNumber();
            $shipment->sender_name = $request->sender_name;
            $shipment->sender_phone = $request->sender_phone;
            $shipment->sender_email = $request->sender_email;
            $shipment->sender_address = $request->sender_address;
            $shipment->recipient_name = $request->recipient_name;
            $shipment->recipient_phone = $request->recipient_phone;
            $shipment->recipient_email = $request->recipient_email;
            $shipment->recipient_address = $request->recipient_address;
            $shipment->service_type = $request->service_type;

            // Calculate price based on service type and number of packages
            $basePrice = [
                'express' => 25.99,
                'standard' => 15.99,
                'economy' => 10.99
            ];
            $shipment->total_price = $basePrice[$request->service_type] * count($request->weight);
            $shipment->save();

            // Save packages
            foreach ($request->weight as $index => $weight) {
                ShipmentPackage::create([
                    'shipment_id' => $shipment->id,
                    'weight' => $weight,
                    'length' => $request->length[$index],
                    'width' => $request->width[$index],
                    'height' => $request->height[$index],
                    'contents' => $request->contents[$index]
                ]);
            }

            // Create initial status
            ShipmentStatus::create([
                'shipment_id' => $shipment->id,
                'status' => 'pending',
                'status_date' => now(),
                'notes' => 'Shipment created'
            ]);

            DB::commit();

            return redirect('/shipment-history')->with('success', 'Shipment created successfully. Tracking number: ' . $shipment->tracking_number);

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error creating shipment: ' . $e->getMessage())->withInput();
        }
    }

    public function saveShipmentDraft(Request $request)
    {
        try {
            DB::beginTransaction();

            $shipment = new Shipment();
            $shipment->user_id = Auth::id();
            $shipment->tracking_number = $shipment->generateTrackingNumber();
            $shipment->fill($request->all());
            $shipment->is_draft = true;
            $shipment->save();

            // Save packages if provided
            if ($request->has('weight')) {
                foreach ($request->weight as $index => $weight) {
                    if ($weight) {
                        ShipmentPackage::create([
                            'shipment_id' => $shipment->id,
                            'weight' => $weight,
                            'length' => $request->length[$index] ?? 0,
                            'width' => $request->width[$index] ?? 0,
                            'height' => $request->height[$index] ?? 0,
                            'contents' => $request->contents[$index] ?? ''
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Draft saved successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error saving draft: ' . $e->getMessage()
            ], 500);
        }
    }

    public function trackShipment($trackingNumber)
    {
        $shipment = Shipment::where('tracking_number', $trackingNumber)
            ->with(['packages', 'statuses' => function($query) {
                $query->orderBy('status_date', 'desc');
            }])
            ->firstOrFail();

        return view('user.shipment-details', [
            'shipment' => $shipment,
            'meta_title' => 'Track Shipment - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' track your shipment status.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ]);
    }

    public function getShipmentHistory()
    {
        $shipments = Shipment::where('user_id', Auth::id())
            ->with(['packages', 'statuses' => function($query) {
                $query->latest('status_date')->limit(1);
            }])
            ->latest()
            ->paginate(10);

        return view('user.shipment-history', [
            'shipments' => $shipments,
            'meta_title' => 'Shipment History - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' view your shipment history.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ]);
    }

    public function getShipmentDetails($trackingNumber)
    {
        $shipment = Shipment::where('tracking_number', $trackingNumber)
            ->with(['packages', 'statuses' => function($query) {
                $query->orderBy('status_date', 'desc');
            }])
            ->firstOrFail();

        return view('user.shipment-details-modal', compact('shipment'));
    }
}
