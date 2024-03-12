<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\CopyrightPlan;
use App\Models\Utility;
use App\Models\User;
use App\Models\Store;
use App\Models\Plan;
use App\Models\StoragePlan;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function __construct()
    {
        if (!file_exists(storage_path() . "/installed")) {
            header('location:install');
            die;
        }
    }

    /*protected function authenticated(Request $request, $user)
    {
        if($user->delete_status == 1)
        {
            auth()->logout();
        }

        return redirect('/check');
    }*/

    public function store(LoginRequest $request)
    {

        if (env('RECAPTCHA_MODULE') == 'yes') {
            $validation['g-recaptcha-response'] = 'required|captcha';
        } else {
            $validation = [];
        }
        $this->validate($request, $validation);

        // $request->authenticate();

        if (Auth::attempt(['email' => $request->email, 'is_verified' => 1, 'password' => $request->password])) {
            $user = Auth::getLastAttempted();
            $request->session()->regenerate();
        }else{
            return redirect()->back()->with('error', 'These credentials do not match our records.');
            // throw ValidationException::withMessages([
            //     'email' => __('These credentials do not match our records.'),
            // ]);
        }

        $user = Auth::user();


        if ($user->delete_status == 1) {
            auth()->logout();
        }



        if ($user->type == 'Owner') {

            

            //add last login date
            $user_ = User::find($user->id);
            $user_->last_login_at = Carbon::now();
            $user_->update();

            $store = Store::where('created_by', $user->creatorId())->first();

            if (isset($store->is_store_enabled) && $store->is_store_enabled == 0) {

                auth()->logout();
                return redirect()->back()->with('error', __('Please contact our platform as your store is currently disabled'));
            }

            $datetime2 = date('Y-m-d');

            $plan = Plan::find($user->plan);
            if ($plan) {
                if ($plan->duration != 'Unlimited') {
                    // $datetime1=new \Datetime($user->plan_expire_date);
                    // $datetime2=new \Datetime(date('Y-m-d'));
                    // $interval =$datetime2->diff($datetime1);
                    // $days=$interval->format('%r%a');
                    // if($days <= 0)

                    $datetime1 = $user->plan_expire_date;

                    if (!empty($datetime1) && $datetime1 < $datetime2) {
                        $user->assignPlan(1);
                        return redirect()->intended(RouteServiceProvider::HOME)->with('error', __('plan expired', [
                            'name' => __('Plan'),
                        ]));

                  

                    }
                }
            }


            $copyright_plan = CopyrightPlan::find($user->copyright_plan);
            if ($copyright_plan) {
                    $datetime1 = $user->copyright_plan_expire_date;
                    if (!empty($datetime1) && $datetime1 < $datetime2) {
                        $user->assignCopyrightPlan(1);
                        return redirect()->intended(RouteServiceProvider::HOME)->with('error', __('plan expired', [
                            'name' => __('Copyright Plan'),
                        ]));
                    }
            }else{
                $user->assignCopyrightPlan(1);
            }

            $storage_plan = StoragePlan::find($user->storage_plan);
            if ($storage_plan) {
                    $datetime1 = $user->storage_plan_expire_date;
                    if (!empty($datetime1) && $datetime1 < $datetime2) {
                        $user->assignAvailableStorage(1);
                        return redirect()->intended(RouteServiceProvider::HOME)->with('error', __('plan expired', [
                            'name' => __('Storage Plan'),
                        ]));
                    }
            }else{
                $user->assignAvailableStorage(1);
            }


            if ($user->initial_setup) {
                $initial_setup = json_decode($user->initial_setup);
                if (!in_array('company-overview', $initial_setup) || !in_array('layouts', $initial_setup) || !in_array('cookie-bot', $initial_setup)) {
                    return redirect()->route('setting.initial-setup');
                }
            }else{
                return redirect()->route('setting.initial-setup');
            }


        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function showLoginForm($lang = '')
    {

        if (empty($lang)) {
            $lang = Utility::getValByName('default_language');
        }

        \App::setLocale($lang);

        return view('auth.login', compact('lang'));
    }

    public function showLinkRequestForm($lang = '')
    {
        if (empty($lang)) {
            $lang = Utility::getValByName('default_language');
        }

        \App::setLocale($lang);

        return view('auth.forgot-password', compact('lang'));
        /*return view('auth.passwords.email', compact('lang'));*/
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function autoLogin(Request $request)
    {

        $user = Auth::user();
        if ($user->type == 'super admin') {
            $owner = User::where('id', $request->id)->first();
            Auth::login($owner);
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
