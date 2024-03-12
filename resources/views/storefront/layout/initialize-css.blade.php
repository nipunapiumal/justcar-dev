@php
    if ($plan->ad_free == 'off') {
        $i_ads = \App\Models\Advertisement::where('advertisement_type', 3)->get();
        $i_ads_arr = [];

        foreach ($i_ads as $i_ad) {
            $i_ads_arr[] = $i_ad->url;
            $i_ads_lutime = $i_ad->updated_at;
        }
    }
@endphp

@if (in_array($store->theme_dir, Utility::styleSwitcherEnabledThemes()))
    {{-- theme 23-28 --}}
    {{-- default primary - #f0151f --}}
    {{-- default secondary - #0c47a9 --}}

    {{-- theme 29-34 --}}
    {{-- default primary - #46D993 --}}

    <style>
        :root {
            --primary: {{ !empty($storethemesetting['premium_plus_primary_color']) ? $storethemesetting['premium_plus_primary_color'] : '#099fdc' }};
            --secondary: {{ !empty($storethemesetting['premium_plus_secondary_color']) ? $storethemesetting['premium_plus_secondary_color'] : '#0b6afb' }};
            --tertiary: {{ !empty($storethemesetting['premium_plus_tertiary_color']) ? $storethemesetting['premium_plus_tertiary_color'] : '#262c36' }};
            --quaternary: {{ !empty($storethemesetting['premium_plus_quaternary_color']) ? $storethemesetting['premium_plus_quaternary_color'] : '#343c4a' }};
        }
    </style>
@endif

<link rel="stylesheet" href="{{ asset('custom/libs/@fortawesome/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('custom/libs/aco.notification-service/aco.notification-service.1.2.0.css') }}">
<link rel="stylesheet" href="{{ asset('custom/css/front-custom.css') }}" type="text/css">

@if (isset($i_ads_arr) && isset($i_ads_lutime))
    <script>
        interstitialAdURLs = @json($i_ads_arr);
        interstitialAdLUTime = @json($i_ads_lutime);
    </script>
@endif
