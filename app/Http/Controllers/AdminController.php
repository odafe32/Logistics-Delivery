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
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function printShipmentPDF(Shipment $shipment)
    {
        // Load the shipment with its relationships
        $shipment->load(['packages', 'statuses' => function($query) {
            $query->orderBy('status_date', 'desc');
        }]);

        $pdf = PDF::loadView('admin.pdf.shipment', compact('shipment'));

        return $pdf->stream('shipment-' . $shipment->tracking_number . '.pdf');
    }
    //
    public function ShowDashboard()
    {
        // Get counts for dashboard stats
        $totalShipments = Shipment::count();
        $pendingShipments = Shipment::where('current_status', 'pending')->count();
        $inTransitShipments = Shipment::where('current_status', 'in_transit')->count();
        $deliveredShipments = Shipment::where('current_status', 'delivered')->count();

        // Get recent shipments with their latest status
        $recentShipments = Shipment::with(['user', 'statuses' => function($query) {
            $query->latest('status_date')->limit(1);
        }])
        ->latest()
        ->paginate(10);

        $viewData = [
            'meta_title' => 'Dashboard - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627',
            'totalShipments' => $totalShipments,
            'pendingShipments' => $pendingShipments,
            'inTransitShipments' => $inTransitShipments,
            'deliveredShipments' => $deliveredShipments,
            'shipments' => $recentShipments
        ];

        return view('admin.dashboard', $viewData);
    }


    public function ShowUsers()
    {
        $users = User::query()
            ->when(request('search'), function($query, $search) {
                $query->where(function($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when(request('role'), function($query, $role) {
                $query->where('role', $role);
            })
            ->when(request('account_type'), function($query, $type) {
                $query->where('account_type', $type);
            })
            ->latest()
            ->paginate(10);

        $viewData = [
            'meta_title' => 'Users Management - ' . config('website.name'),
            'meta_desc' => 'Manage users and administrators',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627',
            'users' => $users
        ];

        return view('admin.users', $viewData);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:20'],
            'job_title' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'in:personal,business'],
            'role' => ['required', 'in:admin,user'],
            'company_name' => ['required_if:account_type,business'],
            'industry' => ['required_if:account_type,business'],
            'password' => ['required', 'string', 'min:8'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'job_title' => $request->job_title,
                'account_type' => $request->account_type,
                'role' => $request->role,
                'company_name' => $request->company_name,
                'industry' => $request->industry,
                'password' => Hash::make($request->password),
                'status' => $request->status,
            ]);

            DB::commit();

            return redirect()->route('users')->with('success', 'User created successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error creating user: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showNewUser()
    {
        $viewData = [
            'meta_title' => 'Add New User - ' . config('website.name'),
            'meta_desc' => 'Create a new user account',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('admin.new-user', $viewData);
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone_number' => ['required', 'string', 'max:20'],
            'job_title' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'in:personal,business'],
            'role' => ['required', 'in:admin,user'],
            'company_name' => ['required_if:account_type,business'],
            'industry' => ['required_if:account_type,business'],
            'password' => ['nullable', 'string', 'min:8'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        try {
            DB::beginTransaction();

            $updateData = $request->except('password');
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->update($updateData);

            DB::commit();

            return redirect()->route('users')->with('success', 'User created successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error updating user: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteUser(User $user)
{
    try {
    \Log::info('Attempting to delete user: ' . $user->id);
        // Prevent deleting the current logged-in user
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account');
        }

        $activeShipments = $user->shipments()->where('current_status', '!=', 'delivered')->count();

        if ($activeShipments > 0) {
            return back()->with('error', 'Cannot delete user with active shipments');
        }

        // Delete the user
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully');

    } catch (\Exception $e) {
        \Log::error('User deletion error: ' . $e->getMessage());
        return back()->with('error', 'Error deleting user: ' . $e->getMessage());
    }
}

    public function getUserById(User $user)
    {
        return redirect()->route('users')->with('success', 'User created successfully');
    }

    public function editUser(User $user)
    {
        $viewData = [
            'meta_title' => 'Edit User - ' . config('website.name'),
            'meta_desc' => 'Edit user account details',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627',
            'user' => $user
        ];

        return view('admin.edit-user', $viewData);
    }

     public function ShowTimelines(Request $request)
     {
         $query = Shipment::query()
             ->with(['user', 'statuses' => function($query) {
                 $query->latest('status_date')->limit(1);
             }]);

         // Apply search filter
         if ($request->has('search')) {
             $search = $request->search;
             $query->where(function($q) use ($search) {
                 $q->where('tracking_number', 'like', "%{$search}%")
                   ->orWhere('sender_name', 'like', "%{$search}%")
                   ->orWhere('recipient_name', 'like', "%{$search}%");
             });
         }

         // Apply status filter
         if ($request->has('status') && $request->status !== '') {
             $query->where('current_status', $request->status);
         }

         $shipments = $query->latest()->paginate(15);

         $viewData = [
             'shipments' => $shipments,
             'meta_title' => 'All Shipments - ' . config('website.name'),
             'meta_desc' => config('website.name') . ' manage all shipments.',
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
     public function AddTimelines($tracking_number)
     {
         $shipment = Shipment::where('tracking_number', $tracking_number)
             ->with(['user', 'statuses' => function($query) {
                 $query->orderBy('status_date', 'desc');
             }])
             ->firstOrFail();

         $viewData = [
             'meta_title' => 'Add Timeline - ' . config('website.name'),
             'meta_desc' => config('website.name') . ' offers fast & reliable shipping services',
             'meta_image' => url('assets/images/logo/favicon.png'),
             'data_wf_page' => '63b261b248057c80966627',
             'shipment' => $shipment
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

         return view('admin.profile', $viewData);
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
             'profile_image' => ['nullable', 'image', 'max:5120']
         ]);

         try {
             if ($request->hasFile('profile_image')) {
                 // Delete old image if exists
                 if ($user->profile_image) {
                     Storage::disk('public')->delete($user->profile_image);
                 }

                 // Store new image
                 $path = $request->file('profile_image')->store('admin-profile-images', 'public');
                 $user->profile_image = $path;
                 $user->save();
             }

             $user->update($request->except(['profile_image']));

             return back()->with('success', 'Profile updated successfully');
         } catch (\Exception $e) {
             return back()->with('error', 'Error updating profile: ' . $e->getMessage());
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
     public function deleteShipment(Shipment $shipment)
{
    try {
        DB::beginTransaction();

        // Delete related records first
        $shipment->statuses()->delete();
        $shipment->packages()->delete();

        // Delete the shipment
        $shipment->delete();

        DB::commit();

        return redirect()->back()->with('success', 'Shipment deleted successfully');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'Error deleting shipment: ' . $e->getMessage());
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

     public function ShowSupportMessages()
    {
        $viewData = [
            'meta_title' => 'Support Messages - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('admin.support-messages', $viewData);
    }

    public function ShowContactMessages()
    {
        $viewData = [
            'meta_title' => 'Contact Messages - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('admin.contact-messages', $viewData);
    }

    public function getAllShipments()
    {
        $shipments = Shipment::with(['user', 'packages', 'statuses' => function($query) {
            $query->latest('status_date')->limit(1);
        }])
        ->latest()
        ->paginate(15);

        $viewData = [
            'shipments' => $shipments,
            'meta_title' => 'All Shipments - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' manage all shipments.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('admin.timelines', $viewData);
    }

    public function getShipmentDetails($id)
    {
        $shipment = Shipment::with(['user', 'packages', 'statuses' => function($query) {
            $query->orderBy('status_date', 'desc');
        }])->findOrFail($id);

        // Calculate progress percentage
        $statuses = ['pending', 'picked_up', 'processing', 'in_transit', 'out_for_delivery', 'delivered'];
        $currentStatusIndex = array_search($shipment->current_status, $statuses);
        $progressPercentage = ($currentStatusIndex + 1) / count($statuses) * 100;

        $viewData = [
            'shipment' => $shipment,
            'progressPercentage' => $progressPercentage,
            'meta_title' => 'Shipment Details - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' shipment details.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('admin.shipment-details', $viewData);
    }

    public function updateShipmentStatus(Request $request, Shipment $shipment)
    {
        $request->validate([
            'status' => 'required|in:pending,picked_up,processing,in_transit,out_for_delivery,delivered',
            'notes' => 'nullable|string',
            'location' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            // Update current status in shipment
            $shipment->current_status = $request->status;
            $shipment->save();

            // Add new status to history
            ShipmentStatus::create([
                'shipment_id' => $shipment->id,
                'status' => $request->status,
                'notes' => $request->notes,
                'location' => $request->location,
                'status_date' => now()
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Shipment status updated successfully',
                'new_status' => $request->status
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error updating shipment status: ' . $e->getMessage()
            ], 500);
        }
    }
}
