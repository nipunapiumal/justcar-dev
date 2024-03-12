<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\CopyrightPlan;
use App\Models\Language;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\Store;
use App\Models\StorePaymentSettings;
use App\Models\User;
use App\Models\Utility;
use App\Providers\RouteServiceProvider;
use Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SettingController extends Controller
{

    private $user;
    private $store_settings;

    public function __construct()
    {
        if (Auth::check()) {

            $this->user = Auth::user();
            $this->store_settings = Store::where('id', $this->user->current_store)->first();

            \App::setLocale(isset($this->store_settings->lang) ? $this->store_settings->lang : 'en');
        }
    }
    public function index()
    {
        $settings = Utility::settings();

        if (Auth::user()->type == 'super admin') {
            $admin_payment_setting = Utility::getAdminPaymentSetting();

            return view('settings.index', compact('settings', 'admin_payment_setting'));
        } else {
            return redirect()->route('setting.site_setting')->with('error', __('Permission denied.'));
            // $user = Auth::user();
            // $store_settings = Store::where('id', $this->user->current_store)->first();

            // if ($store_settings) {
            //     $store_payment_setting = Utility::getPaymentSetting();

            //     $serverName = str_replace(
            //         [
            //             'http://',
            //             'https://',
            //         ],
            //         '',
            //         env('APP_URL')
            //     );

            //     $serverIp = gethostbyname($serverName);
            //     if ($serverIp == $_SERVER['SERVER_NAME']) {
            //         $serverIp;
            //     } else {
            //         $serverIp = request()->server('REMOTE_ADDR');
            //     }

            //     $plan = Plan::where('id', $this->user->plan)->first();
            //     $copyright_plan = CopyrightPlan::where('id', $this->user->copyright_plan)->first();
            //     $app_url = trim(env('APP_URL'), '/');
            //     $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];
            //     if (!empty($store_settings->enable_subdomain) && $store_settings->enable_subdomain == 'on') {
            //         // Remove the http://, www., and slash(/) from the URL
            //         $input = env('APP_URL');

            //         // If URI is like, eg. www.way2tutorial.com/
            //         $input = trim($input, '/');
            //         // If not have http:// or https:// then prepend it
            //         if (!preg_match('#^http(s)?://#', $input)) {
            //             $input = 'http://' . $input;
            //         }

            //         $urlParts = parse_url($input);

            //         // Remove www.
            //         $subdomain_name = preg_replace('/^www\./', '', $urlParts['host']);
            //         // Output way2tutorial.com
            //     } else {
            //         $subdomain_name = str_replace(
            //             [
            //                 'http://',
            //                 'https://',
            //             ],
            //             '',
            //             env('APP_URL')
            //         );
            //     }


            //     $store_languages = Utility::getStoreLanguages();

            //     return view('settings.index', compact('settings', 'store_settings', 'plan', 'serverIp', 'subdomain_name', 'store_payment_setting', 'store_languages', 'copyright_plan'));
            // } else {
            //     return redirect()->back()->with('error', __('Permission denied.'));
            // }
        }
    }

    public function saveBusinessSettings(Request $request)
    {

        $user = \Auth::user();

        if (\Auth::user()->type == 'super admin') {
            if ($request->logo_dark) {
                $request->validate(
                    [
                        'logo_dark' => 'image|mimes:png|max:20480',
                    ]
                );
                $logoName = 'logo-dark.png';

                $path = $request->file('logo_dark')->storeAs('uploads/logo/', $logoName);
                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $logoName,
                        'logo_dark',
                        $this->user->creatorId(),
                    ]
                );
            }
            if ($request->logo_light) {
                $request->validate(
                    [
                        'logo_light' => 'image|mimes:png|max:20480',
                    ]
                );
                $lightlogoName = 'logo-light.png';

                $path = $request->file('logo_light')->storeAs('uploads/logo/', $lightlogoName);
                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $lightlogoName,
                        'logo_light',
                        $this->user->creatorId(),
                    ]
                );
            }

            if ($request->favicon) {
                $request->validate(
                    [
                        'favicon' => 'image|mimes:png|max:20480',
                    ]
                );
                $favicon = 'favicon.png';
                $path = $request->file('favicon')->storeAs('uploads/logo/', $favicon);

                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $favicon,
                        'favicon',
                        \Auth::user()->creatorId(),
                    ]
                );
            }


            if (!empty($request->title_text) || !empty($request->color) || !empty($request->cust_theme_bg) || !empty($request->cust_darklayout) || !empty($request->footer_text) || !empty($request->default_language) || !empty($request->display_landing_page) || !empty($request->gdpr_cookie)) {
                $post = $request->all();

                if (!isset($request->display_landing_page)) {
                    $post['display_landing_page'] = 'off';
                }

                if (!isset($request->gdpr_cookie)) {
                    $post['gdpr_cookie'] = 'off';
                }
                if (!isset($request->signup_button)) {
                    $post['signup_button'] = 'off';
                }
                if (!isset($request->premium_free_trial)) {
                    $post['premium_free_trial'] = 'off';
                }
                if (!isset($request->cust_theme_bg)) {
                    $post['cust_theme_bg'] = 'off';
                }
                if (!isset($request->cust_darklayout)) {
                    $post['cust_darklayout'] = 'off';
                }

                $SITE_RTL = $request->has('SITE_RTL') ? $request->SITE_RTL : 'off';
                $post['SITE_RTL'] = $SITE_RTL;

                unset($post['_token'], $post['logo_dark'], $post['logo_light'], $post['favicon']);
                foreach ($post as $key => $data) {
                    $settings = Utility::settings();
                    if (in_array($key, array_keys($settings))) {
                        \DB::insert(
                            'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                            [
                                $data,
                                $key,
                                $this->user->creatorId(),
                            ]
                        );
                    }
                }
            }
        } else if (\Auth::user()->type == 'Owner') {
            $post = $request->all();
            if ($request->logo_dark) {
                $request->validate(
                    [
                        'logo_dark' => 'image|mimes:png|max:20480',
                    ]
                );
                $logoName = $this->user->id . '_logo-dark.png';

                $path = $request->file('logo_dark')->storeAs('uploads/logo/', $logoName);
                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $logoName,
                        'company_logo_dark',
                        $this->user->creatorId(),
                    ]
                );
            }
            if ($request->logo_light) {
                $request->validate(
                    [
                        'logo_light' => 'image|mimes:png|max:20480',
                    ]
                );
                $lightlogoName = $this->user->id . 'logo-light.png';

                $path = $request->file('logo_light')->storeAs('uploads/logo/', $lightlogoName);
                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $lightlogoName,
                        'company_logo_light',
                        $this->user->creatorId(),
                    ]
                );
            }

            if ($request->favicon) {
                $request->validate(
                    [
                        'favicon' => 'image|mimes:png|max:20480',
                    ]
                );
                $favicon = $this->user->id . 'favicon.png';
                $path = $request->file('favicon')->storeAs('uploads/logo/', $favicon);

                \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $favicon,
                        'company_favicon',
                        \Auth::user()->creatorId(),
                    ]
                );
            }

            if (!empty($request->title_text) || !empty($request->color) || !empty($request->cust_theme_bg) || !empty($request->cust_darklayout) || !empty($request->footer_text)) {

                $SITE_RTL = $request->has('SITE_RTL') ? $request->SITE_RTL : 'off';
                $post['SITE_RTL'] = $SITE_RTL;

                if (!isset($request->cust_theme_bg)) {
                    $post['cust_theme_bg'] = 'off';
                }
                if (!isset($request->cust_darklayout)) {
                    $post['cust_darklayout'] = 'off';
                }



                unset($post['_token'], $post['logo_dark'], $post['logo_light'], $post['favicon']);

                foreach ($post as $key => $data) {
                    $settings = Utility::settings();
                    if (in_array($key, array_keys($settings))) {
                        \DB::insert(
                            'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                            [
                                $data,
                                $key,
                                $this->user->creatorId(),
                            ]
                        );
                    }
                }
            }

            // $store_settings = Store::where('id', $this->user->current_store)->first();
            // $id = $store_settings['id'];
            // $request->validate(
            //     [
            //         'company_logo' => 'image|mimes:png|max:20480',
            //         'company_logo_light' => 'image|mimes:png|max:20480',
            //     ]
            // );

            // if (!empty($request->company_logo)) {
            //     $logoName = $this->user->current_store . '-logo-dark.png';
            //     $path = $request->file('company_logo')->storeAs('uploads/logo', $logoName);

            //     \DB::insert(
            //         'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
            //             $logoName,
            //             'company_logo_dark',
            //             \Auth::user()->current_store,
            //         ]
            //     );
            // }
            // if (!empty($request->company_logo_light)) {
            //     $darklogoName = $this->user->current_store . '-logo-light.png';
            //     $path = $request->file('company_logo_light')->storeAs('uploads/logo', $darklogoName);

            //     \DB::insert(
            //         'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
            //             $darklogoName,
            //             'company_logo_light',
            //             \Auth::user()->current_store,
            //         ]
            //     );
            // }
            // if ($request->company_favicon) {
            //     $request->validate(
            //         [
            //             'company_favicon' => 'image|mimes:png|max:20480',
            //         ]
            //     );

            //     $favicon = $this->user->current_store . '_favicon.png';
            //     $path = $request->file('company_favicon')->storeAs('uploads/logo/', $favicon);
            //     \DB::insert(
            //         'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
            //             $favicon,
            //             'company_favicon',
            //             \Auth::user()->current_store,
            //         ]
            //     );
            // }

            // if (!empty($request->title_text)) {
            //     $post = $request->all();
            //     unset($post['_token'], $post['company_logo_dark'], $post['company_logo_light'], $post['company_favicon']);
            //     foreach ($post as $key => $data) {
            //         $settings = Utility::settings();
            //         if (in_array($key, array_keys($settings))) {
            //             \DB::insert(
            //                 'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
            //                     $data,
            //                     $key,
            //                     \Auth::user()->current_store,
            //                 ]
            //             );
            //         }
            //     }
            // }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        return redirect()->back()->with('success', __('Business setting successfully saved.'));
    }

    public function saveCompanySettings(Request $request)
    {

        if (\Auth::user()->type == 'Owner') {
            $request->validate(
                [
                    'company_name' => 'required|string|max:50',
                    'company_email' => 'required',
                    'company_email_from_name' => 'required|string',
                ]
            );
            $post = $request->all();
            unset($post['_token']);

            foreach ($post as $key => $data) {
                $settings = Utility::settings();
                if (in_array($key, array_keys($settings))) {
                    \DB::insert(
                        'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                        [
                            $data,
                            $key,
                            \Auth::user()->current_store,
                        ]
                    );
                }
            }

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function saveEmailSettings(Request $request)
    {

        if (\Auth::user()->type == 'super admin') {
            $request->validate(
                [
                    'mail_driver' => 'required|string|max:50',
                    'mail_host' => 'required|string|max:50',
                    'mail_port' => 'required|string|max:50',
                    'mail_username' => 'required|string|max:50',
                    'mail_password' => 'required|string|max:50',
                    'mail_encryption' => 'required|string|max:50',
                    'mail_from_address' => 'required|string|max:50',
                    'mail_from_name' => 'required|string|max:50',
                ]
            );

            $arrEnv = [
                'MAIL_DRIVER' => $request->mail_driver,
                'MAIL_HOST' => $request->mail_host,
                'MAIL_PORT' => $request->mail_port,
                'MAIL_USERNAME' => $request->mail_username,
                'MAIL_PASSWORD' => $request->mail_password,
                'MAIL_ENCRYPTION' => $request->mail_encryption,
                'MAIL_FROM_NAME' => $request->mail_from_name,
                'MAIL_FROM_ADDRESS' => $request->mail_from_address,
            ];
            Artisan::call('config:cache');
            Artisan::call('config:clear');
            Utility::setEnvironmentValue($arrEnv);

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function saveSystemSettings(Request $request)
    {
        if (\Auth::user()->type == 'Owner') {
            $request->validate(
                [
                    'site_currency' => 'required',
                ]
            );
            $post = $request->all();
            unset($post['_token']);
            if (!isset($post['shipping_display'])) {
                $post['shipping_display'] = 'off';
            }
            foreach ($post as $key => $data) {
                $settings = Utility::settings();
                if (in_array($key, array_keys($settings))) {
                    \DB::insert(
                        'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                        [
                            $data,
                            $key,
                            \Auth::user()->current_store,
                            date('Y-m-d H:i:s'),
                            date('Y-m-d H:i:s'),
                        ]
                    );
                }
            }

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function savePusherSettings(Request $request)
    {
        if (\Auth::user()->type == 'super admin') {
            $request->validate(
                [
                    'pusher_app_id' => 'required',
                    'pusher_app_key' => 'required',
                    'pusher_app_secret' => 'required',
                    'pusher_app_cluster' => 'required',
                ]
            );

            $arrEnvStripe = [
                'PUSHER_APP_ID' => $request->pusher_app_id,
                'PUSHER_APP_KEY' => $request->pusher_app_key,
                'PUSHER_APP_SECRET' => $request->pusher_app_secret,
                'PUSHER_APP_CLUSTER' => $request->pusher_app_cluster,
            ];
            Artisan::call('config:cache');
            Artisan::call('config:clear');
            $envStripe = Utility::setEnvironmentValue($arrEnvStripe);

            if ($envStripe) {
                return redirect()->back()->with('success', __('Pusher successfully updated.'));
            } else {
                return redirect()->back()->with('error', __('Something went wrong.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function savePaymentSettings(Request $request)
    {
        if (\Auth::user()->type == 'super admin') {
            $request->validate(
                [
                    'currency' => 'required|string|max:255',
                    'currency_symbol' => 'required|string|max:255',
                ]
            );

            if (isset($request->enable_stripe) && $request->enable_stripe == 'on') {
                $request->validate(
                    [
                        'stripe_key' => 'required|string|max:255',
                        'stripe_secret' => 'required|string|max:255',
                    ]
                );
            } elseif (isset($request->enable_paypal) && $request->enable_paypal == 'on') {
                $request->validate(
                    [
                        'paypal_mode' => 'required|string',
                        'paypal_client_id' => 'required|string',
                        'paypal_secret_key' => 'required|string',
                    ]
                );
            }
            $request->user = Auth::user()->creatorId();

            $arrEnv = [
                'CURRENCY_SYMBOL' => $request->currency_symbol,
                'CURRENCY' => $request->currency,
                'ENABLE_STRIPE' => $request->enable_stripe ?? 'off',
                'STRIPE_KEY' => $request->stripe_key,
                'STRIPE_SECRET' => $request->stripe_secret,
                'ENABLE_PAYPAL' => $request->enable_paypal ?? 'off',
                'PAYPAL_MODE' => $request->paypal_mode,
                'PAYPAL_CLIENT_ID' => $request->paypal_client_id,
                'PAYPAL_SECRET_KEY' => $request->paypal_secret_key,
            ];
            Artisan::call('config:cache');
            Artisan::call('config:clear');
            Utility::setEnvironmentValue($arrEnv);

            $post = $request->all();
            self::adminPaymentSettings($request);
            unset($post['_token'], $post['stripe_key'], $post['stripe_secret']);
            foreach ($post as $key => $data) {
                $settings = Utility::settings();
                if (in_array($key, array_keys($settings))) {

                    \DB::insert(
                        'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                        [
                            $data,
                            $key,
                            $request->user,
                            date('Y-m-d H:i:s'),
                            date('Y-m-d H:i:s'),
                        ]
                    );
                }
            }

            return redirect()->back()->with('success', __('Payment setting successfully saved.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function saveOwnerPaymentSettings(Request $request, $slug)
    {
        if (\Auth::user()->type == 'Owner') {
            $store = Store::where('slug', $slug)->first();

            $request->validate(
                [
                    'currency' => 'required|string|max:255',
                    'currency_symbol' => 'required|string|max:255',
                ]
            );

            if (isset($request->enable_stripe) && $request->enable_stripe == 'on') {
                $request->validate(
                    [
                        'stripe_key' => 'required|string|max:255',
                        'stripe_secret' => 'required|string|max:255',
                    ]
                );
            } elseif (isset($request->enable_paypal) && $request->enable_paypal == 'on') {
                $request->validate(
                    [
                        'paypal_mode' => 'required|string',
                        'paypal_client_id' => 'required|string',
                        'paypal_secret_key' => 'required|string',
                    ]
                );
            }

            $store['currency'] = $request->currency_symbol;
            $store['currency_code'] = $request->currency;
            $store['currency_symbol_position'] = $request->currency_symbol_position;
            $store['currency_symbol_space'] = $request->currency_symbol_space;
            $store['is_stripe_enabled'] = $request->is_stripe_enabled ?? 'off';
            $store['STRIPE_KEY'] = $request->stripe_key;
            $store['STRIPE_SECRET'] = $request->stripe_secret;
            $store['is_paypal_enabled'] = $request->is_paypal_enabled ?? 'off';
            $store['PAYPAL_MODE'] = $request->paypal_mode;
            $store['PAYPAL_CLIENT_ID'] = $request->paypal_client_id;
            $store['PAYPAL_SECRET_KEY'] = $request->paypal_secret_key;
            $store['ENABLE_WHATSAPP'] = $request->enable_whatsapp ?? 'off';
            $store['WHATSAPP_NUMBER'] = str_replace(' ', '', $request->whatsapp_number);
            $store['ENABLE_COD'] = $request->enable_cod ?? 'off';
            $store['ENABLE_BANK'] = $request->enable_bank ?? 'off';
            $store['BANK_NUMBER'] = $request->bank_number;
            $store['enable_telegram'] = $request->enable_telegram ?? 'off';
            $store['telegrambot'] = str_replace(' ', '', $request->telegrambot);
            $store['telegramchatid'] = str_replace(' ', '', $request->telegramchatid);

            $store->update();

            self::shopePaymentSettings($request);

            return redirect()->back()->with('success', __('Payment Store setting successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function saveOwneremailSettings(Request $request, $slug)
    {
        if (\Auth::user()->type == 'Owner') {
            $store = Store::where('slug', $slug)->first();

            $request->validate(
                [
                    // 'mail_driver' => 'required|string|max:50',
                    // 'mail_host' => 'required|string|max:50',
                    // 'mail_port' => 'required|string|max:50',
                    // 'mail_username' => 'required|string|max:50',
                    // 'mail_password' => 'required|string|max:50',
                    // 'mail_encryption' => 'required|string|max:50',
                    // 'mail_from_address' => 'required|string|max:50',
                    'mail_from_name' => 'required|string|max:50',
                ]
            );

            // $store['mail_driver'] = $request->mail_driver;
            // $store['mail_host'] = $request->mail_host;
            // $store['mail_port'] = $request->mail_port;
            // $store['mail_username'] = $request->mail_username;
            // $store['mail_password'] = $request->mail_password;
            // $store['mail_encryption'] = $request->mail_encryption;
            // $store['mail_from_address'] = $request->mail_from_address;
            $store['mail_from_name'] = $request->mail_from_name;
            $store->update();

            return redirect()->back()->with('success', __('Email Store setting successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function saveOwnertwilioSettings(Request $request, $slug)
    {
        if (\Auth::user()->type == 'Owner') {
            $store = Store::where('slug', $slug)->first();

            $validator = \Validator::make(
                $request->all(),
                [
                    'is_twilio_enabled' => 'required',
                    'twilio_sid' => 'required',
                    'twilio_token' => 'required',
                    'twilio_from' => 'required',
                    'notification_number' => 'required|numeric',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $store['is_twilio_enabled'] = $request->is_twilio_enabled ?? 'off';
            $store['twilio_sid'] = $request->twilio_sid;
            $store['twilio_token'] = $request->twilio_token;
            $store['twilio_from'] = $request->twilio_from;
            $store['notification_number'] = $request->notification_number;
            $store->update();

            return redirect()->back()->with('success', __('Twilio Store setting successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function saveCompanyPaymentSettings(Request $request)
    {
        if (\Auth::user()->type == 'Owner') {
            if (isset($request->enable_stripe) && $request->enable_stripe == 'on') {
                $request->validate(
                    [
                        'stripe_key' => 'required|string',
                        'stripe_secret' => 'required|string',
                    ]
                );
            } elseif (isset($request->enable_paypal) && $request->enable_paypal == 'on') {
                $request->validate(
                    [
                        'paypal_mode' => 'required|string',
                        'paypal_client_id' => 'required|string',
                        'paypal_secret_key' => 'required|string',
                    ]
                );
            }
            $post = $request->all();
            $post['enable_paypal'] = isset($request->enable_paypal) ? $request->enable_paypal : '';
            $post['enable_stripe'] = isset($request->enable_stripe) ? $request->enable_stripe : '';
            unset($post['_token']);
            foreach ($post as $key => $data) {
                $settings = Utility::settings();
                if (in_array($key, array_keys($settings))) {
                    \DB::insert(
                        'insert into settings (`value`, `name`,`created_by`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                        [
                            $data,
                            $key,
                            \Auth::user()->current_store,
                            date('Y-m-d H:i:s'),
                            date('Y-m-d H:i:s'),
                        ]
                    );
                }
            }

            return redirect()->back()->with('success', __('Payment setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function testMail()
    {
        return view('settings.test_mail');
    }

    public function testSendMail(Request $request)
    {
        if (\Auth::user()->type == 'super admin' || \Auth::user()->type == 'Owner') {

            $validator = \Validator::make($request->all(), ['email' => 'required|email']);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            try {
                // if (\Auth::user()->type != 'super admin') {

                //     $store = Store::find(Auth::user()->current_store);

                //     config(
                //         [
                //             'mail.driver' => $store->mail_driver,
                //             'mail.host' => $store->mail_host,
                //             'mail.port' => $store->mail_port,
                //             'mail.encryption' => $store->mail_encryption,
                //             'mail.username' => $store->mail_username,
                //             'mail.password' => $store->mail_password,
                //             'mail.from.address' => $store->mail_from_address,
                //             'mail.from.name' => $store->mail_from_name,
                //         ]
                //     );
                // }

                Mail::to($request->email)->send(new TestMail());
            } catch (\Exception $e) {

                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->back()->with('success', __('Email send Successfully.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function shopePaymentSettings($request)
    {
        $post['custom_field_title_1'] = $request->custom_field_title_1;
        $post['custom_field_title_2'] = $request->custom_field_title_2;
        $post['custom_field_title_3'] = $request->custom_field_title_3;
        $post['custom_field_title_4'] = $request->custom_field_title_4;

        if (isset($request->is_stripe_enabled) && $request->is_stripe_enabled == 'on') {
            $request->validate(
                [
                    'stripe_key' => 'required|string|max:255',
                    'stripe_secret' => 'required|string|max:255',
                ]
            );
            $post['is_stripe_enabled'] = $request->is_stripe_enabled;
            $post['stripe_key'] = $request->stripe_key;
            $post['stripe_secret'] = $request->stripe_secret;
        } else {
            $post['is_stripe_enabled'] = $request->is_stripe_enabled;
        }

        if (isset($request->is_paypal_enabled) && $request->is_paypal_enabled == 'on') {
            $request->validate(
                [
                    'paypal_mode' => 'required|string',
                    'paypal_client_id' => 'required|string',
                    'paypal_secret_key' => 'required|string',
                ]
            );
            $post['is_paypal_enabled'] = $request->is_paypal_enabled;
            $post['paypal_mode'] = $request->paypal_mode;
            $post['paypal_client_id'] = $request->paypal_client_id;
            $post['paypal_secret_key'] = $request->paypal_secret_key;
        } else {
            $post['is_paypal_enabled'] = $request->is_paypal_enabled;
        }

        if (isset($request->is_paystack_enabled) && $request->is_paystack_enabled == 'on') {
            $request->validate(
                [
                    'paystack_public_key' => 'required|string',
                    'paystack_secret_key' => 'required|string',
                ]
            );
            $post['is_paystack_enabled'] = $request->is_paystack_enabled;
            $post['paystack_public_key'] = $request->paystack_public_key;
            $post['paystack_secret_key'] = $request->paystack_secret_key;
        } else {
            $post['is_paystack_enabled'] = $request->is_paystack_enabled;
        }

        if (isset($request->is_flutterwave_enabled) && $request->is_flutterwave_enabled == 'on') {
            $request->validate(
                [
                    'flutterwave_public_key' => 'required|string',
                    'flutterwave_secret_key' => 'required|string',
                ]
            );
            $post['is_flutterwave_enabled'] = $request->is_flutterwave_enabled;
            $post['flutterwave_public_key'] = $request->flutterwave_public_key;
            $post['flutterwave_secret_key'] = $request->flutterwave_secret_key;
        } else {
            $post['is_flutterwave_enabled'] = $request->is_flutterwave_enabled;
        }

        if (isset($request->is_razorpay_enabled) && $request->is_razorpay_enabled == 'on') {
            $request->validate(
                [
                    'razorpay_public_key' => 'required|string',
                    'razorpay_secret_key' => 'required|string',
                ]
            );
            $post['is_razorpay_enabled'] = $request->is_razorpay_enabled;
            $post['razorpay_public_key'] = $request->razorpay_public_key;
            $post['razorpay_secret_key'] = $request->razorpay_secret_key;
        } else {
            $post['is_razorpay_enabled'] = $request->is_razorpay_enabled;
        }

        if (isset($request->is_paytm_enabled) && $request->is_paytm_enabled == 'on') {
            $request->validate(
                [
                    'paytm_mode' => 'required',
                    'paytm_merchant_id' => 'required|string',
                    'paytm_merchant_key' => 'required|string',
                    'paytm_industry_type' => 'required|string',
                ]
            );
            $post['is_paytm_enabled'] = $request->is_paytm_enabled;
            $post['paytm_mode'] = $request->paytm_mode;
            $post['paytm_merchant_id'] = $request->paytm_merchant_id;
            $post['paytm_merchant_key'] = $request->paytm_merchant_key;
            $post['paytm_industry_type'] = $request->paytm_industry_type;
        } else {
            $post['is_paytm_enabled'] = $request->is_paytm_enabled;
        }

        if (isset($request->is_mercado_enabled) && $request->is_mercado_enabled == 'on') {
            $request->validate(
                [
                    'mercado_access_token' => 'required|string',
                ]
            );
            $post['is_mercado_enabled'] = $request->is_mercado_enabled;
            $post['mercado_access_token'] = $request->mercado_access_token;
            $post['mercado_mode'] = $request->mercado_mode;
        } else {
            $post['is_mercado_enabled'] = 'off';
        }

        if (isset($request->is_mollie_enabled) && $request->is_mollie_enabled == 'on') {
            $request->validate(
                [
                    'mollie_api_key' => 'required|string',
                    'mollie_profile_id' => 'required|string',
                    'mollie_partner_id' => 'required',
                ]
            );
            $post['is_mollie_enabled'] = $request->is_mollie_enabled;
            $post['mollie_api_key'] = $request->mollie_api_key;
            $post['mollie_profile_id'] = $request->mollie_profile_id;
            $post['mollie_partner_id'] = $request->mollie_partner_id;
        } else {
            $post['is_mollie_enabled'] = $request->is_mollie_enabled;
        }

        if (isset($request->is_skrill_enabled) && $request->is_skrill_enabled == 'on') {
            $request->validate(
                [
                    'skrill_email' => 'required|email',
                ]
            );
            $post['is_skrill_enabled'] = $request->is_skrill_enabled;
            $post['skrill_email'] = $request->skrill_email;
        } else {
            $post['is_skrill_enabled'] = $request->is_skrill_enabled;
        }

        if (isset($request->is_coingate_enabled) && $request->is_coingate_enabled == 'on') {
            $request->validate(
                [
                    'coingate_mode' => 'required|string',
                    'coingate_auth_token' => 'required|string',
                ]
            );

            $post['is_coingate_enabled'] = $request->is_coingate_enabled;
            $post['coingate_mode'] = $request->coingate_mode;
            $post['coingate_auth_token'] = $request->coingate_auth_token;
        } else {
            $post['is_coingate_enabled'] = $request->is_coingate_enabled;
        }

        if (isset($request->is_paymentwall_enabled) && $request->is_paymentwall_enabled == 'on') {

            $validator = \Validator::make(
                $request->all(),
                [
                    'paymentwall_public_key' => 'required|string',
                    'paymentwall_private_key' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $post['is_paymentwall_enabled'] = $request->is_paymentwall_enabled;
            $post['paymentwall_public_key'] = $request->paymentwall_public_key;
            $post['paymentwall_private_key'] = $request->paymentwall_private_key;
        } else {
            $post['is_paymentwall_enabled'] = 'off';
        }

        foreach ($post as $key => $data) {

            $arr = [
                $data,
                $key,
                Auth::user()->current_store,
                Auth::user()->creatorId(),
            ];

            \DB::insert(
                'insert into store_payment_settings (`value`, `name`, `store_id`,`created_by`) values (?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                $arr
            );
        }
    }

    public function adminPaymentSettings($request)
    {
        if (isset($request->is_stripe_enabled) && $request->is_stripe_enabled == 'on') {
            $request->validate(
                [
                    'stripe_key' => 'required|string|max:255',
                    'stripe_secret' => 'required|string|max:255',
                ]
            );
            $post['is_stripe_enabled'] = $request->is_stripe_enabled;
            $post['stripe_key'] = $request->stripe_key;
            $post['stripe_secret'] = $request->stripe_secret;
        } else {
            $post['is_stripe_enabled'] = $request->is_stripe_enabled;
        }

        if (isset($request->is_paypal_enabled) && $request->is_paypal_enabled == 'on') {
            $request->validate(
                [
                    'paypal_mode' => 'required|string',
                    'paypal_client_id' => 'required|string',
                    'paypal_secret_key' => 'required|string',
                ]
            );

            $post['is_paypal_enabled'] = $request->is_paypal_enabled;
            $post['paypal_mode'] = $request->paypal_mode;
            $post['paypal_client_id'] = $request->paypal_client_id;
            $post['paypal_secret_key'] = $request->paypal_secret_key;
        } else {
            $post['is_paypal_enabled'] = $request->is_paypal_enabled;
        }

        if (isset($request->is_paystack_enabled) && $request->is_paystack_enabled == 'on') {
            $request->validate(
                [
                    'paystack_public_key' => 'required|string',
                    'paystack_secret_key' => 'required|string',
                ]
            );
            $post['is_paystack_enabled'] = $request->is_paystack_enabled;
            $post['paystack_public_key'] = $request->paystack_public_key;
            $post['paystack_secret_key'] = $request->paystack_secret_key;
        } else {
            $post['is_paystack_enabled'] = $request->is_paystack_enabled;
        }

        if (isset($request->is_flutterwave_enabled) && $request->is_flutterwave_enabled == 'on') {
            $request->validate(
                [
                    'flutterwave_public_key' => 'required|string',
                    'flutterwave_secret_key' => 'required|string',
                ]
            );
            $post['is_flutterwave_enabled'] = $request->is_flutterwave_enabled;
            $post['flutterwave_public_key'] = $request->flutterwave_public_key;
            $post['flutterwave_secret_key'] = $request->flutterwave_secret_key;
        } else {
            $post['is_flutterwave_enabled'] = $request->is_flutterwave_enabled;
        }

        if (isset($request->is_razorpay_enabled) && $request->is_razorpay_enabled == 'on') {
            $request->validate(
                [
                    'razorpay_public_key' => 'required|string',
                    'razorpay_secret_key' => 'required|string',
                ]
            );
            $post['is_razorpay_enabled'] = $request->is_razorpay_enabled;
            $post['razorpay_public_key'] = $request->razorpay_public_key;
            $post['razorpay_secret_key'] = $request->razorpay_secret_key;
        } else {
            $post['is_razorpay_enabled'] = $request->is_razorpay_enabled;
        }
        if (isset($request->is_paytm_enabled) && $request->is_paytm_enabled == 'on') {
            $request->validate(
                [
                    'paytm_mode' => 'required',
                    'paytm_merchant_id' => 'required|string',
                    'paytm_merchant_key' => 'required|string',
                    'paytm_industry_type' => 'required|string',
                ]
            );
            $post['is_paytm_enabled'] = $request->is_paytm_enabled;
            $post['paytm_mode'] = $request->paytm_mode;
            $post['paytm_merchant_id'] = $request->paytm_merchant_id;
            $post['paytm_merchant_key'] = $request->paytm_merchant_key;
            $post['paytm_industry_type'] = $request->paytm_industry_type;
        } else {
            $post['is_paytm_enabled'] = $request->is_paytm_enabled;
        }

        if (isset($request->is_mercado_enabled) && $request->is_mercado_enabled == 'on') {
            $request->validate(
                [
                    'mercado_access_token' => 'required|string',
                ]
            );
            $post['is_mercado_enabled'] = $request->is_mercado_enabled;
            $post['mercado_access_token'] = $request->mercado_access_token;
            $post['mercado_mode'] = $request->mercado_mode;
        } else {
            $post['is_mercado_enabled'] = 'off';
        }

        if (isset($request->is_mollie_enabled) && $request->is_mollie_enabled == 'on') {
            $request->validate(
                [
                    'mollie_api_key' => 'required|string',
                    'mollie_profile_id' => 'required|string',
                    'mollie_partner_id' => 'required',
                ]
            );
            $post['is_mollie_enabled'] = $request->is_mollie_enabled;
            $post['mollie_api_key'] = $request->mollie_api_key;
            $post['mollie_profile_id'] = $request->mollie_profile_id;
            $post['mollie_partner_id'] = $request->mollie_partner_id;
        } else {
            $post['is_mollie_enabled'] = $request->is_mollie_enabled;
        }

        if (isset($request->is_skrill_enabled) && $request->is_skrill_enabled == 'on') {
            $request->validate(
                [
                    'skrill_email' => 'required|email',
                ]
            );
            $post['is_skrill_enabled'] = $request->is_skrill_enabled;
            $post['skrill_email'] = $request->skrill_email;
        } else {
            $post['is_skrill_enabled'] = $request->is_skrill_enabled;
        }

        if (isset($request->is_coingate_enabled) && $request->is_coingate_enabled == 'on') {
            $request->validate(
                [
                    'coingate_mode' => 'required|string',
                    'coingate_auth_token' => 'required|string',
                ]
            );

            $post['is_coingate_enabled'] = $request->is_coingate_enabled;
            $post['coingate_mode'] = $request->coingate_mode;
            $post['coingate_auth_token'] = $request->coingate_auth_token;
        } else {
            $post['is_coingate_enabled'] = $request->is_coingate_enabled;
        }

        if (isset($request->is_paymentwall_enabled) && $request->is_paymentwall_enabled == 'on') {

            $validator = \Validator::make(
                $request->all(),
                [
                    'paymentwall_public_key' => 'required|string',
                    'paymentwall_private_key' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $post['is_paymentwall_enabled'] = $request->is_paymentwall_enabled;
            $post['paymentwall_public_key'] = $request->paymentwall_public_key;
            $post['paymentwall_private_key'] = $request->paymentwall_private_key;
        } else {
            $post['is_paymentwall_enabled'] = 'off';
        }

        foreach ($post as $key => $data) {
            $arr = [
                $data,
                $key,
                $request->user,
            ];
            \DB::insert(
                'insert into admin_payment_settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                $arr
            );
        }
    }

    public function recaptchaSettingStore(Request $request)
    {
        //return redirect()->back()->with('error', __('This operation is not perform due to demo mode.'));
        if (\Auth::user()->type == 'super admin') {

            $user = \Auth::user();
            $rules = [];
            if ($request->recaptcha_module == 'yes') {
                $rules['google_recaptcha_key'] = 'required|string|max:50';
                $rules['google_recaptcha_secret'] = 'required|string|max:50';
            }
            $validator = \Validator::make(
                $request->all(),
                $rules
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            $arrEnv = [
                'RECAPTCHA_MODULE' => $request->recaptcha_module ?? 'no',
                'NOCAPTCHA_SITEKEY' => $request->google_recaptcha_key,
                'NOCAPTCHA_SECRET' => $request->google_recaptcha_secret,
            ];
            if (Utility::setEnvironmentValue($arrEnv)) {
                return redirect()->back()->with('success', __('Recaptcha Settings updated successfully'));
            } else {
                return redirect()->back()->with('error', __('Something is wrong'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function termAndConditionStore(Request $request)
    {
        if (\Auth::user()->type == 'super admin') {

            
            $lang =  App::currentLocale();
            $languages = Utility::languages();
            $store = Store::find(Auth::user()->current_store);
            $settings = Setting::where('name', 'term_and_condition')->first();

            $validator = \Validator::make(
                $request->all(),
                [
                    "$lang" . '_contents' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $data = [];
            foreach ($languages as $lang) {
                $contents  = $request["$lang" . '_contents'];
                $data[$lang] = $contents;
                // PageOptionLangs::create($data);
            }

            $setting = Setting::updateOrCreate(
                [
                    'name' => "term_and_condition",
                ],
                [
                    'value' => json_encode($data),
                    'created_by' => 0,
                ]
            );

            if($setting->updated_at == $settings->updated_at){
                //this means no any changes made to the agreement
            }else{
            $users = User::where('is_verified', 1)->get();
            // this is the test version
            // $store = Store::find(1);
            // try {
            //     Utility::sendEmailTemplate('Term Has Changed', "ishan.firebirdz@gmail.com", null, $store, null);
            // } catch (\Exception $e) {
            //     print_r($e->getMessage());
            // }

            foreach ($users as $user) {

                $store = Store::find($user->current_store);

                try {
                    Utility::sendEmailTemplate('Term Has Changed', $user->email, null, $store, null);
                } catch (\Exception $e) {
                    print_r($e->getMessage());
                }
            }
                
            }



            return redirect()->back()->with('success', __('Setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function manageLanguage(Request $request, $slug)
    {
        if (Auth::user()->type == 'Owner') {
            $store = Auth::user()->current_store;

            Language::updateOrCreate(
                [
                    'store_id' => $store,
                ],
                [
                    'store_id' => $store,
                    'languages' => json_encode($request->lang),
                ],
            );

            return redirect()->back()->with('success', __('Language change successfully.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function storeSharingContent(Request $request)
    {
        if (Auth::user()->type == 'Owner') {

            $validator = \Validator::make(
                $request->all(),
                [
                    'slug' => 'required|string|max:255',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $shareable_store = Store::where('slug', $request->slug)->first();
            $store = Store::find(Auth::user()->current_store);
            Utility::shareContentBetweenStores($shareable_store, $store);


            // $columns = DB::select("SELECT GROUP_CONCAT(column_name) as names FROM information_schema.columns WHERE table_schema=? AND table_name=?", [env('DB_DATABASE'), "stores"]);
            // $columns = explode(",", $columns[0]->names);

            // foreach ($columns as $column) {

            //     switch ($column) {
            //         case "id":
            //         case "name":
            //         case "email":
            //         case "slug":
            //         case "created_by":
            //         case "created_at":
            //             break;
            //         default:
            //             if (isset($shareable_store[$column])) {
            //                 $store[$column] = $shareable_store[$column];
            //                 // echo "$column - store [".$store[$column]."]  shareable_store [".$shareable_store[$column]."] <br>";
            //             }
            //             break;
            //     }
            // }
            // $store->update();

            // //duplicate payment settings
            // $storePSShareable = StorePaymentSettings::where('store_id', $shareable_store->id)->get();
            // foreach ($storePSShareable as $row) {
            //     $arr = [
            //         'name' => $row->name,
            //         'value' => $row->value,
            //         'store_id' => $store->id,
            //         'created_by' => Auth::user()->creatorId(),
            //     ];
            //     StorePaymentSettings::updateOrCreate(
            //         [
            //             'name' => $row->name,
            //             'store_id' => $store->id,
            //         ],
            //         $arr
            //     );
            // }


            return redirect()->back()->with('success', __("Content of the :theme1 was copied to :theme2 successfully!", ["theme1" => $shareable_store->name, "theme2" => $store->name]));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function layout(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;

            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.layout', compact('store_settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function siteSetting(Request $request)
    {

        $settings = Utility::settings();
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            // if (Auth::user()->type == 'super admin') {
            //     $admin_payment_setting = Utility::getAdminPaymentSetting();
            //     return view('settings.index', compact('settings', 'admin_payment_setting'));
            // } else {
            //     if ($this->store_settings) {
            $store_settings = $this->store_settings;

            $plan = Plan::where('id', $this->user->plan)->first();
            $copyright_plan = CopyrightPlan::where('id', $this->user->copyright_plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.site_setting', compact('store_settings', 'copyright_plan', 'settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
        // }
    }
    public function settings(Request $request)
    {
        $settings = Utility::settings();
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;

            $serverName = str_replace(
                [
                    'http://',
                    'https://',
                ],
                '',
                env('APP_URL')
            );

            $serverIp = gethostbyname($serverName);
            if ($serverIp == $_SERVER['SERVER_NAME']) {
                $serverIp;
            } else {
                $serverIp = request()->server('REMOTE_ADDR');
            }

            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.settings', compact('store_settings', 'serverIp', 'settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function payments(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;

            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.payments', compact('store_settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function emailSetting(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;


            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.email_setting', compact('store_settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function whatsappSetting(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;


            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.whatsapp_setting', compact('store_settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function twilioSetting(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;


            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.twilio_setting', compact('store_settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function manageLanguages(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;

            $store_languages = Utility::getStoreLanguages();

            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.manage_languages', compact('store_settings', 'store_languages', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function contentSharing(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;

            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.content_sharing', compact('store_settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function smartsuppSettings(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;

            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.smartsupp_settings', compact('store_settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function cookieBotSettings(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;

            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.cookie_bot_settings', compact('store_settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function mobileDe(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;

            $plan = Plan::where('id', $this->user->plan)->first();
            // $app_url = trim(env('APP_URL'), '/');
            // $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.mobile_de', compact('store_settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function storeMobileDe(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'is_mobilede_api_enabled' => 'required',
                    'mobilede_api_username' => 'required|string|max:45',
                    'mobilede_api_password' => 'required|string|max:45',
                    'mobilede_api_seller_id' => 'required|string|max:45',
                    'mobilede_api_mode' => 'required|string|max:10',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $this->store_settings['is_mobilede_api_enabled'] = $request->is_mobilede_api_enabled ?? 'off';
            $this->store_settings['mobilede_api_username'] = $request->mobilede_api_username;
            $this->store_settings['mobilede_api_password'] = $request->mobilede_api_password;
            $this->store_settings['mobilede_api_seller_id'] = $request->mobilede_api_seller_id;
            $this->store_settings['mobilede_api_mode'] = $request->mobilede_api_mode;
            $this->store_settings->update();

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function storeLiveChat(Request $request)
    {
        if (Auth::user()->type == 'Owner') {

            $validator = \Validator::make(
                $request->all(),
                [
                    'smartsupp_api_mode' => 'required|string',
                    'smartsupp_api_key' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $store = Store::find(Auth::user()->current_store);

            $store->smartsupp_key = $request->smartsupp_api_key;

            if (isset($request->is_smartsupp_enable)) {
                $store->is_smartsupp_enable = 'on';
            } else {
                $store->is_smartsupp_enable = 'off';
            }

            $store->smartsupp_api_mode = $request->smartsupp_api_mode;
            $store->update();

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function storeCookieBot(Request $request)
    {
        if (Auth::user()->type == 'Owner') {

            $store = Store::find(Auth::user()->current_store);
            if (isset($request->is_cookiebot_enable) && $request->is_cookiebot_enable == 'on') {

                $validator = \Validator::make(
                    $request->all(),
                    [
                        'cookiebot_api_mode' => 'required|string',
                        'cookie_bot_group_id' => 'required|string',
                    ]
                );

                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $store->cookiebot_group_id = $request->cookie_bot_group_id;
                // if (isset($request->is_cookiebot_enable)) {
                //     $store->is_cookiebot_enable = 'on';
                // } else {
                //     $store->is_cookiebot_enable = 'off';
                // }

                $store->is_cookiebot_enable = 'on';
            } else {
                $store->is_cookiebot_enable = 'off';
            }

            $store->update();


            Utility::updateInitialSetup("cookie-bot");

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function updateFreeTrialMsg(Request $request)
    {
        if (Auth::user()->type == 'Owner') {

            $this->user->free_trial_status = 1;
            $this->user->save();
            return response()->json();
        }
    }

    public function initialSetup(Request $request)
    {

        $settings = Utility::settings();
        $user = Auth::user();

        if ($user->initial_setup) {
            $initial_setup = json_decode($user->initial_setup);
            if (in_array('company-overview', $initial_setup) && in_array('layouts', $initial_setup) && in_array('cookie-bot', $initial_setup)) {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }

        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;

            $serverName = str_replace(
                [
                    'http://',
                    'https://',
                ],
                '',
                env('APP_URL')
            );

            $serverIp = gethostbyname($serverName);
            if ($serverIp == $_SERVER['SERVER_NAME']) {
                $serverIp;
            } else {
                $serverIp = request()->server('REMOTE_ADDR');
            }

            $plan = Plan::where('id', $this->user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $store_settings['store_url'] = $app_url . '/store/' . $store_settings['slug'];

            return view('settings.initial-setup', compact('store_settings', 'serverIp', 'settings', 'plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
