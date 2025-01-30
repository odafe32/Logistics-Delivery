<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password as PasswordBroker;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        $viewData = [
            'meta_title' => ' Login - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('auth.login-page', $viewData);
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string'],
            ]);

            $credentials = $request->only('email', 'password');
            $remember = $request->boolean('remember');

            if (!Auth::attempt($credentials, $remember)) {
                return back()
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => 'These credentials do not match our records.',
                    ]);
            }

            $request->session()->regenerate();

            // Redirect based on user role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Welcome back, Admin!');
            }

            return redirect()->route('dashboard')
                ->with('success', 'Welcome back!');

        } catch (\Exception $e) {
            return back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors(['email' => 'An error occurred while logging in. Please try again.']);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20'],
            'job_title' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'in:personal,business'],
            'company_name' => ['required_if:account_type,business', 'nullable', 'string', 'max:255'],
            'industry' => ['required_if:account_type,business', 'nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'job_title' => $request->job_title,
            'account_type' => $request->account_type,
            'company_name' => $request->company_name,
            'industry' => $request->industry,
            'role' => 'user', // Default role for new registrations
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    // Show pages
    public function showRegister()
    {
        $viewData = [
            'meta_title' =>  'Register - ' .  config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('auth.register', $viewData);
    }

    public function showForgotPassword()
    {
        $viewData = [
            'meta_title' =>  ' Forget Password - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('auth.forgot-password', $viewData);
    }

    public function showResetPassword(Request $request, $token)
    {
        $viewData = [
            'meta_title' => 'Reset Password - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments.',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627',
            'token' => $token,
            'email' => $request->email
        ];

        return view('auth.reset-password', $viewData);
    }

    public function showResetPasswordSuccess()
    {
        $viewData = [
            'meta_title' =>  ' Success - ' . config('website.name'),
            'meta_desc' => config('website.name') . ' offers fast & reliable shipping, courier, & logistics services for domestic & international shipments. Choose ' . config('website.name') . ' for efficient freight shipping & logistics',
            'meta_image' => url('assets/images/logo/favicon.png'),
            'data_wf_page' => '63b261b248057c80966627'
        ];

        return view('auth.password-reset-success', $viewData);
    }


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Send the password reset link
        $status = PasswordBroker::sendResetLink(
            $request->only('email')
        );

        if ($status === PasswordBroker::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', PasswordRules::defaults()],
        ]);

        $status = PasswordBroker::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === PasswordBroker::PASSWORD_RESET) {
            return redirect()->route('password.reset-success')
                ->with('status', __($status));
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }

}
