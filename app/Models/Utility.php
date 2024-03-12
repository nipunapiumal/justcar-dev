<?php

namespace App\Models;

use App\Mail\CommonEmailTemplate;
use App\Models\EmailTemplateLang;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;
use Twilio\Rest\Client;
use XMLReader;

class Utility extends Model
{
    public function createSlug($table, $title, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title, '-');
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($table, $slug, $id);
        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($table, $slug, $id = 0)
    {

        if ($table == "page_options") {
            return DB::table($table)->select()->where('slug', 'like', $slug . '%')->where('id', '<>', $id)->get();
        } else {
            return DB::table($table)->select()->where('slug', 'like', $slug . '%')->where('id', '<>', $id)->get();
        }
    }

    public static function settings($creator = "")
    {

        $data = DB::table('settings');
        if (\Auth::check()) {
            if (!$creator) {
                $creator = \Auth::user()->creatorId();
            }

            $data = $data->where('created_by', '=', $creator)->get();

            if (count($data) == 0) {
                $data = DB::table('settings')->where('created_by', '=', 1)->get();
            }
        } else {

            $data->where('created_by', '=', 1);
            $data = $data->get();
        }

        $settings = [
            "site_currency" => "EUR",
            "site_currency_symbol" => "$",
            "currency_symbol_position" => "pre",
            "logo_dark" => "logo-dark.png",
            "logo_light" => "logo-light.png",
            "currency_symbol" => "",
            "currency" => "",
            "site_date_format" => "M j, Y",
            "site_time_format" => "g:i A",
            "company_name" => "",
            "company_address" => "",
            "company_city" => "",
            "company_state" => "",
            "company_zipcode" => "",
            "company_country" => "",
            "company_telephone" => "",
            "company_email" => "",
            "company_email_from_name" => "",
            "invoice_prefix" => "#INV",
            "invoice_color" => "ffffff",
            "quote_template" => "template1",
            "quote_color" => "ffffff",
            "salesorder_template" => "template1",
            "salesorder_color" => "ffffff",
            "proposal_prefix" => "#PROP",
            "proposal_color" => "fffff",
            "bill_prefix" => "#BILL",
            "bill_color" => "fffff",
            "quote_prefix" => "#QUO",
            "salesorder_prefix" => "#SOP",
            "vender_prefix" => "#VEND",
            "footer_title" => "",
            "footer_notes" => "",
            "invoice_template" => "template1",
            "bill_template" => "template1",
            "proposal_template" => "template1",
            "default_language" => "en",
            "enable_stripe" => "",
            "enable_paypal" => "",
            "paypal_mode" => "",
            "paypal_client_id" => "",
            "paypal_secret_key" => "",
            "stripe_key" => "",
            "stripe_secret" => "",
            "decimal_number" => "2",
            "tax_type" => "VAT",
            "shipping_display" => "on",
            "footer_link_1" => "Support",
            "footer_value_1" => "#",
            "footer_link_2" => "Terms",
            "footer_value_2" => "#",
            "footer_link_3" => "Privacy",
            "footer_value_3" => "#",
            "display_landing_page" => "on",
            "title_text" => "JustCar.me - Die Händler Webseite",
            "footer_text" => "JustCar.me",
            "company_logo_light" => "logo-light.png",
            "company_logo_dark" => "logo-dark.png",
            "company_favicon" => "",
            "gdpr_cookie" => "",
            "cookie_text" => "",
            "signup_button" => "on",
            "premium_free_trial" => "on",
            "cust_theme_bg" => "on",
            "cust_darklayout" => "off",
            "color" => "theme-4",
            "SITE_RTL" => "off",
            "is_checkout_login_required" => "on",
            "vat_number" => "",
            "city" => "",
            "zip_code" => "",
            "address" => "",
            "phone_number" => "",
            "fax_number" => "",
            "email" => "",
            "website" => "",
            "bank_number" => "",
        ];


        $languages = Utility::languages();
        $additional_settings = [];
        foreach ($languages as $lang) {
            $additional_settings  = $lang . "_terms_and_conditions";
            $settings[$additional_settings] = "";
        }

        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }

    public static function languages($slug = null)
    {


        if (!$slug) {
            $dir = base_path() . '/resources/lang/';
            $glob = glob($dir . "*", GLOB_ONLYDIR);

            $arrLang = array_map(
                function ($value) use ($dir) {
                    return str_replace($dir, '', $value);
                },
                $glob
            );
            $arrLang = array_map(
                function ($value) use ($dir) {
                    return preg_replace('/[0-9]+/', '', $value);
                },
                $arrLang
            );
            $arrLang = array_filter($arrLang);
        } else {
            $store = Store::where('slug', $slug)->first();
            $languages = Language::where('store_id', $store->id)->first();

            if (isset($languages->languages)) {
                $arrLang = json_decode($languages->languages);
            } else {
                $arrLang = [env('default_language') ?? 'en'];
            }
        }
        return $arrLang;
    }

    public static function getValByName($key, $creator = '')
    {

        $setting = Utility::settings($creator);

        if (!isset($setting[$key]) || empty($setting[$key])) {
            $setting[$key] = '';
        }
        return $setting[$key];
    }




    public static function getPaymentSetting($store_id = null)
    {
        $data = DB::table('store_payment_settings');
        $settings = [];
        if (\Auth::check()) {
            $store_id = \Auth::user()->current_store;
            $data = $data->where('store_id', '=', $store_id);
        } else {
            $data = $data->where('store_id', '=', $store_id);
        }
        $data = $data->get();
        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }

    public static function getStoreThemeSetting($store_id = null, $theme_name = null)
    {
        $data = DB::table('store_theme_settings');
        $settings = [];

        $store_id = \Auth::user()->current_store;
        if (\Auth::check()) {
            $data = $data->where('store_id', '=', $store_id)->where('theme_name', $theme_name);
        } else {
            $data = $data->where('store_id', '=', $store_id)->where('theme_name', $theme_name);
        }
        $data = $data->get();


        if ($data->count() > 0) {
            foreach ($data as $row) {

                if ($row->langs_available == 1) {
                    $settings[$row->name] = StoreThemeSettingLangs::where('parent_id', $row->id)->pluck('value', 'lang');
                } else {
                    $settings[$row->name] = $row->value;
                }
            }
        }
        return $settings;
    }

    public static function getDateFormated($date, $time = false)
    {
        if (!empty($date) && $date != '0000-00-00') {
            if ($time == true) {
                return date("d M Y H:i A", strtotime($date));
            } else {
                return date("d M Y", strtotime($date));
            }
        } else {
            return '';
        }
    }

