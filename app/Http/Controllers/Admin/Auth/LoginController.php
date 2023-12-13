<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Models\Admin;
use App\Models\MasterOtp;
use App\Providers\RouteServiceProvider;
use App\Services\HelperService;
use App\Services\UserService;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $admin = Auth::user();
            if ($admin->hasRole('Admin')) {
                return redirect()->intended('admin/dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'Opps! You are unauthorized admin.');
            }
        }
        return redirect()->route('admin.login')->with('error', 'Opps! You have entered invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    protected function guard() // And now finally this is our custom guard name
    {
        return Auth::guard('admin');
    }

    public function forgetPassword()
    {
        $user = Admin::where('id', 1)->first();
        return view('admin.auth.emailVerify', compact('user'));
    }


    public function createOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = Admin::where('email', $request->email)->whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->first();
        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Oops! Please enter valid email.');
        }

        $old_otp_exists = MasterOtp::where('email', $request->email)
            ->where('created_at', '>', Carbon::now()->subMinutes(1)->toDateTimeString())
            ->first();
        if ($old_otp_exists) {
            return redirect()->route('admin.submitOtp', ['email' => $request->email])->with('error', 'Oops! You can send the otp once in 60 seconds.');
        } else {
            $otp = HelperService::createOtp();
            try {
                Mail::send('admin.email.send_login_otp', ['token' => $otp], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->from(env('MAIL_FROM_ADDRESS'), 'admin.staarae.com');
                    $message->subject('Reset Password');
                });
            } catch (Exception $e) {
                Log::alert($e);
            }
            $data = MasterOtp::create(['email' => $request->email, 'otp' => $otp, 'created_at' => Carbon::now()]);
            if ($data) {
                return redirect()->route('admin.submitOtp', ['email' => $request->email])->with('success', 'OTP has been sent to user email.');
            } else {
                return redirect()->route('admin.createOtp', ['email' => $request->email])->with('error', 'Oops! OTP not created.');
            }
        }
    }

    public function submitOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);
        $user = Admin::where('email', $request->email)->whereHas('roles', function ($q) {
            $q->where('name','Admin');
        })->first();
        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Oops! Please enter valid email.');
        }
        $email = $request->email;
        return view('admin.auth.otpVerify', compact('email'));
    }


    public function otpVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
            'otp' => 'required',
        ]);
        $user = Admin::where('email', $request->email)->whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->first();

        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Oops! Please enter valid email.');
        }

        $otp_exists = MasterOtp::where('email', $request->email)
            ->where('created_at', '>', Carbon::now()->subMinutes(1)->toDateTimeString())
            ->first();
        if ($otp_exists) {
            $data = MasterOtp::where('email', $request->email)
                ->where('otp', $request->otp)
                ->orderBy('created_at', 'desc')
                ->first();
            if ($data) {
                MasterOtp::where('email', $request->email)->delete();//Delete Master Otp
                return redirect()->route('admin.confirm_password', ['email' => $request->email])->with('success', 'Now you can change your password');
            } else {
                return redirect()->back()->with('error', 'Oops! Please enter valid OTP.');
            }
        } else {
            return redirect()->back()->with('error', 'Oops! OTP expired please go back');
        }
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);
        $user = Admin::where('email', $request->email)->whereHas('roles', function ($q) {
            $q->where('name','Admin');
        })->first();

        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Oops! Please enter valid email.');
        }

        $email = $request->email;
        return view('admin.auth.changePassword', compact('email'));
    }


    public function verifyPassword(ChangePasswordRequest $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);

        $user = Admin::where('email', $request->email)->whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->first();

        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Oops! Please enter valid email.');
        }

        $password =  $request->password;
        $confirm_password = $request->confirm_password;
        if ($password == $confirm_password) {
            $user = UserService::getAdminByEmail($request->email);
            $user->update(['password' => Hash::make($password)]);
            return redirect()->route('admin.login')->with('success', 'Password has been updated successfuly.');
        } else {
            return redirect()->back()->with('error', 'Enter both Password And Confirm Password must same');
        }
    }
}
