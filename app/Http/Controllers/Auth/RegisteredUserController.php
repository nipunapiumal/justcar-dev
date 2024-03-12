<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plan;
use App\Models\Utility;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Models\Store;
use App\Models\UserStore;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        if (Utility::getValByName('signup_button') == 'on') {
            return view('auth.register');
        } else {
            return abort('404', 'Page not found');
        }
    }


    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        if (env('RECAPTCHA_MODULE') == 'yes') {
            $validation['g-recaptcha-response'] = 'required|captcha';
        } else {
            $validation = [];
        }

        //return if a hidden field is filled by bots
        if($request->filled('username')){
            return redirect()->back()->with('error', 'Error');
        }

        $this->validate($request, $validation);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $remember_token = Str::random(60);

        $objUser = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => $remember_token,
            'type' => 'Owner',
            'lang' => !empty($settings['default_language']) ? $settings['default_language'] : 'en',
            'avatar' => 'avatar.png',
            'created_by' => 1,
        ]);

        $objStore = Store::create(
            [
                'created_by' => $objUser->id,
                'name' => $request->store_name,
                'email' => $request->email,
                'logo' => !empty($settings['logo']) ? $settings['logo'] : 'logo-dark.png',
                'invoice_logo' => !empty($settings['logo']) ? $settings['logo'] : 'invoice_logo.png',
                'lang' => !empty($settings['default_language']) ? $settings['default_language'] : 'en',
                'currency' => !empty($settings['currency_symbol']) ? $settings['currency_symbol'] : '$',
                'currency_code' => !empty($settings->currency) ? $settings->currency : 'USD',
                'paypal_mode' => 'sandbox',
            ]
        );

        $objStore->enable_storelink = 'on';
        $objStore->content          = 'Hi,
*Welcome to* {store_name},
Your order is confirmed & your order no. is {order_no}
Your order detail is:
Name : {customer_name}
Address : {billing_address} {billing_city} , {shipping_address} {shipping_city}
~~~~~~~~~~~~~~~~
{item_variable}
~~~~~~~~~~~~~~~~
Qty Total : {qty_total}
Sub Total : {sub_total}
Discount Price : {discount_amount}
Shipping Price : {shipping_amount}
Tax : {total_tax}
Total : {final_total}
~~~~~~~~~~~~~~~~~~
To collect the order you need to show the receipt at the counter.
                Thanks {store_name}
                ';

        $objStore->item_variable    = '{sku} : {quantity} x {product_name} - {variant_name} + {item_tax} = {item_total}';
        $objStore->theme_dir        = 'theme6';
        $objStore->store_theme      = 'green-color.css';
        $objStore->save();

        $objUser->current_store = $objStore->id;
        
        //if admin enable 30 days free trail
        if (Utility::getValByName('premium_free_trial') == 'on'){
            $objUser->plan          = Plan::where('max_stores', -1)->first()->id;
            $objUser->plan_expire_date = Carbon::now()->addMonths(1)->isoFormat('YYYY-MM-DD');
            $objUser->free_trial_status = 0;
        }else{
            $objUser->plan          = Plan::first()->id;
        }

        $objUser->save();
        UserStore::create(
            [
                'user_id' => $objUser->id,
                'store_id' => $objStore->id,
                'permission' => 'Owner',
            ]
        );


        try {
            $dArr  = [
                'activate_link' => route('store.owneractivate', [$remember_token]),
            ];
            $store = Store::where('id', $objStore->id)->where('is_store_enabled', '1')->first();
            $resp  = Utility::sendEmailTemplate('User Verification', $request->email, $dArr, $store, null);
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }

        return redirect()->route('login')->with('success', __('Account Created Successfully.'));
        // return redirect(RouteServiceProvider::HOME);
    }

    public function showRegistrationForm($lang = '')
    {
        if (empty($lang)) {
            $lang = Utility::getValByName('default_language');
        }

        \App::setLocale($lang);
        if (Utility::getValByName('signup_button') == 'on') {
            return view('auth.register', compact('lang'));
        } else {
            return abort('404', 'Page not found');
        }
    }
    public function ownerActivate($remember_token)
    {


        $user = User::where('remember_token', $remember_token)->first();

        if (isset($user->id)) {


            $store = Store::where('id', $user->current_store)->where('is_store_enabled', '1')->first();
            if (empty($store)) {
                return abort('404', 'Page not found');
            }

            $user->is_verified = 1;
            $user->remember_token = "";
            $user->update();

            try {
                Utility::sendEmailTemplate('New Registration', $user->email, null, $store, null);
            } catch (\Exception $e) {
                print_r($e->getMessage());
            }

            return redirect()->route('login')->with('success', __('Your account has been activated successfully!'));
        }

        return redirect()->route('login')->with('success', __('You need to login!'));
    }
}