    public static function demoStoreThemeSetting($store_id = null, $theme_name = null)
    {
        $data = StoreThemeSettings::where('store_id', $store_id)->where('theme_name', $theme_name)->get();

        $settings = [
            "enable_top_bar" => "off",
            "top_bar_title" => "FREE SHIPPING world wide for all orders over $199",
            "top_bar_number" => "089 - 2000 851 20",
            "top_bar_whatsapp" => "https://wa.me/4989200085120",
            "top_bar_instagram" => "https://instagram.com/",
            "top_bar_twitter" => "https://twitter.com/",
            "top_bar_messenger" => "https://messenger.com/",

            "enable_header_img" => "off",
            "header_title" => "JustCar.me",
            "header_desc" => "The new generation of car dealer websites is here.",
            "button_text" => "Read More",
            "header_img" => "header_img_1.jpg",

            "enable_features" => "off",
            "enable_features1" => "off",
            "enable_features2" => "off",
            "enable_features3" => "off",

            "features_icon1" => '<i class="fa fa-tags"></i>',
            "features_title1" => 'Car Dealer',
            "features_description1" => 'Sell cars on your own Website.',

            "features_icon2" => '<i class="fas fa-store"></i>',
            "features_title2" => '+50 Designs',
            "features_description2" => '+ 50 Website-Design availible.',

            "features_icon3" => '<i class="fa fa-percentage"></i>',
            "features_title3" => 'Stats',
            "features_description3" => 'Real time statistics. Statistics, visits, devices,',

            "enable_email_subscriber" => "off",
            "subscriber_title" => "Newsletter",
            "subscriber_sub_title" => "Subscribe for free our Newsletter.",
            "subscriber_img" => "email_subscriber_1.png",

            "enable_categories" => "off",
            "categories" => "Our Vehicles",
            "categories_title" => "Discover used cars with a guarantee",

            "enable_testimonial" => "off",

            "enable_testimonial1" => "off",
            "testimonial_main_heading_title" => 'That\'s what customers say about us.',
            "testimonial_main_heading" => 'Testimonial',
            "testimonial_img1" => 'avatar.png',

            "testimonial_name1" => 'Mike',
            "testimonial_about_us1" => 'Buyer from Israel',
            "testimonial_description1" => 'Dealer was responsive and helpful. A wonderful experience',

            "enable_testimonial2" => "off",
            "testimonial_img2" => 'avatar.png',
            "testimonial_name2" => 'Natalie',
            "testimonial_about_us2" => 'From Warschau',
            "testimonial_description2" => 'Very competent, friendly and accommodating.',

            "enable_testimonial3" => "off",
            "testimonial_img3" => 'avatar.png',
            "testimonial_name3" => 'Steffan',
            "testimonial_about_us3" => 'From Frankfurt',
            "testimonial_description3" => 'Accurate and honest answer',

            "enable_brand_logo" => "on",
            "brand_logo" => implode(
                ',',
                [
                    'brand-1.png',
                    'brand-2.png',
                    'brand-3.png',
                    'brand-4.png',
                    'brand-5.png',
                    'brand-6.png',
                    'brand-7.png',
                    'brand-8.png',
                    'brand-9.png',
                    'brand-10.png',
                    'brand-11.png',
                    'brand-12.png',
                ]
            ),

            "quick_link_header_name21" => "About",
            "quick_link_header_name41" => "Company",

            "quick_link_name1" => __('Home Pages'),
            "quick_link_url1" => '#Home Pages',

            "enable_footer_note" => "off",
            "enable_quick_link1" => "off",
            "enable_quick_link2" => "off",
            "enable_quick_link3" => "off",
            "enable_quick_link4" => "off",

            "quick_link_header_name1" => __("Theme Pages"),
            "quick_link_header_name2" => __("About"),
            "quick_link_header_name3" => __("Company"),
            "quick_link_header_name4" => __("Company"),

            "quick_link_name11" => __('Home Pages'),
            "quick_link_name12" => __('Pricing'),
            "quick_link_name13" => __('Contact Us'),
            "quick_link_name14" => __('Team'),

            "quick_link_name21" => __('Blog'),
            "quick_link_name22" => __('Help Center'),
            "quick_link_name23" => __('Sales Tools Catalog'),
            "quick_link_name24" => __('Academy'),

            "quick_link_name31" => __('Terms and Policy'),
            "quick_link_name32" => __('About us'),
            "quick_link_name33" => __('Support'),
            "quick_link_name34" => __('About us'),

            "quick_link_name41" => __('Terms and Policy'),
            "quick_link_name42" => __('About us'),
            "quick_link_name43" => __('Support'),
            "quick_link_name44" => __('About us'),

            "quick_link_url11" => '#',
            "quick_link_url12" => '#',
            "quick_link_url13" => '#',
            "quick_link_url14" => '#',

            "quick_link_url21" => '#',
            "quick_link_url22" => '#',
            "quick_link_url23" => '#',
            "quick_link_url24" => '#',

            "quick_link_url31" => '#',
            "quick_link_url32" => '#',
            "quick_link_url33" => '#',
            "quick_link_url34" => '#',

            "quick_link_url41" => '#',
            "quick_link_url42" => '#',
            "quick_link_url43" => '#',
            "quick_link_url44" => '#',

            "footer_logo" => "footer_logo.png",
            "footer_desc" => "Nowadays, It isn't great uncommon to see lenders rapidly adopting a new digital",
            "footer_number" => "(987)654321",

            "enable_footer" => "on",
            "email" => "info@justcar.me",
            "whatsapp" => "https://api.whatsapp.com/",
            "facebook" => "https://www.facebook.com/",
            "instagram" => "https://www.instagram.com/",
            "twitter" => "https://twitter.com/",
            "youtube" => "https://www.youtube.com/",
            "footer_note" => "© 2023 JustCar. All rights reserved",
            "storejs" => "<script>console.log('hello');</script>",

            "premium_plus_primary_color" => "#099fdc",
            "premium_plus_secondary_color" => "#0b6afb",
            "premium_plus_tertiary_color" => "#262c36",
            "premium_plus_quaternary_color" => "#343c4a",

            "sidebar_panel_background_color" => "#0A2357",
            "sidebar_panel_foreground_color" => "#ffffff",


        ];

        switch ($theme_name) {
            case "theme23":
            case "theme24":
            case "theme25":
            case "theme26":
            case "theme27":
            case "theme28":
                $settings['premium_plus_primary_color'] = '#f0151f';
                $settings['premium_plus_secondary_color'] = '#0c47a9';
                break;
            case "theme29":
            case "theme30":
            case "theme31":
            case "theme32":
            case "theme33":
            case "theme34":
                $settings['premium_plus_primary_color'] = '#46D993';
                break;
            case "theme35":
                $settings['premium_plus_primary_color'] = '#46D993';
                break;
            case "theme36":
                $settings['premium_plus_primary_color'] = '#3813c2';
                break;
            case "theme37":
                $settings['premium_plus_primary_color'] = '#E45711';
                break;
        }


        // if ($theme_name == 'theme2') {
        //     $settings['header_img'] = 'header_img_2.png';
        //     $settings['subscriber_img'] = "email_subscriber_2.png";
        //     $settings['footer_logo2'] = "footer_logo2.png";
        //     $settings['brand_logo'] = implode(
        //         ',',
        //         [
        //             'brand_logo2.png',
        //             'brand_logo2.png',
        //             'brand_logo2.png',
        //             'brand_logo2.png',
        //             'brand_logo2.png',
        //             'brand_logo2.png',
        //         ]
        //     );
        // }

        // if ($theme_name == 'theme3') {
        //     $settings['header_img'] = 'header_img_3.png';
        //     $settings['testimonial_img1'] = 'testimonail-img_3.png';
        //     $settings['testimonial_img2'] = 'testimonail-img_3.png';
        //     $settings['testimonial_img3'] = 'testimonail-img_3.png';
        //     $settings['banner_img'] = 'header_img_3.png';
        //     $settings['enable_banner_img'] = 'on';
        //     $settings['testimonial_main_heading_title'] = 'StoreGo';
        //     $settings['footer_logo3'] = "footer_logo3.png";
        // }

        // if ($theme_name == 'theme4') {
        //     $settings['header_img'] = 'header_img_4.png';
        //     $settings['banner_img'] = 'image-big-4.jpg';
        //     $settings['enable_banner_img'] = 'on';
        //     $settings['subscriber_img'] = "email_subscriber_2.png";
        //     $settings['brand_logo'] = implode(
        //         ',',
        //         [
        //             'brand_logo4.png',
        //             'brand_logo4.png',
        //             'brand_logo4.png',
        //             'brand_logo4.png',
        //             'brand_logo4.png',
        //             'brand_logo4.png',
        //         ]
        //     );
        //     $settings['footer_logo4'] = "footer_logo4.png";
        // }

        // if ($theme_name == 'theme5') {
        //     $settings['header_img'] = 'header_img_5.png';
        //     $settings['brand_logo'] = implode(
        //         ',',
        //         [
        //             'brand_logo5.png',
        //             'brand_logo5.png',
        //             'brand_logo5.png',
        //             'brand_logo5.png',
        //             'brand_logo5.png',
        //             'brand_logo5.png',
        //         ]
        //     );
        //     $settings['footer_logo5'] = "footer_logo5.png";
        // }



        $settings['enable_sidebar_panel'] = 'off';
        $settings['opening_hours'] = 'Monday – Friday: 09:00AM – 09:00PM
        Saturday: 09:00AM – 07:00PM
        Sunday: Closed';
        $settings['office_address'] = 'Stöberlstrasse 80
        80686 München';
        $settings['quick_contact_info'] = 'Are you a vehicle dealer without your own website? Go a new way with your own website.';
        $settings['contact_info_phone_no'] = '089200085120';
        $settings['contact_info_email'] = 'info@justcar.me';

        // $sliderSettings = [
        //     0 => [
        //         "slider_image" => "header_img_4.png",
        //         "slider_title" => "Title 1",
        //         "slider_description" => "Desc 1",

        //     ],
        //     1 => [
        //         "slider_image" => "header_img_4.png",
        //         "slider_title" => "Title 1",
        //         "slider_description" => "Desc 1",

        //     ],
        // ];

        $sliderSettings = [
            "en" => [
                0 => [
                    "slider_image" => "header_img_4.jpg",
                    "slider_title" => "JustCar.me",
                    "slider_description" => "The new generation of car dealer websites is here",

                ],
                1 => [
                    "slider_image" => "header_img_5.jpg",
                    "slider_title" => "JustCar.me",
                    "slider_description" => "JustCar.me - The Dealer Homepage",

                ],
            ],
            "de" => [
                0 => [
                    "slider_image" => "header_img_4.jpg",
                    "slider_title" => "JustCar.me",
                    "slider_description" => "The new generation of car dealer websites is here",

                ],
                1 => [
                    "slider_image" => "header_img_5.jpg",
                    "slider_title" => "JustCar.me",
                    "slider_description" => "JustCar.me - The Dealer Homepage",

                ],
            ]
        ];

        $settings['slider_settings'] = json_encode($sliderSettings);
        $settings['enable_slider_settings'] = "on";

        $settings['enable_gallery'] = "off";
        $settings['gallery_title'] = "Showroom";
        $settings['gallery_description'] = "Your expert for premium and luxury websites";

        $settings['enable_job_board'] = "off";
        $settings['job_board_title'] = "Career";
        $settings['job_board_description'] = "We are pleased to meet you.";

        if ($data->count() > 0) {
            foreach ($data as $row) {

                if ($row->langs_available == 1) {
                    //find the translation in activated language
                    $storeThemeSettingLangs = StoreThemeSettingLangs::where('parent_id', $row->id)->where('lang', App::currentLocale())->first();
                    // $settings[$row->name] = (empty($storeThemeSettingLangs->value) ? '' : $storeThemeSettingLangs->value);

                    if (empty($storeThemeSettingLangs->value)) {
                        //find the translation in en if above condition is not true
                        $storeThemeSettingLangs = StoreThemeSettingLangs::where('parent_id', $row->id)->where('lang', 'en')->first();
                        $settings[$row->name] = (empty($storeThemeSettingLangs->value) ? $settings[$row->name] : $storeThemeSettingLangs->value);
                    } else {
                        $settings[$row->name] = $storeThemeSettingLangs->value;
                    }
                } else {
                    $settings[$row->name] = $row->value;
                }
            }
        }

        
        $store = Store::find($store_id);
        $creator = User::find($store->created_by);
        $plan = Plan::find($creator->plan);

        if (isset($settings['footer_menu_1']) && $settings['footer_menu_1']) {
            $i = 1;
            foreach (json_decode($settings['footer_menu_1']) as $menu_title) {

                $info = Utility::generateLink($menu_title, $settings, $store, $plan);
                if ($info) {
                    $settings["quick_link_url1" . $i] =  $info["link_url"];
                    $settings["quick_link_name1" . $i] = $info["link_name"];
                }
                $i++;
            }
        }
        if (isset($settings['footer_menu_2']) && $settings['footer_menu_2']) {
            $i = 1;
            foreach (json_decode($settings['footer_menu_2']) as $menu_title) {

                $info = Utility::generateLink($menu_title, $settings, $store, $plan);
                if ($info) {
                    $settings["quick_link_url2" . $i] =  $info["link_url"];
                    $settings["quick_link_name2" . $i] = $info["link_name"];
                }
                $i++;
            }
        }
        if (isset($settings['footer_menu_3']) && $settings['footer_menu_3']) {
            $i = 1;
            foreach (json_decode($settings['footer_menu_3']) as $menu_title) {

                $info = Utility::generateLink($menu_title, $settings, $store, $plan);
                if ($info) {
                    $settings["quick_link_url3" . $i] =  $info["link_url"];
                    $settings["quick_link_name3" . $i] = $info["link_name"];
                }
                $i++;
            }
        }

        if (isset($settings['footer_menu_4']) && $settings['footer_menu_4']) {
            $i = 1;
            foreach (json_decode($settings['footer_menu_4']) as $menu_title) {

                $info = Utility::generateLink($menu_title, $settings, $store, $plan);
                if ($info) {
                    $settings["quick_link_url4" . $i] =  $info["link_url"];
                    $settings["quick_link_name4" . $i] = $info["link_name"];
                }
                $i++;
            }
        }



        // footer_type has 2 options. 1 = Standard/ 2 = Personalized
        // which is the owner can select existing custom pages or add his own names & urls. 
        // if (isset($settings["footer_type_1"]) && $settings["footer_type_1"] == 1) {
        //     $page_slug_url = PageOption::get_page_slug($settings["standard_link_1"]);

        //     if (isset($page_slug_url->slug)) {
        //         $settings["quick_link_url1"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name1"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_2"]);
        //         $settings["quick_link_url12"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name12"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_3"]);
        //         $settings["quick_link_url13"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name13"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_4"]);
        //         $settings["quick_link_url14"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name14"] = ucfirst($page_slug_url->name);
        //     }
        // }


        // if (isset($settings["footer_type_2"]) && $settings["footer_type_2"] == 1) {

        //     if (isset($page_slug_url->slug)) {
        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_21"]);
        //         $settings["quick_link_url21"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name21"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_22"]);
        //         $settings["quick_link_url22"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name22"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_23"]);
        //         $settings["quick_link_url23"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name23"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_24"]);
        //         $settings["quick_link_url24"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name24"] = ucfirst($page_slug_url->name);
        //     }
        // }

        // if (isset($settings["footer_type_3"]) && $settings["footer_type_3"] == 1) {

        //     if (isset($page_slug_url->slug)) {
        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_31"]);
        //         $settings["quick_link_url31"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name31"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_32"]);
        //         $settings["quick_link_url32"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name32"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_33"]);
        //         $settings["quick_link_url33"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name33"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_34"]);
        //         $settings["quick_link_url34"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name34"] = ucfirst($page_slug_url->name);
        //     }
        // }

        // if (isset($settings["footer_type_4"]) && $settings["footer_type_4"] == 1) {

        //     if (isset($page_slug_url->slug)) {
        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_41"]);
        //         $settings["quick_link_url41"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name41"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_42"]);
        //         $settings["quick_link_url42"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name42"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_43"]);
        //         $settings["quick_link_url43"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name43"] = ucfirst($page_slug_url->name);

        //         $page_slug_url = PageOption::get_page_slug($settings["standard_link_44"]);
        //         $settings["quick_link_url44"] = env('APP_URL') . '/page/' . $page_slug_url->slug;
        //         $settings["quick_link_name44"] = ucfirst($page_slug_url->name);
        //     }
        // }



        foreach ($settings as $key => $data) {

            $arr = [
                'name' => $key,
                'value' => $data,
                'type' => null,
                'store_id' => $store->id,
                'theme_name' => $store->theme_dir,
                'created_by' => $store->created_by,
            ];

            switch ($key) {
                case "top_bar_title":
                case "header_title":
                case "header_desc":
                case "button_text":
                case "quick_contact_info":
                case "office_address":
                case "opening_hours":
                case "gallery_title":
                case "gallery_description":
                case "subscriber_title":
                case "subscriber_sub_title":
                case "categories":
                case "categories_title":
                case "testimonial_main_heading":
                case "testimonial_main_heading_title":
                case "testimonial_name1":
                case "testimonial_about_us1":
                case "testimonial_description1":
                case "testimonial_name2":
                case "testimonial_about_us2":
                case "testimonial_description2":
                case "testimonial_name3":
                case "testimonial_about_us3":
                case "testimonial_description3":
                case "quick_link_header_name1":
                case "quick_link_name1":
                case "quick_link_name12":
                case "quick_link_name13":
                case "quick_link_name14":
                case "quick_link_header_name2":
                case "quick_link_name21":
                case "quick_link_name22":
                case "quick_link_name23":
                case "quick_link_name24":
                case "quick_link_header_name3":
                case "quick_link_name31":
                case "quick_link_name32":
                case "quick_link_name33":
                case "quick_link_name34":
                case "features_title1":
                case "features_description1":
                case "features_title2":
                case "features_description2":
                case "features_title3":
                case "features_description3":
                case "job_board_title":
                case "job_board_description":

                    $arr =  array_merge($arr, ["langs_available" => 1]);
                    break;
            }

            // print_r($arr);
            // echo "-------------------<br><br>";

            StoreThemeSettings::updateOrCreate(
                [
                    'name' => $key,
                    'store_id' => $store->id,
                    'theme_name' => $store->theme_dir,
                ],
                $arr
            );
        }


        return $settings;
    }

    public static function getAdminPaymentSetting()
    {
        $data = DB::table('admin_payment_settings');
        $settings = [];
        if (\Auth::check()) {
            $user_id = 1;
            $data = $data->where('created_by', '=', $user_id);
        }
        $data = $data->get();
        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }

