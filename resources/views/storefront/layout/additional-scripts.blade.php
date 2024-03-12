@if (App\Models\Utility::getValByName('gdpr_cookie') == 'on')
    <script type="text/javascript">
        var defaults = {
            'messageLocales': {
                /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                'en': "{{ App\Models\Utility::getValByName('cookie_text') }}"
            },
            'buttonLocales': {
                'en': 'Ok'
            },
            'cookieNoticePosition': 'bottom',
            'learnMoreLinkEnabled': false,
            'learnMoreLinkHref': '/cookie-banner-information.html',
            'learnMoreLinkText': {
                'it': 'Saperne di più',
                'en': 'Learn more',
                'de': 'Mehr erfahren',
                'fr': 'En savoir plus'
            },
            'buttonLocales': {
                'en': 'Ok'
            },
            'expiresIn': 30,
            'buttonBgColor': '#d35400',
            'buttonTextColor': '#fff',
            'noticeBgColor': '#000',
            'noticeTextColor': '#fff',
            'linkColor': '#009fdd'
        };
    </script>
    <script src="{{ asset('custom/js/cookie.notice.js') }}"></script>
@endif


@stack('script-page')
@if (Session::has('success'))
    <script>
        showToast('{{ __('Success') }}', '{!! session('success') !!}', 'success');
        // show_toastr('{{ __('Success') }}', '{!! session('success') !!}', 'success');
    </script>
    {{ Session::forget('success') }}
@endif
@if (Session::has('error'))
    <script>
        showToast('{{ __('Error') }}', '{!! session('error') !!}', 'error');
        // show_toastr('{{ __('Error') }}', '{!! session('error') !!}', 'error');
    </script>
    {{ Session::forget('error') }}
@endif
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $store_settings->google_analytic }}"></script>

{!! $store_settings->storejs !!}

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', '{{ $store_settings->google_analytic }}');
</script>
<!-- Facebook Pixel Code -->
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '{{ $store_settings->fbpixel_code }}');
    fbq('track', 'PageView');
</script>

@if (!empty($store->smartsupp_key) && $store->is_smartsupp_enable == 'on')
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = "<?php echo $store->smartsupp_key; ?>";
        window.smartsupp || (function(d) {
            var s, c, o = smartsupp = function() {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
    </script>
@endif

<noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=0000&ev=PageView&noscript={{ $store_settings->fbpixel_code }}" /></noscript>

        <!-- Modal -->
<div class="modal fade" id="language-selection-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered locale-settings-package">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="language-selection-modal-label">{{__('Default Language')}}</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <div class="modal-theme">
            <div class="selection-list">
                
                @foreach ($languages as $language)
                <a href="{{ route('change.languagestore', [$store->slug, $language]) }}" class="item-row">
                    <div class="item-row-content d-flex align-items-center justify-content-start {{$currantLang==$language?'selected':''}}">
                        @if($currantLang==$language)
                        <span class="selected-icon">
                            <i class="fas fa-check text-muted"></i>
                        </span>
                        @endif
                        <p class="mb-0 text-muted">{{ \App\Models\Utility::getLangCodes($language) }}</p>
                    </div>
                </a>                
            
                            @endforeach
            </div>
            </div>

        </div>
      </div>
    </div>
  </div>