    public static function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}='{$envValue}'\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}='{$envValue}'", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        $str .= "\n";
        if (!file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }

    public static function templateData()
    {
        $arr = [];
        $arr['colors'] = [
            '003580',
            '666666',
            '6676ef',
            'f50102',
            'f9b034',
            'fbdd03',
            'c1d82f',
            '37a4e4',
            '8a7966',
            '6a737b',
            '050f2c',
            '0e3666',
            '3baeff',
            '3368e6',
            'b84592',
            'f64f81',
            'f66c5f',
            'fac168',
            '46de98',
            '40c7d0',
            'be0028',
            '2f9f45',
            '371676',
            '52325d',
            '511378',
            '0f3866',
            '48c0b6',
            '297cc0',
            'ffffff',
            '000',
        ];
        $arr['templates'] = [
            "template1" => "New York",
            "template2" => "Toronto",
            "template3" => "Rio",
            "template4" => "London",
            "template5" => "Istanbul",
            "template6" => "Mumbai",
            "template7" => "Hong Kong",
            "template8" => "Tokyo",
            "template9" => "Sydney",
            "template10" => "Paris",
        ];

        return $arr;
    }

    public static function themeOne()
    {
        $arr = [];
        $arr = [
            'theme6' => [],
            'theme7' => [],
            'theme8' => [],
            'theme9' => [],
            'theme10' => [],
            'theme11' => [],
            'theme12' => [],
            'theme13' => [],
            'theme14' => [],
            'theme15' => [],
            'theme16' => [],
            'theme17' => [],
            'theme18' => [],
            'theme19' => [],
            'theme20' => [],
            'theme21' => [],
            
        ];

        return $arr;
    }

    public static function productThemes()
    {
        $arr = [];

        // $arr = [
        //     'theme1' => [
        //         'green-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home.jpg')),
        //             'color' => '92bd88',
        //         ],
        //         'geen-blue-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-1.png')),
        //             'color' => '276968',
        //         ],
        //         'geen-brown-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-2.png')),
        //             'color' => 'af8637',
        //         ],
        //         'geen-white-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-3.png')),
        //             'color' => 'e7d7bd',
        //         ],
        //         'green-Pink-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-4.png')),
        //             'color' => 'b7786f',
        //         ],
        //     ],

        //     'theme2' => [
        //         'blue-yellow-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home.jpg')),
        //             'color' => 'f5ba20',
        //         ],
        //         'blue-pink-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home-1.png')),
        //             'color' => 'fa747d',
        //         ],
        //         'blue-cream-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home-2.png')),
        //             'color' => 'c8ae9d',
        //         ],
        //         'blue-white-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home-3.png')),
        //             'color' => 'd7e2dc',
        //         ],
        //         'blue-sky-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home-4.png')),
        //             'color' => '5ea5ab',
        //         ],
        //     ],

        //     'theme3' => [
        //         'white-yellow-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home.jpg')),
        //             'color' => 'f6e32f',
        //         ],
        //         'white-geen-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home-1.png')),
        //             'color' => '7db802',
        //         ],
        //         'white-blue-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home-2.png')),
        //             'color' => '3e77ea',
        //         ],
        //         'white-black-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home-3.png')),
        //             'color' => '2b2d2d',
        //         ],
        //         'white-pink-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home-4.png')),
        //             'color' => 'ffccb4',
        //         ],
        //     ],

        //     'theme4' => [
        //         'light-blue-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home.jpg')),
        //             'color' => '5e7698',
        //         ],
        //         'light-green-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home-1.png')),
        //             'color' => '88d297',
        //         ],
        //         'light-cream-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home-2.png')),
        //             'color' => 'c9aea7',
        //         ],
        //         'light-black-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home-3.png')),
        //             'color' => '2f343a',
        //         ],
        //         'light-orange-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home-4.png')),
        //             'color' => 'f3ba51',
        //         ],
        //     ],

        //     'theme5' => [
        //         'dark-sky-blue-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home.jpg')),
        //             'color' => '007aff',
        //         ],
        //         'dark-yellow-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home-1.png')),
        //             'color' => 'febd00',
        //         ],
        //         'dark-green-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home-2.png')),
        //             'color' => '05d79f',
        //         ],
        //         'dark-pink-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home-3.png')),
        //             'color' => 'e91e63',
        //         ],
        //         'dark-blue-color.css' => [
        //             'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home-4.png')),
        //             'color' => '2b2d42',
        //         ],
        //     ],
        // ];

        return $arr;
    }

    public static function premiumThemes()
    {
        $arr = [];

        return $arr;
    }

    public static function premiumPlusThemes()
    {
        $arr = [
            'theme23' => [],
            'theme24' => [],
            'theme25' => [],
            'theme26' => [],
            'theme27' => [],
            'theme28' => [],
            'theme29' => [],
            'theme30' => [],
            'theme31' => [],
            'theme32' => [],
            'theme33' => [],
            'theme34' => [],
            'theme35' => [],
            'theme36' => [],
            'theme37' => [],
            'themePlus1' => [], //we converted this premium theme as a free theme
        ];

        // $arr = [
        //     'themePlus1' => [
        //         // 'green-color.css' => [
        //         //     'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home.jpg')),
        //         //     'color' => '92bd88',
        //         // ],
        //         // 'geen-blue-color.css' => [
        //         //     'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-1.png')),
        //         //     'color' => '276968',
        //         // ],
        //         // 'geen-brown-color.css' => [
        //         //     'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-2.png')),
        //         //     'color' => 'af8637',
        //         // ],
        //         // 'geen-white-color.css' => [
        //         //     'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-3.png')),
        //         //     'color' => 'e7d7bd',
        //         // ],
        //         // 'green-Pink-color.css' => [
        //         //     'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-4.png')),
        //         //     'color' => 'b7786f',
        //         // ],
        //     ],
        // ];

        return $arr;
    }

    public static function priceFormat($price, $slug = null)
    {

        $settings = Utility::settings();
        if (\Auth::check() && \Auth::User()->type == 'Owner') {
            $user = Auth::user()->current_store;
            $settings = Store::where('id', $user)->first();

            if ($settings['currency_symbol_position'] == "pre" && $settings['currency_symbol_space'] == "with") {
                return $settings['currency'] . ' ' . number_format($price, isset($settings->decimal_number) ? $settings->decimal_number : 2);
            } elseif ($settings['currency_symbol_position'] == "pre" && $settings['currency_symbol_space'] == "without") {
                return $settings['currency'] . number_format($price, isset($settings->decimal_number) ? $settings->decimal_number : 2);
            } elseif ($settings['currency_symbol_position'] == "post" && $settings['currency_symbol_space'] == "with") {
                return number_format($price, isset($settings->decimal_number) ? $settings->decimal_number : 2) . ' ' . $settings['currency'];
            } elseif ($settings['currency_symbol_position'] == "post" && $settings['currency_symbol_space'] == "without") {
                return number_format($price, isset($settings->decimal_number) ? $settings->decimal_number : 2) . $settings['currency'];
            }
        } else {
            if (!isset($slug)) {
                $slug = session()->get('slug');
            }

            if (!empty($slug)) {
                $store = Store::where('slug', $slug)->first();

                if ($store['currency_symbol_position'] == "pre" && $store['currency_symbol_space'] == "with") {
                    return $store['currency'] . ' ' . number_format($price, isset($store->decimal_number) ? $store->decimal_number : 2);
                } elseif ($store['currency_symbol_position'] == "pre" && $store['currency_symbol_space'] == "without") {
                    return $store['currency'] . number_format($price, isset($store->decimal_number) ? $store->decimal_number : 2);
                } elseif ($store['currency_symbol_position'] == "post" && $store['currency_symbol_space'] == "with") {
                    return number_format($price, isset($store->decimal_number) ? $store->decimal_number : 2) . ' ' . $store['currency'];
                } elseif ($store['currency_symbol_position'] == "post" && $store['currency_symbol_space'] == "without") {
                    return number_format($price, isset($store->decimal_number) ? $store->decimal_number : 2) . $store['currency'];
                }
            }

            //            return (($settings['currency_symbol_position'] == "pre") ? $settings['currency_symbol'] : '') . number_format($price, 2) . (($settings['currency_symbol_position'] == "post") ? $settings['currency_symbol'] : '');
            return (($settings['currency_symbol_position'] == "pre") ? $settings['site_currency_symbol'] : '') . number_format($price, Utility::getValByName('decimal_number')) . (($settings['currency_symbol_position'] == "post") ? $settings['site_currency_symbol'] : '');
        }
    }

    public static function currencySymbol($settings)
    {
        return $settings['site_currency_symbol'];
    }

    public static function timeFormat($settings, $time)
    {
        return date($settings['site_date_format'], strtotime($time));
    }

    public static function dateFormat($date)
    {
        $settings = Utility::settings();

        return date($settings['site_date_format'], strtotime($date));
    }

    public static function proposalNumberFormat($settings, $number)
    {
        return $settings["proposal_prefix"] . sprintf("%05d", $number);
    }

    public static function billNumberFormat($settings, $number)
    {
        return $settings["bill_prefix"] . sprintf("%05d", $number);
    }

    public static function tax($taxes)
    {
        $taxArr = explode(',', $taxes);
        $taxes = [];
        foreach ($taxArr as $tax) {
            $taxes[] = ProductTax::find($tax);
        }

        return $taxes;
    }

    public static function taxRate($taxRate, $price, $quantity)
    {

        return ($taxRate / 100) * ($price * $quantity);
    }

    public static function totalTaxRate($taxes)
    {

        $taxArr = explode(',', $taxes);
        $taxRate = 0;

        foreach ($taxArr as $tax) {

            $tax = ProductTax::find($tax);
            $taxRate += !empty($tax->rate) ? $tax->rate : 0;
        }

        return $taxRate;
    }

    public static function userBalance($users, $id, $amount, $type)
    {
        if ($users == 'customer') {
            $user = Customer::find($id);
        } else {
            $user = Vender::find($id);
        }

        if (!empty($user)) {
            if ($type == 'credit') {
                $oldBalance = $user->balance;
                $user->balance = $oldBalance + $amount;
                $user->save();
            } elseif ($type == 'debit') {
                $oldBalance = $user->balance;
                $user->balance = $oldBalance - $amount;
                $user->save();
            }
        }
    }

    public static function bankAccountBalance($id, $amount, $type)
    {
        $bankAccount = BankAccount::find($id);
        if ($bankAccount) {
            if ($type == 'credit') {
                $oldBalance = $bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance + $amount;
                $bankAccount->save();
            } elseif ($type == 'debit') {
                $oldBalance = $bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance - $amount;
                $bankAccount->save();
            }
        }
    }

    // get font-color code accourding to bg-color
    public static function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array(
            $r,
            $g,
            $b,
        );

        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    public static function distancel2(array $color1, array $color2)
    {
        return sqrt(pow($color1[0] - $color2[0], 2) +
            pow($color1[1] - $color2[1], 2) +
            pow($color1[2] - $color2[2], 2));
    }

    public static function getFontColor($color_code)
    {
        $rgb = self::hex2rgb($color_code);
        $R = $G = $B = $C = $L = $color = '';

        $R = (floor($rgb[0]));
        $G = (floor($rgb[1]));
        $B = (floor($rgb[2]));

        $C = [
            $R / 255,
            $G / 255,
            $B / 255,
        ];

        for ($i = 0; $i < count($C); ++$i) {
            if ($C[$i] <= 0.03928) {
                $C[$i] = $C[$i] / 12.92;
            } else {
                $C[$i] = pow(($C[$i] + 0.055) / 1.055, 2.4);
            }
        }

        $L = 0.2126 * $C[0] + 0.7152 * $C[1] + 0.0722 * $C[2];

        if ($L > 0.179) {
            $color = 'black';
        } else {
            $color = 'white';
        }

        return $color;
    }

    public static function delete_directory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!self::delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }

        return rmdir($dir);
    }

    public static function getSuperAdminValByName($key)
    {
        $data = DB::table('settings');
        $data = $data->where('name', '=', $key);
        $data = $data->first();
        if (!empty($data)) {
            $record = $data->value;
        } else {
            $record = '';
        }

        return $record;
    }

    // used for replace email variable (parameter 'template_name','id(get particular record by id for data)')
    public static function replaceVariable($content, $obj)
    {
        $arrVariable = [
            '{store_name}',
            '{order_no}',
            '{customer_name}',
            '{billing_address}',
            '{billing_country}',
            '{billing_city}',
            '{billing_postalcode}',
            '{shipping_address}',
            '{shipping_country}',
            '{shipping_city}',
            '{shipping_postalcode}',
            '{item_variable}',
            '{qty_total}',
            '{sub_total}',
            '{discount_amount}',
            '{shipping_amount}',
            '{total_tax}',
            '{final_total}',
            '{sku}',
            '{quantity}',
            '{product_name}',
            '{variant_name}',
            '{item_tax}',
            '{item_total}',
        ];
        $arrValue = [
            'store_name' => '',
            'order_no' => '',
            'customer_name' => '',
            'billing_address' => '',
            'billing_country' => '',
            'billing_city' => '',
            'billing_postalcode' => '',
            'shipping_address' => '',
            'shipping_country' => '',
            'shipping_city' => '',
            'shipping_postalcode' => '',
            'item_variable' => '',
            'qty_total' => '',
            'sub_total' => '',
            'discount_amount' => '',
            'shipping_amount' => '',
            'total_tax' => '',
            'final_total' => '',
            'sku' => '',
            'quantity' => '',
            'product_name' => '',
            'variant_name' => '',
            'item_tax' => '',
            'item_total' => '',
        ];

        foreach ($obj as $key => $val) {
            $arrValue[$key] = $val;
        }

        $arrValue['app_name'] = env('APP_NAME');
        $arrValue['app_url'] = '<a href="' . env('APP_URL') . '" target="_blank">' . env('APP_URL') . '</a>';

        return str_replace($arrVariable, array_values($arrValue), $content);
    }

    // Email Template Modules Function START

    public static function userDefaultData()
    {
        // Make Entry In User_Email_Template
        $allEmail = EmailTemplate::all();
        foreach ($allEmail as $email) {
            UserEmailTemplate::create(
                [
                    'template_id' => $email->id,
                    'user_id' => 1,
                    'is_active' => 1,
                ]
            );
        }
    }

    // Common Function That used to send mail with check all cases
    public static function sendEmailTemplate($emailTemplate, $mailTo, $obj, $store, $order)
    {
        // find template is exist or not in our record
        $template = EmailTemplate::where('name', 'LIKE', $emailTemplate)->first();

        if (isset($template) && !empty($template)) {
            // check template is active or not by company
            $is_actives = UserEmailTemplate::where('template_id', '=', $template->id)->first();


            if ($is_actives->is_active == 1) {
                // get email content language base
                $content = EmailTemplateLang::where('parent_id', '=', $template->id)->where('lang', 'LIKE', $store->lang)->first();

                $content->from = $template->from;

                if (!empty($content->content)) {
                    $content->content = self::replaceVariables($content->content, $obj, $store, $order);

                    // send email
                    try {

                        // config(
                        //     [
                        //         'mail.driver' => $store->mail_driver,
                        //         'mail.host' => $store->mail_host,
                        //         'mail.port' => $store->mail_port,
                        //         'mail.encryption' => $store->mail_encryption,
                        //         'mail.username' => $store->mail_username,
                        //         'mail.password' => $store->mail_password,
                        //         'mail.from.address' => $store->mail_from_address,
                        //         'mail.from.name' => $store->mail_from_name,
                        //     ]
                        // );

                        if ($order) {
                            $orders = Order::find(Crypt::decrypt($order));
                        }

                        $ownername = User::where('id', $store->created_by)->first();

                        if ($mailTo == $ownername->email) {

                            Mail::to(
                                [
                                    $store['email'],
                                ]
                            )->send(new CommonEmailTemplate($content, $store));
                        } else {

                            Mail::to(
                                [
                                    $mailTo,

                                ]
                            )->send(new CommonEmailTemplate($content, $store));

                            if ($order) {

                                $user = (Auth::guard('customers')->user());
                            }
                        }
                    } catch (\Exception $e) {

                        $error = __('E-Mail has been not sent due to SMTP configuration');
                    }
                    if (isset($error)) {
                        $arReturn = [
                            'is_success' => false,
                            'error' => $error,
                        ];
                    } else {
                        $arReturn = [
                            'is_success' => true,
                            'error' => false,
                        ];
                    }
                } else {
                    $arReturn = [
                        'is_success' => false,
                        'error' => __('Mail not send, email is empty'),
                    ];
                }
                return $arReturn;
            } else {
                return [
                    'is_success' => true,
                    'error' => false,
                ];
            }
        } else {
            return [
                'is_success' => false,
                'error' => __('Mail not send, email not found'),
            ];
        }
        //        }
    }

    // used for replace email variable (parameter 'template_name','id(get particular record by id for data)')
    public static function replaceVariables($content, $obj, $store, $order)
    {
        $arrVariable = [
            '{app_name}',
            '{order_name}',
            '{order_status}',
            '{app_url}',
            '{order_url}',
            '{order_id}',
            '{owner_name}',
            '{order_date}',
            '{activate_link}',
            '{term_page_link}',
        ];
        $arrValue = [
            'app_name' => '-',
            'order_name' => '-',
            'order_status' => '-',
            'app_url' => '-',
            'order_url' => '-',
            'order_id' => '-',
            'owner_name' => '-',
            'order_date' => '-',
            'activate_link' => '-',
            'term_page_link' => '-',
        ];

        if ($obj) {
            foreach ($obj as $key => $val) {
                $arrValue[$key] = $val;
            }
        }


        $arrValue['app_name'] = $store->name;
        $arrValue['app_url'] = '<a href="' . env('APP_URL') . '" target="_blank">' . env('APP_URL') . '</a>';
        $arrValue['term_page_link'] = '<a href="' . route('terms', app()->getLocale()) . '" target="_blank">' . __('Term & condition') . '</a>';


        if ($order) {
            $arrValue['order_url'] = '<a href="' . env('APP_URL') . '/' . $store->slug . '/order/' . $order . '" target="_blank">' . env('APP_URL') . '/' . $store->slug . '/order/' . $order . '</a>';
        }


        $ownername = User::where('id', $store->created_by)->first();

        if ($order) {
            $id = Crypt::decrypt($order);
            $order = Order::where('id', $id)->first();
            $arrValue['order_id'] = isset($order->order_id) ? $order->order_id : 0;
            $arrValue['order_date'] = isset($order->order_id) ? self::dateFormat($order->created_at) : 0;
        }



        $arrValue['owner_name'] = $ownername->name;


        return str_replace($arrVariable, array_values($arrValue), $content);
    }

    // Make Entry in email_tempalte_lang table when create new language
    public static function makeEmailLang($lang)
    {
        $template = EmailTemplate::all();
        foreach ($template as $t) {
            $default_lang = EmailTemplateLang::where('parent_id', '=', $t->id)->where('lang', 'LIKE', 'en')->first();
            $emailTemplateLang = new EmailTemplateLang();
            $emailTemplateLang->parent_id = $t->id;
            $emailTemplateLang->lang = $lang;
            $emailTemplateLang->subject = $default_lang->subject;
            $emailTemplateLang->content = $default_lang->content;
            $emailTemplateLang->save();
        }
    }

    // For Email template Module
    public static function defaultEmail()
    {
        // Email Template
        $emailTemplate = [
            'Order Created',
            'Status Change',
            'Order Created For Owner',
        ];

        foreach ($emailTemplate as $eTemp) {
            EmailTemplate::create(
                [
                    'name' => $eTemp,
                    'from' => env('APP_NAME'),
                    'created_by' => 1,
                ]
            );
        }

        $defaultTemplate = [
            'Order Created' => [
                'subject' => 'Order Complete',
                'lang' => [
                    'ar' => '<p>مرحبا ،</p><p>مرحبا بك في {app_name}.</p><p>مرحبا ، {order_name} ، شكرا للتسوق</p><p>قمنا باستلام طلب الشراء الخاص بك ، سيتم الاتصال بك قريبا !</p><p>شكرا ،</p><p>{app_name}</p><p>{order_url}</p>',
                    'da' => '<p>Hej, &nbsp;</p><p>Velkommen til {app_name}.</p><p>Hej, {order_name}, tak for at Shopping</p><p>Vi har modtaget din købsanmodning.</p><p>Tak,</p><p>{app_navn}</p><p>{order_url}</p>',
                    'de' => '<p>Hello, &nbsp;</p><p>Willkommen bei {app_name}.</p><p>Hi, {order_name}, Vielen Dank für Shopping</p><p>Wir haben Ihre Kaufanforderung erhalten, wir werden in Kürze in Kontakt sein!</p><p>Danke,</p><p>{app_name}</p><p>{order_url}</p>',
                    'en' => '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p>Hi, {order_name}, Thank you for Shopping</p><p>We received your purchase request, we\'ll be in touch shortly!</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'es' => '<p>Hola, &nbsp;</p><p>Bienvenido a {app_name}.</p><p>Hi, {order_name}, Thank you for Shopping</p><p>Recibimos su solicitud de compra, ¡estaremos en contacto en breve!</p><p>Gracias,</p><p>{app_name}</p><p>{order_url}</p>',
                    'fr' => '<p>Bonjour, &nbsp;</p><p>Bienvenue dans {app_name}.</p><p>Hi, {order_name}, Thank you for Shopping</p><p>We reçus your purchase request, we \'ll be in touch incess!</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'it' => '<p>Ciao, &nbsp;</p><p>Benvenuti in {app_name}.</p><p>Ciao, {order_name}, Grazie per Shopping</p><p>Abbiamo ricevuto la tua richiesta di acquisto, noi \ saremo in contatto a breve!</p><p>Grazie,</p><p>{app_name}</p><p>{order_url}</p>',
                    'ja' => '<p>こんにちは &nbsp;</p><p>{app_name}へようこそ。</p></p><p><p>こんにちは、 {order_name}、お客様の購買要求書をお受け取りいただき、すぐにご連絡いたします。</p><p>ありがとうございます。</p><p>{app_name}</p><p>{order_url}</p>',
                    'nl' => '<p>Hallo, &nbsp;</p><p>Welkom bij {app_name}.</p><p>Hallo, {order_name}, Dank u voor Winkelen</p><p>We hebben uw aankoopaanvraag ontvangen, we zijn binnenkort in contact!</p><p>Bedankt,</p><p>{ app_name }</p><p>{order_url}</p>',
                    'pl' => '<p>Hello, &nbsp;</p><p>Witamy w aplikacji {app_name}.</p><p>Hi, {order_name}, Dziękujemy za zakupy</p><p>Otrzymamy Twój wniosek o zakup, wkrótce będziemy w kontakcie!</p><p>Dzięki,</p><p>{app_name}</p><p>{order_url}</p>',
                    'ru' => '<p>Здравствуйте, &nbsp;</p><p>Вас приветствует {app_name}.</p><p>Hi, {order_name}, Спасибо за Шоппинг</p><p>Мы получили ваш запрос на покупку, мы \ скоро свяжемся!</p><p>Спасибо,</p><p>{app_name}</p><p>{order_url}</p>',
                    'pt' => '<p>NAVE ÓRICA-Тутутутугальстугальский (app_name}).</p><p>Hi, {order_name}, пасссский</p><p>польстугальский потугальский (португальский), "скортугальский".</p><p>nome_do_appсссский!</p><p>{app_name}</p><p>{app_name}</p><p>{order_url}</p>',
                ],
            ],
            'Status Change' => [
                'subject' => 'Order Status',
                'lang' => [
                    'ar' => '<p>Здравствуйте, &nbsp;</p><p>Вас приветствует {app_name}.</p><p>Ваш заказ-{order_status}!</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'da' => '<p>Hej, &nbsp;</p><p>Velkommen til {app_name}.</p><p>Din ordre er {order_status}!</p><p>Hej {order_navn}, Tak for at Shopping</p><p>Tak,</p><p>{app_navn}</p><p>{order_url}</p>',
                    'de' => '<p>Hello, &nbsp;</p><p>Willkommen bei {app_name}.</p><p>Ihre Bestellung lautet {order_status}!</p><p>Hi {order_name}, Danke für Shopping</p><p>Danke,</p><p>{app_name}</p><p>{order_url}</p>',
                    'en' => '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p>Your Order is {order_status}!</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'es' => '<p>Hola, &nbsp;</p><p>Bienvenido a {app_name}.</p><p>Your Order is {order_status}!</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'fr' => '<p>Bonjour, &nbsp;</p><p>Bienvenue dans {app_name}.</p><p>Votre commande est {order_status} !</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'it' => '<p>Ciao, &nbsp;</p><p>Benvenuti in {app_name}.</p><p>Il tuo ordine è {order_status}!</p><p>Ciao {order_name}, Grazie per Shopping</p><p>Grazie,</p><p>{app_name}</p><p>{order_url}</p>',
                    'ja' => '<p>Ciao, &nbsp;</p><p>Benvenuti in {app_name}.</p><p>Il tuo ordine è {order_status}!</p><p>Ciao {order_name}, Grazie per Shopping</p><p>Grazie,</p><p>{app_name}</p><p>{order_url}</p>',
                    'nl' => '<p>Hallo, &nbsp;</p><p>Welkom bij {app_name}.</p><p>Uw bestelling is {order_status}!</p><p>Hi {order_name}, Dank u voor Winkelen</p><p>Bedankt,</p><p>{app_name}</p><p>{order_url}</p>',
                    'pl' => '<p>Hello, &nbsp;</p><p>Witamy w aplikacji {app_name}.</p><p>Twoje zamówienie to {order_status}!</p><p>Hi {order_name}, Dziękujemy za zakupy</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'ru' => '<p>Здравствуйте, &nbsp;</p><p>Вас приветствует {app_name}.</p><p>Ваш заказ-{order_status}!</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'pt' => '<p>SHOPPING CENTER-Тутутутугальстугальский (app_name}).</p><p>nomeia альстугальский (order_status}!</p><p>Hi {order_name}, Obrigado por Shopping</p><p>Obrigado,</p><p>{app_name}</p><p>{order_url}</p>',
                ],
            ],

            'Order Created For Owner' => [
                'subject' => 'Order Detail',
                'lang' => [
                    'ar' => '<p> مرحبًا ، </ p> <p> عزيزي {owner_name}. </p> <p> هذا أمر تأكيد {order_id} ضعه على <span style = \"font-size: 1rem؛\"> {order_date}. </span> </p> <p> شكرًا ، </ p> <p> {order_url} </p>',
                    'da' => '<p>Hej </p><p>Kære {owner_name}.</p><p>Dette er ordrebekræftelse {order_id} sted på <span style=\"font-size: 1rem;\">{order_date}. </span></p><p>Tak,</p><p>{order_url}</p>',
                    'de' => '<p>Hallo, </p><p>Sehr geehrter {owner_name}.</p><p>Dies ist die Auftragsbestätigung {order_id}, die am <span style=\"font-size: 1rem;\">{order_date} aufgegeben wurde. </span></p><p>Danke,</p><p>{order_url}</p>',
                    'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>This is Confirmation Order {order_id} place on&nbsp;<span style=\"font-size: 1rem;\">{order_date}.</span></p><p>Thanks,</p><p>{order_url}</p>',
                    'es' => '<p> Hola, </p> <p> Estimado {owner_name}. </p> <p> Este es el lugar de la orden de confirmación {order_id} en <span style = \"font-size: 1rem;\"> {order_date}. </span> </p> <p> Gracias, </p> <p> {order_url} </p>',
                    'fr' => '<p>Bonjour, </p><p>Cher {owner_name}.</p><p>Ceci est la commande de confirmation {order_id} passée le <span style=\"font-size: 1rem;\">{order_date}. </span></p><p>Merci,</p><p>{order_url}</p>',
                    'it' => '<p>Ciao, </p><p>Gentile {owner_name}.</p><p>Questo è l\'ordine di conferma {order_id} effettuato su <span style=\"font-size: 1rem;\">{order_date}. </span></p><p>Grazie,</p><p>{order_url}</p>',
                    'ja' => '<p>こんにちは、</ p> <p>親愛なる{owner_name}。</ p> <p>これは、<span style = \"font-size：1rem;\"> {order_date}の確認注文{order_id}の場所です。 </ span> </ p> <p>ありがとうございます</ p> <p> {order_url} </ p>',
                    'nl' => '<p>Hallo, </p><p>Beste {owner_name}.</p><p>Dit is de bevestigingsopdracht {order_id} die is geplaatst op <span style=\"font-size: 1rem;\">{order_date}. </span></p><p>Bedankt,</p><p>{order_url}</p>',
                    'pl' => '<p>Witaj, </p><p>Drogi {owner_name}.</p><p>To jest potwierdzenie zamówienia {order_id} złożone na <span style=\"font-size: 1rem;\">{order_date}. </span></p><p>Dzięki,</p><p>{order_url}</p>',
                    'ru' => '<p> Здравствуйте, </p> <p> Уважаемый {owner_name}. </p> <p> Это подтверждение заказа {order_id} на <span style = \"font-size: 1rem;\"> {order_date}. </span> </p> <p> Спасибо, </p> <p> {order_url} </p>',
                    'pt' => '<p> Térica-Dicas de Cadeia Pública de Тутутугальский (owner_name}). </p> <p> Тугальстугальстугальский (order_id} ний <span style = \" font-size: 1rem; \ "> {order_date}. </span> </p> <p> nome_do_chave de vida, </p> <p> {order_url} </p> <p> {order_url}',
                ],
            ],

        ];

        $email = EmailTemplate::all();

        foreach ($email as $e) {
            foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {
                EmailTemplateLang::create(
                    [
                        'parent_id' => $e->id,
                        'lang' => $lang,
                        'subject' => $defaultTemplate[$e->name]['subject'],
                        'content' => $content,
                    ]
                );
            }
        }
    }

    // public static function defaultEmailUser()
    // {
    //     //this use to create user verification email (custom)
    //     $emailTemplate =  EmailTemplate::create(
    //         [
    //             'name' => "User Verification",
    //             'from' => env('APP_NAME'),
    //             'created_by' => 1,
    //         ]
    //     );


    //     $defaultTemplate = [
    //         'User Verification' => [
    //             'subject' => 'User Verification',
    //             'lang' => [
    //                 'ar' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'da' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'de' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'es' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'fr' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'it' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'ja' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'nl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'pl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'ru' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //                 'pt' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Please click the below link to activate your account.</span></p><p>Thanks,</p><p>{activate_link}</p>',
    //             ],
    //         ],
    //     ];

    //     $email = EmailTemplate::all();


    //     foreach ($email as $e) {

    //         if (isset($defaultTemplate[$e->name]['lang'])) {
    //             foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

    //                 EmailTemplateLang::create(
    //                     [
    //                         'parent_id' => $e->id,
    //                         'lang' => $lang,
    //                         'subject' => $defaultTemplate[$e->name]['subject'],
    //                         'content' => $content,
    //                     ]
    //                 );
    //             }
    //         }
    //     }


    //     // Make Entry In User_Email_Template
    //     UserEmailTemplate::create(
    //         [
    //             'template_id' => $emailTemplate->id,
    //             'user_id' => 1,
    //             'is_active' => 1,
    //         ]
    //     );
    // }

    // public static function defaultEmail2()
    // {
    //     //this use to create user verification email (custom)
    //     $emailTemplate =  EmailTemplate::create(
    //         [
    //             'name' => "New Registration",
    //             'from' => env('APP_NAME'),
    //             'created_by' => 1,
    //         ]
    //     );


    //     $defaultTemplate = [
    //         'New Registration' => [
    //             'subject' => 'New Registration',
    //             'lang' => [
    //                 'ar' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'da' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'de' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'es' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'fr' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'it' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'ja' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'nl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'pl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'ru' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //                 'pt' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>Thanks for joining! We are glad you are here.</span></p><p>Thanks,</p>',
    //             ],
    //         ],
    //     ];

    //     $email = EmailTemplate::all();


    //     foreach ($email as $e) {

    //         if (isset($defaultTemplate[$e->name]['lang'])) {
    //             foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

    //                 EmailTemplateLang::create(
    //                     [
    //                         'parent_id' => $e->id,
    //                         'lang' => $lang,
    //                         'subject' => $defaultTemplate[$e->name]['subject'],
    //                         'content' => $content,
    //                     ]
    //                 );
    //             }
    //         }
    //     }


    //     // Make Entry In User_Email_Template
    //     UserEmailTemplate::create(
    //         [
    //             'template_id' => $emailTemplate->id,
    //             'user_id' => 1,
    //             'is_active' => 1,
    //         ]
    //     );
    // }
    // public static function defaultEmail3()
    // {
    //     //this use to create user verification email (custom)
    //     $emailTemplate =  EmailTemplate::create(
    //         [
    //             'name' => "Premium Account Purchased",
    //             'from' => env('APP_NAME'),
    //             'created_by' => 1,
    //         ]
    //     );


    //     $defaultTemplate = [
    //         'Premium Account Purchased' => [
    //             'subject' => 'Premium Account Purchased',
    //             'lang' => [
    //                 'ar' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'da' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'de' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'es' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'fr' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'it' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'ja' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'nl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'pl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'ru' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //                 'pt' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your premium membership!</span></p><p>Thanks,</p>',
    //             ],
    //         ],
    //     ];

    //     $email = EmailTemplate::all();


    //     foreach ($email as $e) {

    //         if (isset($defaultTemplate[$e->name]['lang'])) {
    //             foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

    //                 EmailTemplateLang::create(
    //                     [
    //                         'parent_id' => $e->id,
    //                         'lang' => $lang,
    //                         'subject' => $defaultTemplate[$e->name]['subject'],
    //                         'content' => $content,
    //                     ]
    //                 );
    //             }
    //         }
    //     }


    //     // Make Entry In User_Email_Template
    //     UserEmailTemplate::create(
    //         [
    //             'template_id' => $emailTemplate->id,
    //             'user_id' => 1,
    //             'is_active' => 1,
    //         ]
    //     );
    // }
    // public static function defaultEmail4()
    // {
    //     //this use to create user verification email (custom)
    //     $emailTemplate =  EmailTemplate::create(
    //         [
    //             'name' => "Ads-Free Account Purchased",
    //             'from' => env('APP_NAME'),
    //             'created_by' => 1,
    //         ]
    //     );


    //     $defaultTemplate = [
    //         'Ads-Free Account Purchased' => [
    //             'subject' => 'Ads-Free Account Purchased',
    //             'lang' => [
    //                 'ar' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'da' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'de' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'es' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'fr' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'it' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'ja' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'nl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'pl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'ru' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //                 'pt' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We have disabled all advertisements!</span></p><p>Thanks,</p>',
    //             ],
    //         ],
    //     ];

    //     $email = EmailTemplate::all();


    //     foreach ($email as $e) {

    //         if (isset($defaultTemplate[$e->name]['lang'])) {
    //             foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

    //                 EmailTemplateLang::create(
    //                     [
    //                         'parent_id' => $e->id,
    //                         'lang' => $lang,
    //                         'subject' => $defaultTemplate[$e->name]['subject'],
    //                         'content' => $content,
    //                     ]
    //                 );
    //             }
    //         }
    //     }


    //     // Make Entry In User_Email_Template
    //     UserEmailTemplate::create(
    //         [
    //             'template_id' => $emailTemplate->id,
    //             'user_id' => 1,
    //             'is_active' => 1,
    //         ]
    //     );
    // }
    // public static function defaultEmail5()
    // {
    //     //this use to create user verification email (custom)
    //     $emailTemplate =  EmailTemplate::create(
    //         [
    //             'name' => "Inactive for 5 Days",
    //             'from' => env('APP_NAME'),
    //             'created_by' => 1,
    //         ]
    //     );


    //     $defaultTemplate = [
    //         'Inactive for 5 Days' => [
    //             'subject' => 'Inactive for 5 Days',
    //             'lang' => [
    //                 'ar' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'da' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'de' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'es' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'fr' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'it' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'ja' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'nl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'pl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'ru' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //                 'pt' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>We are waiting for you again!</span></p><p>Thanks,</p>',
    //             ],
    //         ],
    //     ];

    //     $email = EmailTemplate::all();


    //     foreach ($email as $e) {

    //         if (isset($defaultTemplate[$e->name]['lang'])) {
    //             foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

    //                 EmailTemplateLang::create(
    //                     [
    //                         'parent_id' => $e->id,
    //                         'lang' => $lang,
    //                         'subject' => $defaultTemplate[$e->name]['subject'],
    //                         'content' => $content,
    //                     ]
    //                 );
    //             }
    //         }
    //     }


    //     // Make Entry In User_Email_Template
    //     UserEmailTemplate::create(
    //         [
    //             'template_id' => $emailTemplate->id,
    //             'user_id' => 1,
    //             'is_active' => 1,
    //         ]
    //     );
    // }

    // public static function defaultEmail6()
    // {
    //     //this use to create user verification email (custom)
    //     $emailTemplate =  EmailTemplate::create(
    //         [
    //             'name' => "Storage Plan",
    //             'from' => env('APP_NAME'),
    //             'created_by' => 1,
    //         ]
    //     );


    //     $defaultTemplate = [
    //         'Storage Plan' => [
    //             'subject' => 'Storage Plan',
    //             'lang' => [
    //                 'ar' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'da' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'de' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'es' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'fr' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'it' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'ja' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'nl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'pl' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'ru' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //                 'pt' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>You have upgraded your storage plan.</span></p><p>Thanks,</p>',
    //             ],
    //         ],
    //     ];

    //     $email = EmailTemplate::all();


    //     foreach ($email as $e) {

    //         if (isset($defaultTemplate[$e->name]['lang'])) {
    //             foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

    //                 EmailTemplateLang::create(
    //                     [
    //                         'parent_id' => $e->id,
    //                         'lang' => $lang,
    //                         'subject' => $defaultTemplate[$e->name]['subject'],
    //                         'content' => $content,
    //                     ]
    //                 );
    //             }
    //         }
    //     }


    //     // Make Entry In User_Email_Template
    //     UserEmailTemplate::create(
    //         [
    //             'template_id' => $emailTemplate->id,
    //             'user_id' => 1,
    //             'is_active' => 1,
    //         ]
    //     );
    // }
    public static function defaultEmail7()
    {
        //this use to create user verification email (custom)
        $emailTemplate =  EmailTemplate::create(
            [
                'name' => "Premium Trial Ends In 5 Days",
                'from' => env('APP_NAME'),
                'created_by' => 1,
            ]
        );


        $defaultTemplate = [
            'Premium Trial Ends In 5 Days' => [
                'subject' => 'Premium Trial Ends In 5 Days',
                'lang' => [
                    'ar' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'da' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'de' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'en' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'es' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'fr' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'it' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'ja' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'nl' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'pl' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'ru' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                    'pt' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We wanted to remind you that your premium trial will expire in just 5 days.</span></p><p>Thanks,</p>',
                ],
            ],
        ];

        $email = EmailTemplate::all();


        foreach ($email as $e) {

            if (isset($defaultTemplate[$e->name]['lang'])) {
                foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

                    EmailTemplateLang::create(
                        [
                            'parent_id' => $e->id,
                            'lang' => $lang,
                            'subject' => $defaultTemplate[$e->name]['subject'],
                            'content' => $content,
                        ]
                    );
                }
            }
        }


        // Make Entry In User_Email_Template
        UserEmailTemplate::create(
            [
                'template_id' => $emailTemplate->id,
                'user_id' => 1,
                'is_active' => 1,
            ]
        );
    }
    public static function defaultEmail8()
    {
        //this use to create user verification email (custom)
        $emailTemplate =  EmailTemplate::create(
            [
                'name' => "Premium Trial Ends In 1 Day",
                'from' => env('APP_NAME'),
                'created_by' => 1,
            ]
        );


        $defaultTemplate = [
            'Premium Trial Ends In 1 Day' => [
                'subject' => 'Premium Trial Ends In 1 Day',
                'lang' => [
                    'ar' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'da' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'de' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'en' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'es' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'fr' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'it' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'ja' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'nl' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'pl' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'ru' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                    'pt' => '<p>Dear {owner_name}.</p><p>This is a friendly reminder that your premium trial account is set to expire in just 1 day. We hope that you have had a chance to enjoy all the benefits of our premium account and that you have found it to be a valuable tool.</span></p><p>Thanks,</p>',
                ],
            ],
        ];

        $email = EmailTemplate::all();


        foreach ($email as $e) {

            if (isset($defaultTemplate[$e->name]['lang'])) {
                foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

                    EmailTemplateLang::create(
                        [
                            'parent_id' => $e->id,
                            'lang' => $lang,
                            'subject' => $defaultTemplate[$e->name]['subject'],
                            'content' => $content,
                        ]
                    );
                }
            }
        }


        // Make Entry In User_Email_Template
        UserEmailTemplate::create(
            [
                'template_id' => $emailTemplate->id,
                'user_id' => 1,
                'is_active' => 1,
            ]
        );
    }
    public static function defaultEmail9()
    {
        //this use to create user verification email (custom)
        $emailTemplate =  EmailTemplate::create(
            [
                'name' => "Premium Trial Has Expired",
                'from' => env('APP_NAME'),
                'created_by' => 1,
            ]
        );


        $defaultTemplate = [
            'Premium Trial Has Expired' => [
                'subject' => 'Premium Trial Has Expired',
                'lang' => [
                    'ar' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'da' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'de' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'en' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'es' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'fr' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'it' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'ja' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'nl' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'pl' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'ru' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                    'pt' => '<p>Dear {owner_name}.</p><p>We hope this email finds you well. We regret to inform you that your premium trial has now expired. We hope that you had a chance to explore and enjoy all the features that our premium account has to offer.</span></p><p>Thanks,</p>',
                ],
            ],
        ];

        $email = EmailTemplate::all();


        foreach ($email as $e) {

            if (isset($defaultTemplate[$e->name]['lang'])) {
                foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

                    EmailTemplateLang::create(
                        [
                            'parent_id' => $e->id,
                            'lang' => $lang,
                            'subject' => $defaultTemplate[$e->name]['subject'],
                            'content' => $content,
                        ]
                    );
                }
            }
        }


        // Make Entry In User_Email_Template
        UserEmailTemplate::create(
            [
                'template_id' => $emailTemplate->id,
                'user_id' => 1,
                'is_active' => 1,
            ]
        );
    }
    public static function defaultEmail10()
    {
        //this use to create user verification email (custom)
        $emailTemplate =  EmailTemplate::create(
            [
                'name' => "Term Has Changed",
                'from' => env('APP_NAME'),
                'created_by' => 1,
            ]
        );


        $defaultTemplate = [
            'Term Has Changed' => [
                'subject' => 'Term Has Changed',
                'lang' => [
                    'ar' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'da' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'de' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'en' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'es' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'fr' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'it' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'ja' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'nl' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'pl' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'ru' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                    'pt' => '<p>Dear {owner_name}.</p><p>We\'ve updated our Terms and Conditions to improve your experience and ensure compliance. Please review the changes {term_page_link} and let us know if you have any questions.</span></p><p>Thanks,</p>',
                ],
            ],
        ];

        $email = EmailTemplate::all();


        foreach ($email as $e) {

            if (isset($defaultTemplate[$e->name]['lang'])) {
                foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

                    EmailTemplateLang::create(
                        [
                            'parent_id' => $e->id,
                            'lang' => $lang,
                            'subject' => $defaultTemplate[$e->name]['subject'],
                            'content' => $content,
                        ]
                    );
                }
            }
        }


        // Make Entry In User_Email_Template
        UserEmailTemplate::create(
            [
                'template_id' => $emailTemplate->id,
                'user_id' => 1,
                'is_active' => 1,
            ]
        );
    }

    public static function defaultEmail11()
    {
        //this use to create user verification email (custom)
        $emailTemplate =  EmailTemplate::create(
            [
                'name' => "Thread Posted",
                'from' => env('APP_NAME'),
                'created_by' => 1,
            ]
        );


        $defaultTemplate = [
            'Thread Posted' => [
                'subject' => 'Thread Posted',
                'lang' => [
                    'ar' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'da' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'de' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'en' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'es' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'fr' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'it' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'ja' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'nl' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'pl' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'ru' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                    'pt' => '<p>Dear Admin,</p><p>A fresh forum thread has been initiated by {owner_name}.</span></p>',
                ],
            ],
        ];

        $email = EmailTemplate::all();


        foreach ($email as $e) {

            if (isset($defaultTemplate[$e->name]['lang'])) {
                foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

                    EmailTemplateLang::create(
                        [
                            'parent_id' => $e->id,
                            'lang' => $lang,
                            'subject' => $defaultTemplate[$e->name]['subject'],
                            'content' => $content,
                        ]
                    );
                }
            }
        }


        // Make Entry In User_Email_Template
        UserEmailTemplate::create(
            [
                'template_id' => $emailTemplate->id,
                'user_id' => 1,
                'is_active' => 1,
            ]
        );
    }

    public static function defaultEmail12()
    {
        //this use to create user verification email (custom)
        $emailTemplate =  EmailTemplate::create(
            [
                'name' => "Joining the Discussion",
                'from' => env('APP_NAME'),
                'created_by' => 1,
            ]
        );


        $defaultTemplate = [
            'Joining the Discussion' => [
                'subject' => 'Joining the Discussion',
                'lang' => [
                    'ar' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'da' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'de' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'en' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'es' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'fr' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'it' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'ja' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'nl' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'pl' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'ru' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                    'pt' => '<p>Hi,</p><p>Your thread has received a response from {owner_name}.</span></p>',
                ],
            ],
        ];

        $email = EmailTemplate::all();


        foreach ($email as $e) {

            if (isset($defaultTemplate[$e->name]['lang'])) {
                foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {

                    EmailTemplateLang::create(
                        [
                            'parent_id' => $e->id,
                            'lang' => $lang,
                            'subject' => $defaultTemplate[$e->name]['subject'],
                            'content' => $content,
                        ]
                    );
                }
            }
        }


        // Make Entry In User_Email_Template
        UserEmailTemplate::create(
            [
                'template_id' => $emailTemplate->id,
                'user_id' => 1,
                'is_active' => 1,
            ]
        );
    }

    public static function CustomerAuthCheck($slug = null)
    {
        if ($slug == null) {
            $slug = \Request::segment(1);
        }
        $auth_customer = Auth::guard('customers')->user();
        if (!empty($auth_customer))
        //
        {
            $store_id = Store::where('slug', $slug)->pluck('id')->first();
            $customer = Customer::where('store_id', $store_id)->where('email', $auth_customer->email)->count();
            if ($customer > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function success_res($msg = "", $args = array())
    {

        $msg = $msg == "" ? "success" : $msg;
        $msg_id = 'success.' . $msg;
        $converted = \Lang::get($msg_id, $args);
        $msg = $msg_id == $converted ? $msg : $converted;
        $json = array(
            'flag' => 1,
            'msg' => $msg,
        );

        return $json;
    }

    public static function error_res($msg = "", $args = array())
    {

        $msg = $msg == "" ? "error" : $msg;
        $msg_id = 'error.' . $msg;
        $converted = \Lang::get($msg_id, $args);
        $msg = $msg_id == $converted ? $msg : $converted;
        $json = array(
            'flag' => 0,
            'msg' => $msg,
        );

        return $json;
    }

    public static function send_twilio_msg($to, $msg, $store)
    {

        try {
            $account_sid = $store->twilio_sid;

            $auth_token = $store->twilio_token;

            $twilio_number = $store->twilio_from;

            $client = new Client($account_sid, $auth_token);

            $client->messages->create($to, [
                'from' => $twilio_number,
                'body' => $msg
            ]);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public static function order_create_owner($order, $owner, $store)
    {
        try {
            $msg = __("Hello,
Dear" . ' ' . $owner->name . ' ' . ",
This is Confirmation Order " . ' ' . $order->order_id . "place on" . self::dateFormat($order->created_at) . "
Thanks,");

            Utility::send_twilio_msg($store->notification_number, $msg, $store);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public static function order_create_customer($order, $customer, $store)
    {
        try {
            $msg = __("Hello,
Welcome to" . ' ' . $store->name . ' ' . ",
Thank you for your purchase from" . ' ' . $store->name . ".
Order Number:" . ' ' . $order->order_id . ".
Order Date:" . ' ' . self::dateFormat($order->created_at));

            Utility::send_twilio_msg($customer->phone_number, $msg, $store);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public static function status_change_customer($order, $customer, $store)
    {
        try {
            $msg = __("Hello,
            Welcome to" . ' ' . $store->name . ' ' . ",
            Your Order is" . ' ' . $order->status . ".
            Hi" . ' ' . $order->name . ", Thank you for Shopping.
            Thanks,
            " . $store->name);

            Utility::send_twilio_msg($customer->phone_number, $msg, $store);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public static function colorset()
    {
        if (\Auth::user()) {
            if (\Auth::user()->type == 'super admin') {
                $user = \Auth::user();
                $setting = DB::table('settings')->where('created_by', $user->id)->pluck('value', 'name')->toArray();
            } else {
                $setting = DB::table('settings')->where('created_by', \Auth::user()->creatorId())->pluck('value', 'name')->toArray();
            }
        } else {
            $user = User::where('type', 'super admin')->first();
            $setting = DB::table('settings')->where('created_by', $user->id)->pluck('value', 'name')->toArray();
        }
        if (!isset($setting['color'])) {
            $setting = Utility::settings();
        }
        return $setting;
    }

    public static function GetLogo()
    {
        $setting = Utility::colorset();

        if (\Auth::user() && \Auth::user()->type != 'super admin') {
            if ($setting['cust_darklayout'] == 'on') {
                return Utility::getValByName('company_logo_light');
            } else {
                return Utility::getValByName('company_logo_dark');
            }
        } else {
            if ($setting['cust_darklayout'] == 'on') {
                return Utility::getValByName('logo_light');
            } else {
                return Utility::getValByName('logo_dark');
            }
        }
    }
    public static function getRegistrationYears()
    {
        $list = [];

        for ($year = date("Y"); true; $year--) {

            $list[$year] = $year;
            if ($year == "1980") {
                break;
            }
        }

        $list["1975"] = "1975";
        $list["1970"] = "1970";
        $list["1965"] = "1965";
        $list["1960"] = "1960";
        $list["1955"] = "1955";
        $list["1950"] = "1950";
        $list["1945"] = "1945";
        $list["1940"] = "1940";
        $list["1935"] = "1935";
        $list["1930"] = "1930";
        $list["1925"] = "1925";
        $list["1920"] = "1920";
        $list["1915"] = "1915";
        $list["1910"] = "1910";
        $list["1905"] = "1905";
        $list["1900"] = "1900";

        return $list;
    }
    public static function getRegistrationMonths()
    {
        $list = [];
        foreach (range(1, 12) as $m) {
            $list[] = date('F', mktime(0, 0, 0, $m, 1));
        }
        return $list;
    }
    public static function getVehiclePowerTypes()
    {
        $list = ["1" => "kW", "2" => "Hp"];
        return $list;
    }
    public static function getUserRoles($type = "")
    {
        $list = [
            "Owner" => __('Sales Manager'),
            "language_specialist" => __('Language Specialist'),
            // "super admin"=>"Site Administrator",
        ];

        if ($type) {
            return $list[$type];
        } else {
            return $list;
        }
    }
    public static function getFooterTypes($type = "")
    {
        $list = ['1' => __('Standard'), '2' => __('Personalized')];

        if ($type) {
            return $list[$type];
        } else {
            return $list;
        }
    }
    public static function getVehicleTransmission($id = 0)
    {
        $list = [
            "1" => "Automatic",
            "2" => "Manual",
            "3" => "Semi-automatic",
            // "1" => "Automatic Transmission (AT)",
            // "2" => "Manual Transmission (MT)",
            // "3" => "Automated Manual Transmission (AM)",
            // "4" => "Continuously Variable Transmission (CVT)",
        ];

        if ($id) {
            return $list[$id];
        } else {
            return $list;
        }
    }
    public static function getLangCodes($lang)
    {
        $languages = array(
            'ar' => 'Arabic',
            'da' => 'Danish',
            'de' => 'German',
            'en' => 'English',
            'es' => 'Spanish',
            'fr' => 'French',
            'it' => 'Italy',
            'ja' => 'Japanese',
            'nl' => 'Dutch',
            'pl' => 'Polish',
            'pt' => 'Portuguese',
            'ru' => 'Russian',
        );

        return $languages[$lang];
    }
    public static function getStoreLanguages($store = false)
    {

        if ($store) {
            $store_languages = Language::where('store_id', $store->id)->first();
        } else {
            $store_languages = Language::where('store_id', Auth::user()->current_store)->first();
        }

        if (isset($store_languages->languages)) {
            $store_languages = json_decode($store_languages->languages);
        } else {
            $store_languages = [env('default_language') ?? 'en'];
        }

        return $store_languages;
    }
    public static function getTranslation($value, $lang)
    {
        $data = !empty($value) ? json_decode($value) : '';
        if (empty($data->$lang)) {
            $value = '';
        } else {
            $value = $data->$lang;
        }

        return $value;
    }
    public static function fetchLangs($store, $value, $request, $dummy = false)
    {
        $store_languages = Utility::getStoreLanguages($store);
        $setting = StoreThemeSettings::where('store_id', $store->id)->where('theme_name', $store->theme_dir)->where('name', $value)->first();


        if (!$dummy) {
            foreach ($store_languages as $lang) {
                $name  = $request["$lang" . '_' . $value . ''];
                if ($name) {
                    $data = [
                        'parent_id' => $setting->id,
                        'lang' => $lang,
                        'value' => $name,
                    ];

                    StoreThemeSettingLangs::updateOrCreate(
                        [
                            'parent_id' => $setting->id,
                            'lang' => $lang,
                        ],
                        $data
                    );
                }
            }
        } else {
            // $name = $request[$value];
            // if($name){
            //     $data = [
            //         'parent_id' => $setting->id,
            //         'lang' => "en",
            //         'value' => $name,
            //     ];

            //     StoreThemeSettingLangs::updateOrCreate(
            //         [
            //             'parent_id' => $setting->id,
            //             'lang' => "en",
            //         ],
            //         $data
            //     );
            // }

        }
    }

    public static function getFooter($footer_note, $user = "")
    {
        if (!$user) {
            $user = Auth::user();
        }
        $copyrightPlan = CopyrightPlan::where('id', $user->copyright_plan)->first();
        if ($copyrightPlan->price) {
            return $footer_note;
        } else {
            return $footer_note . " - " . __('Free Car Dealer Website Powered By') . " " . env('APP_NAME');
        }
    }
    public static function isSimilar($string1, $string2, $percentage)
    {

        $sim = similar_text(strtolower($string1), strtolower($string2), $perc);
        // echo "similarity: ".strtolower($string1)." & ".strtolower($string2)." ($perc%)<br>";
        if ($perc >= $percentage) {
            return true;
        } else {
            return false;
        }
    }
    public static function readMobileDeXML($dir)
    {

        //Creating an XMLReader
        $reader = new XMLReader();

        //Opening a reader
        $reader->open($dir);
        $data = array();
        //Reading the contents of the XML file
        while ($reader->read()) {
            if ($reader->nodeType == XMLREADER::ELEMENT) {
                $res = $reader->getAttribute('key');
                if ($res) {
                    $data[] = $res;
                }
            }
        }
        //Closing the reader
        $reader->close();
        return $data;
    }
    public static function getExteriorColorName($hex)
    {

        $colors = array(
            "black" => array(0, 0, 0),
            "gray"  => array(128, 0, 128),
            "beige" => array(245, 245, 220),
            "brown" => array(165, 42, 42),
            "red"   => array(255, 0, 0),
            "green" => array(0, 128, 0),
            "blue"  => array(0, 0, 255),
            "purple" => array(128, 0, 128),
            "gold"  => array(255, 215, 0),
            "white" => array(255, 255, 255),
            "orange" => array(255, 165, 0),
            "silver" => array(192, 192, 192),
            "yellow" => array(255, 255, 0),
            // "lime"      => array(0, 255, 0),
            // "olive"     => array(128, 128, 0),
            // "maroon"    => array(128, 0, 0),
            // "navy"      => array(0, 0, 128),
            // "teal"      => array(0, 128, 128),
            // "fuchsia"   => array(255, 0, 255),
            // "aqua"      => array(0, 255, 255),
        );

        $distances = array();
        $val  = self::hex2rgb($hex);
        foreach ($colors as $name => $c) {
            $distances[$name] = self::distancel2($c, $val);
        }

        $mincolor = "";
        $minval = pow(2, 30); /*big value*/
        foreach ($distances as $k => $v) {
            if ($v < $minval) {
                $minval = $v;
                $mincolor = $k;
            }
        }
        return strtoupper($mincolor);
    }
    public static function getInteriorColorName($hex)
    {

        $colors = array(
            "black" => array(0, 0, 0),
            "gray"  => array(128, 0, 128),
            "beige" => array(245, 245, 220),
            "brown" => array(165, 42, 42),
        );

        $distances = array();
        $val  = self::hex2rgb($hex);
        foreach ($colors as $name => $c) {
            $distances[$name] = self::distancel2($c, $val);
        }

        $mincolor = "";
        $minval = 80;
        // echo "$minval min";
        // print_r($distances);;
        foreach ($distances as $k => $v) {
            if ($v < $minval) {
                $minval = $v;
                $mincolor = $k;
            }
        }
        if ($mincolor) {
            return strtoupper($mincolor);
        } else {
            return "OTHER_INTERIOR_COLOR";
        }
    }
    public static function getStoreURL()
    {
        $store = Auth::user();
        $store_id = Store::where('id', $store->current_store)->first();
        if ($store_id) {
            $app_url = trim(env('APP_URL'), '/');
            return $app_url . '/store/' . $store_id['slug'];
        }
        return false;
    }
    public static function jsLanguageAdmin()
    {

        return array(

            'endTour' => __("End Tour"),
            'previous' => __("Previous"),
            'next' => __("Next"),
            'linkCopied' => __("Link copied "),
            'autoGallery' => __("autoGallery"),
            'agIntroducingText2' => __("autoGallery introducing text 2"),
            'agIntroducingText3' => __("autoGallery introducing text 3"),
            'show' => __("Show"),
            'autoGallery' => __("autoGallery"),
            'agreement' => __("Agreement"),
            'agreementText1' => __('agreement text 1', [
                'term' => '<a href="' . route('terms', app()->getLocale()) . '" target="_blank">' . __('Term & condition') . '</a>',
            ]),
            'contentSharing' => __("Content Sharing"),
            'desc1' => __("Would you like to transfer your existing theme data to this new theme?"),
            'desc2' => __("Upgrade your plan to enjoy these fantastic premium themes as your free trial has expired"),
            'desc3' => __("Elevate your experience by upgrading your plan to retain access to these premium themes"),
            'yes' => __("Yes"),
            'no' => __("No"),
            'deny' => __("Deny"),
            'agree' => __("Agree"),
            'expired' => __("Expired"),
            'cancel' => __("Cancel"),
            'upgradePlan' => __("Upgrade Plan"),
            'premiumPlanFreeTrial' => __("Premium Plan Free Trial"),
            'noThanks' => __("No, Thanks"),

        );
    }
    public static function getStorageUsage()
    {

        $user = Auth::user();
        $pr_image_size = DB::table('stores')
            ->select(DB::raw('stores.created_by,stores.id,products.id AS `product_id`'))
            ->join('products', 'products.store_id', '=', 'stores.id')
            ->join('product_images', 'product_images.product_id', '=', 'products.id')
            ->where('stores.created_by', $user->creatorId())->sum('image_size');

        // echo "total_size Products: $product_sizes <br>";

        // $total_size = 0;
        // foreach ($product_sizes as $product) {
        //     // print_r($product->product_id);

        //     $image_size = Product_images::where('product_id', $product->product_id)->sum('image_size');
        //     $total_size +=$image_size;
        //     echo "total size: ".number_format($image_size,2)." MB (product id: ".$product->product_id.")<br>";
        // }
        // echo "total_size $total_size <br>";


        //get total size of gallery
        $gl_image_size = Gallery::where('created_by', $user->creatorId())->sum('image_size');
        // echo "total_size on Gallery: $gl_image_size <br>";

        if (!$pr_image_size) {
            $pr_image_size = 0;
        }

        if (!$gl_image_size) {
            $gl_image_size = 0;
        }

        $total_usage = number_format(($pr_image_size + $gl_image_size), 2);
        return $total_usage;
        // echo "Total: $total <br>";

    }

    // public static function updateSortableNavMenu($store)
    // {


    //     $user = \App\Models\User::find($store->created_by);

    //     //save navigation menu to database that use to make sortable
    //     $menu = array();
    //     // if (!$store) {
    //     $store = Store::where('id',  $user->current_store)->first();
    //     // }

    //     $key = "sortable_nav_menu";

    //     // this query is fast comparing to Utility::getStoreThemeSetting($store->id, $store->theme_dir)
    //     $getStoreThemeSetting = StoreThemeSettings::select(["name"])
    //         ->where('store_id', $store->id)
    //         ->where('name', $key)
    //         ->where('theme_name', $store->theme_dir)
    //         ->first();

    //     if (isset($getStoreThemeSetting->name) && $getStoreThemeSetting->name == $key) {
    //         // do nothing
    //         return false;
    //     }

    //     $page_slug_urls = PageOption::get_page_slug_urls($store);
    //     if (!empty($page_slug_urls)) {
    //         foreach ($page_slug_urls as $k => $page_slug_url) {
    //             $menu[] = $page_slug_url->id;
    //         }
    //     }
    //     $menu[] = "Blog";
    //     $menu[] = "Contact Us";
    //     $menu[] = "Gallery";
    //     $menu[] = "Career With Us";


    //     $arr = [
    //         'name' => $key,
    //         'value' => json_encode($menu),
    //         'type' => null,
    //         'store_id' => $store->id,
    //         'theme_name' => $store->theme_dir,
    //         'created_by' => $user->creatorId(),
    //     ];

    //     StoreThemeSettings::updateOrCreate(
    //         [
    //             'name' => $key,
    //             'store_id' => $store->id,
    //             'theme_name' => $store->theme_dir,
    //         ],
    //         $arr
    //     );
    // }

    public static function createDummyPage($name)
    {

        $meta_title  = "Meta Title";
        $meta_description  = "Meta Description";
        $contents  = "Contents";

        $data = [
            'slug' => $name,
            'store_id' => \Auth::user()->current_store,
            'enable_page_header' => 'on',
            'enable_page_footer' => 'off',
            'created_by' => \Auth::user()->creatorId(),
        ];
        $pageSlug = PageOption::create($data);
        $data = [
            'parent_id' => $pageSlug->id,
            'lang' => "en",
            'name' => $name,
            'contents' => $contents,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
        ];
        PageOptionLangs::create($data);
    }

    public static function updateInitialSetup($step)
    {
        /*
        When the user registers, they are guided through an initial setup wizard, 
        which begins by inquiring about the company overview, store layout, 
        and other essential information. This function enables seamless tracking of 
        the user's progress as they complete each step.
        */
        $user = Auth::user();

        if ($user->initial_setup) {
            $initial_setup = json_decode($user->initial_setup);
            if (!in_array($step, $initial_setup)) {
                $initial_setup[] = $step;
                $user->initial_setup = json_encode($initial_setup);
            }
        } else {
            $initial_setup[] = $step;
            $user->initial_setup = json_encode($initial_setup);
        }
        $user->save();
    }

    public static function getThemeMapping($theme, $mapping_type = "mapping")
    {
        /*
        Utilize the function of assigning names to themes, 
        where each distinct theme is accompanied by a unique appellation. 
        However, within the database, these themes are stored discreetly 
        as "theme1," "theme2," and so forth. The exclusive visibility of the designated 
        theme names is reserved for the user's perception.
        */

        if ($mapping_type == "mapping") {
            $theme_mapping = ThemeMapping::where("theme_name", $theme)->where("lang", app()->getLocale())->first();
            if (isset($theme_mapping->id)) {
                return $theme_mapping->mapping;
            }
        } else if ($mapping_type == "unmapping") {
            $theme_mapping = ThemeMapping::where("mapping", $theme)->where("lang", app()->getLocale())->first();
            if (isset($theme_mapping->id)) {
                return $theme_mapping->theme_name;
            }
        }
        return $theme;
    }

    public static function shareContentBetweenThemes($store, $copy_from, $copy_to)
    {

        $storeThemeSettingShareable = StoreThemeSettings::where('store_id', $store->id)->where('theme_name', $copy_from)->get();

        $post = [];
        foreach ($storeThemeSettingShareable as $row) {
            $post[$row->name] = $row->value;
        }


        foreach ($post as $key => $data) {
            $arr = [
                'name' => $key,
                'value' => $data,
                'type' => null,
                'store_id' => $store->id,
                'theme_name' => $copy_to,
                'created_by' => Auth::user()->creatorId(),
            ];

            switch ($key) {
                case "top_bar_title":
                case "header_title":
                case "header_desc":
                case "button_text":
                case "quick_contact_info":
                case "office_address":
                case "opening_hours":
                case "gallery_title":
                case "gallery_description":
                case "subscriber_title":
                case "subscriber_sub_title":
                case "categories":
                case "categories_title":
                case "testimonial_main_heading":
                case "testimonial_main_heading_title":
                case "testimonial_name1":
                case "testimonial_about_us1":
                case "testimonial_description1":
                case "testimonial_name2":
                case "testimonial_about_us2":
                case "testimonial_description2":
                case "testimonial_name3":
                case "testimonial_about_us3":
                case "testimonial_description3":
                case "quick_link_header_name1":
                case "quick_link_name1":
                case "quick_link_name12":
                case "quick_link_name13":
                case "quick_link_name14":
                case "quick_link_header_name2":
                case "quick_link_name21":
                case "quick_link_name22":
                case "quick_link_name23":
                case "quick_link_name24":
                case "quick_link_header_name3":
                case "quick_link_name31":
                case "quick_link_name32":
                case "quick_link_name33":
                case "quick_link_name34":
                case "quick_link_header_name4":
                case "quick_link_name41":
                case "quick_link_name42":
                case "quick_link_name43":
                case "quick_link_name44":
                case "features_title1":
                case "features_description1":
                case "features_title2":
                case "features_description2":
                case "features_title3":
                case "features_description3":
                case "job_board_title":
                case "job_board_description":

                    $arr =  array_merge($arr, ["langs_available" => 1]);
                    break;
            }

            $settings = StoreThemeSettings::updateOrCreate(
                [
                    'name' => $key,
                    'store_id' => $store->id,
                    'theme_name' => $copy_to,
                ],
                $arr
            );

            if ($settings->langs_available == 1) {
                $storeShareable = StoreThemeSettings::where('store_id', $store->id)->where('theme_name', $copy_from)->where('name', $settings->name)->first();
                $translations = StoreThemeSettingLangs::where('parent_id', $storeShareable->id)->get();

                foreach ($translations as $translation) {

                    StoreThemeSettingLangs::updateOrCreate(
                        [
                            'parent_id' => $settings->id,
                            'lang' => $translation->lang,
                        ],
                        [
                            'parent_id' => $settings->id,
                            'lang' => $translation->lang,
                            'value' => $translation->value,
                        ]
                    );
                }
            }
        }
        // $setting = StoreThemeSettings::where('store_id', $store->id)->where('theme_name', $copy_from)->where('name', 'top_bar_title')->first();
    }

    public static function shareContentBetweenStores($copy_from, $copy_to)
    {

        // $copy_from = Store::where('slug', $request->slug)->first();
        // $store = Store::find(Auth::user()->current_store);


        $columns = DB::select("SELECT GROUP_CONCAT(column_name) as names FROM information_schema.columns WHERE table_schema=? AND table_name=?", [env('DB_DATABASE'), "stores"]);
        $columns = explode(",", $columns[0]->names);

        foreach ($columns as $column) {

            switch ($column) {
                case "id":
                case "name":
                case "email":
                case "slug":
                case "created_by":
                case "created_at":
                    break;
                default:
                    if (isset($copy_from[$column])) {
                        $copy_to[$column] = $copy_from[$column];
                        // echo "$column - store [".$copy_to[$column]."]  shareable_store [".$copy_from[$column]."] <br>";
                    }
                    break;
            }
        }
        $copy_to->update();

        //duplicate payment settings
        $storePSShareable = StorePaymentSettings::where('store_id', $copy_from->id)->get();
        foreach ($storePSShareable as $row) {
            $arr = [
                'name' => $row->name,
                'value' => $row->value,
                'store_id' => $copy_to->id,
                'created_by' => Auth::user()->creatorId(),
            ];
            StorePaymentSettings::updateOrCreate(
                [
                    'name' => $row->name,
                    'store_id' => $copy_to->id,
                ],
                $arr
            );
        }
    }

    public static function isProductPlanActive($user = "")
    {

        if (!$user) {
            $user = Auth::user();
        }

        $datetime2 = date('Y-m-d');
        $product_plan = ProductPlan::find($user->product_plan);



        if ($product_plan) {


            $datetime1 = $user->product_plan_expire_date;
            if (!empty($datetime1) && $datetime1 < $datetime2) {
                //expired
                return false;
            } else {
                return true;
            }
        }
        return false;
    }

    public static function getAutoGalleryTypes($type = "")
    {
        $list = [
            "header_img" => __('Header Images'),
            "testimonial_img" => __('Testimonial Images'),
            "slider_img" => __('Slider Images'),
            "brand_logo" => __('Brand Logo'),
            "email_subscriber_img" => __('Email Subscriber Images'),
        ];

        if ($type) {
            return $list[$type];
        } else {
            return $list;
        }
    }

    public static function getAdminSetting($key)
    {
        $setting = Setting::where('name', $key)->first();
        if (!isset($setting->name) || empty($setting->name)) {
            return null;
        }
        return $setting->value;
    }

    public static function getInvoiceType($id = 0)
    {
        $list = [
            "1" => "Automatic",
            "2" => "Manual",
            "3" => "Semi-automatic",
            // "1" => "Automatic Transmission (AT)",
            // "2" => "Manual Transmission (MT)",
            // "3" => "Automated Manual Transmission (AM)",
            // "4" => "Continuously Variable Transmission (CVT)",
        ];

        if ($id) {
            return $list[$id];
        } else {
            return $list;
        }
    }

    public static function styleSwitcherEnabledThemes()
    {
        return [
            "themePlus1",
            "theme23",
            "theme24",
            "theme25",
            "theme26",
            "theme27",
            "theme28",
            "theme29",
            "theme30",
            "theme31",
            "theme32",
            "theme33",
            "theme34",
            "theme35",
            "theme36",
            "theme37",
        ];
    }

    public static function generateHexColor()
    {
        // Generate random RGB values
        // match well with a white background, the generated colors should have sufficient contrast.
        $red = mt_rand(0, 255);
        $green = mt_rand(0, 255);
        $blue = mt_rand(0, 255);

        // Convert RGB to hex
        $hex = sprintf("#%02x%02x%02x", $red, $green, $blue);

        return $hex;
    }

    public static function generateLink($menu_title, $settings, $store, $plan)
    {

        if (is_numeric($menu_title) && floor($menu_title) == $menu_title) {
            $page_slug_url = PageOption::get_page_slug($menu_title);

            if ((isset($page_slug_url->slug))) {

                $link_url = env('APP_URL') . '/page/' . $page_slug_url->slug;
                $link_name = ucfirst($page_slug_url->name);
                $id = $page_slug_url->id;
            }
        } else {
            $blog = Blog::where('store_id', $store->id)->count();

            if ($menu_title == 'Blog' && $store['blog_enable'] == 'on' && !empty($blog)) {
                $link_url = route('store.blog', $store->slug);
            } elseif ($menu_title == 'Home') {
                $link_url = route('store.slug', $store->slug);
            } elseif ($menu_title == 'Contact Us') {
                $link_url = route('store.contact', $store->slug);
            } elseif (
                $menu_title == 'Gallery' &&
                isset($settings['enable_gallery']) &&
                $settings['enable_gallery'] == 'on'
            ) {
                $link_url = route('store.gallery', $store->slug);
            } elseif (
                $menu_title == 'Career With Us' &&
                $plan->job_board == 'on' && isset($settings['enable_job_board']) &&
                $settings['enable_job_board'] == 'on'
            ) {
                $link_url = route('store.job-board', $store->slug);
            }
            $link_name = __($menu_title);
            $id = $menu_title;
        }

        if (isset($link_url)) {
            return [
                "link_url" => $link_url,
                "link_name" => $link_name,
                "id" => $id
            ];
        }

        return false;
    }

    public static function defaultMenu($settings, $store, $plan)
    {

        $array = [];
        array_push($array, "Home");

        $blog = Blog::where('store_id', $store->id)->count();
        if ($store['blog_enable'] == 'on' && !empty($blog)) {
            array_push($array, "Blog");
        }

        array_push($array, "Contact Us");


        if (isset($settings['enable_gallery']) && $settings['enable_gallery'] == 'on') {
            array_push($array, "Gallery");
        }
        if (
            $plan->job_board == 'on' &&
            isset($settings['enable_job_board']) &&
            $settings['enable_job_board'] == 'on'
        ) {
            array_push($array, "Career With Us");
        }
        return json_encode($array);
    }
    public static function defaultMenuV2($settings, $store, $plan, $validation = false,$get_footer = false)
    {

        $menu[] = "Home";

        $blog = Blog::where('store_id', $store->id)->count();
        if ($store['blog_enable'] == 'on' && !empty($blog)) {
            $menu[] = "Blog";
        }
        $menu[] = "Contact Us";

        if (isset($settings['enable_gallery']) && $settings['enable_gallery'] == 'on') {
            $menu[] = "Gallery";
        }
        if (
            $plan->job_board == 'on' &&
            isset($settings['enable_job_board']) &&
            $settings['enable_job_board'] == 'on'
        ) {
            $menu[] = "Career With Us";
        }


        $page_slug_urls = PageOption::get_page_slug_urls($store);
        foreach ($page_slug_urls as $k => $page_slug_url) {
            // $page_slugs = [];
            if ($page_slug_url->enable_page_header == 'on') {
                $menu[] = $page_slug_url->id;
            }
        }
        if ($validation) {
            foreach ($menu as $key => $nav) {

                if($get_footer){
                    if (isset($settings['footer_menu_1']) && $settings['footer_menu_1']) {
                        $footer_menu = json_decode($settings['footer_menu_1']);
                        if (in_array($nav, $footer_menu)) {
                            unset($menu[$key]);
                        }
                    }
                    if (isset($settings['footer_menu_2']) && $settings['footer_menu_2']) {
                        $footer_menu = json_decode($settings['footer_menu_2']);
                        if (in_array($nav, $footer_menu)) {
                            unset($menu[$key]);
                        }
                    }
                    if (isset($settings['footer_menu_3']) && $settings['footer_menu_3']) {
                        $footer_menu = json_decode($settings['footer_menu_3']);
                        if (in_array($nav, $footer_menu)) {
                            unset($menu[$key]);
                        }
                    }
                    if (isset($settings['footer_menu_4']) && $settings['footer_menu_4']) {
                        $footer_menu = json_decode($settings['footer_menu_4']);
                        if (in_array($nav, $footer_menu)) {
                            unset($menu[$key]);
                        }
                    }

                }else{
                    if (isset($settings['primary_nav_menu']) && $settings['primary_nav_menu']) {
                        $primary_menu = json_decode($settings['primary_nav_menu']);
                        if (in_array($nav, $primary_menu)) {
                            unset($menu[$key]);
                        }
                    }
                    if (isset($settings['secondary_nav_menu']) && $settings['secondary_nav_menu']) {
                        $secondary_menu = json_decode($settings['secondary_nav_menu']);
                        if (in_array($nav, $secondary_menu)) {
                            unset($menu[$key]);
                        }
                    }
                }

                
            }
        }


        return $menu;
    }
}
