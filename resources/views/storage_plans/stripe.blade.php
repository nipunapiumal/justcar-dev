@extends('layouts.admin')
@php
    $dir = asset(Storage::url('uploads/plan'));
    $defaultDuration = 0;
    
@endphp
@push('script-page')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var type = window.location.hash.substr(1);
        $('.list-group-item').removeClass('active');
        $('.list-group-item').removeClass('text-primary');
        if (type != '') {
            $('a[href="#' + type + '"]').addClass('active').removeClass('text-primary');
        } else {
            $('.list-group-item:eq(0)').addClass('active').removeClass('text-primary');
        }

        $(document).on('click', '.list-group-item', function() {
            $('.list-group-item').removeClass('active');
            $('.list-group-item').removeClass('text-primary');
            setTimeout(() => {
                $(this).addClass('active').removeClass('text-primary');
            }, 10);
        });

        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>

    <script type="text/javascript">
        @if (
            $storage_plan->price > 0.0 &&
                isset($admin_payments_details['is_stripe_enabled']) &&
                $admin_payments_details['is_stripe_enabled'] == 'on')
            var stripe = Stripe('{{ $admin_payments_details['stripe_key'] }}');
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '14px',
                    color: '#32325d',
                },
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        $("#card-errors").html(result.error.message);
                        show_toastr('Error', result.error.message, 'error');
                    } else {
                        Swal.fire({
                            title: "{{ __('Agreement') }}",
                            html: jsLang.agreementText1,
                            showDenyButton: true,
                            confirmButtonText: "{{ __('Agree') }}",
                            denyButtonText: "{{ __('Deny') }}",
                        }).then((ok) => {
                            if (ok.isConfirmed) {
                                // Send the token to your server.
                                stripeTokenHandler(result.token);
                            }
                           
                        });

                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        @endif
        function preparePayment(ele, payment) {
            var coupon = $(ele).closest('.row').find('.coupon').val();
            var amount = 0;

            Swal.fire({
                title: "{{ __('Agreement') }}",
                html: jsLang.agreementText1,
                showDenyButton: true,
                // showCancelButton: true,
                confirmButtonText: "{{ __('Agree') }}",
                denyButtonText: "{{ __('Deny') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('plan.prepare.amount') }}',
                        datType: 'json',
                        data: {
                            storage_id: '{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}',
                            coupon: coupon
                        },
                        success: function(data) {

                            if (data.is_success == true) {
                                amount = data.price;
                                $('#coupon_use_id').val(data.coupon_id);
                                if (payment == 'paystack') {
                                    payWithPaystack(amount);
                                }
                                if (payment == 'flutterwave') {
                                    payWithRave(amount);
                                }
                                if (payment == 'razorpay') {
                                    payRazorPay(amount);
                                }
                                if (payment == 'mercado') {
                                    payMercado(amount);
                                }
                            } else {
                                show_toastr('Error', 'Paymenent request failed', 'error');
                            }

                        }
                    })
                }

            });




        }
        @if (isset($admin_payments_details['is_paystack_enabled']) && $admin_payments_details['is_paystack_enabled'] == 'on')
            function payWithPaystack(amount) {
                var coupon_id = $('#coupon_use_id').val();
                var paystack_callback = "{{ url('/paystack-plan') }}";
                var handler = PaystackPop.setup({
                    key: '{{ $admin_payments_details['paystack_public_key'] }}',
                    email: '{{ Auth::user()->email }}',
                    amount: amount * 100,
                    currency: '{{ env('CURRENCY') }}',
                    ref: 'pay_ref_id' + Math.floor((Math.random() * 1000000000) +
                        1
                    ),
                    // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    metadata: {
                        custom_fields: [{
                            display_name: "Mobile Number",
                            variable_name: "mobile_number",
                        }]
                    },

                    callback: function(response) {
                        {{-- console.log(paystack_callback +'/'+ response.reference + '/' + '{{\Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id)}}'); --}}
                        window.location.href = paystack_callback + '/' + response.reference + '/' +
                            '{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}?coupon_id=' +
                            coupon_id;
                    },
                    onClose: function() {
                        alert('window closed');
                    }
                });
                handler.openIframe();
            }
        @endif
        @if (isset($admin_payments_details['is_flutterwave_enabled']) &&
                $admin_payments_details['is_flutterwave_enabled'] == 'on')
            {{-- Flutterwave JAVASCRIPT FUNCTION --}}

            function payWithRave(amount) {
                var coupon_id = $('#coupon_use_id').val();
                var API_publicKey = '{{ $admin_payments_details['flutterwave_public_key'] }}';
                var nowTim = "{{ date('d-m-Y-h-i-a') }}";
                var flutter_callback = "{{ url('/flutterwave-plan') }}";
                var x = getpaidSetup({
                    PBFPubKey: API_publicKey,
                    customer_email: '{{ Auth::user()->email }}',
                    amount: amount,
                    currency: '{{ env('CURRENCY') }}',
                    txref: nowTim + '__' + Math.floor((Math.random() * 1000000000)) + 'fluttpay_online-' +
                        {{ date('Y-m-d') }},
                    meta: [{
                        metaname: "payment_id",
                        metavalue: "id"
                    }],
                    onclose: function() {},
                    callback: function(response) {

                        var txref = response.tx.txRef;

                        if (
                            response.tx.chargeResponseCode == "00" ||
                            response.tx.chargeResponseCode == "0"
                        ) {
                            window.location.href = flutter_callback + '/' + txref + '/' +
                                '{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}?coupon_id=' +
                                coupon_id;
                        } else {
                            // redirect to a failure page.
                        }
                        x.close(); // use this to close the modal immediately after payment.
                    }
                });
            }
        @endif
        @if (isset($admin_payments_details['is_razorpay_enabled']) && $admin_payments_details['is_razorpay_enabled'] == 'on')
            {{-- Razorpay JAVASCRIPT FUNCTION --}}
            @php
                $logo = asset(Storage::url('uploads/logo/'));
                $company_logo = \App\Models\Utility::getValByName('company_logo');
            @endphp

            function payRazorPay(amount) {
                var razorPay_callback = '{{ url('razorpay-plan') }}';
                var totalAmount = amount * 100;
                var coupon_id = $('#coupon_use_id').val();
                var options = {
                    "key": "{{ $admin_payments_details['razorpay_public_key'] }}", // your Razorpay Key Id
                    "amount": totalAmount,
                    "name": 'Plan',
                    "currency": '{{ env('CURRENCY') }}',
                    "description": "",
                    "image": "{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}",
                    "handler": function(response) {
                        window.location.href = razorPay_callback + '/' + response.razorpay_payment_id + '/' +
                            '{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}?coupon_id=' +
                            coupon_id;
                    },
                    "theme": {
                        "color": "#528FF0"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        @endif
        @if (isset($admin_payments_details['is_mercado_enabled']) && $admin_payments_details['is_mercado_enabled'] == 'on')
            {{-- Mercado JAVASCRIPT FUNCTION --}}

            function payMercado(amount) {
                var coupon_id = $('#coupon_use_id').val();
                var data = {
                    coupon_id: coupon_id,
                    total_price: amount,
                    plan: {{ $storage_plan->id }},
                }
                console.log(data);
                $.ajax({
                    url: '{{ route('mercadopago.prepare.plan') }}',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            window.location.href = data.url;
                        } else {
                            show_toastr("Error", data.error, data["status"]);
                        }
                    }
                });
            }
        @endif
    </script>
@endpush
@php
    $dir = asset(Storage::url('uploads/plan'));
    $dir_payment = asset(Storage::url('uploads/payments'));
@endphp
@section('page-title')
    {{ __('Order Summary') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">{{ __('Order Summary') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">{{ __('Plan') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Order Summary') }}</li>
@endsection
@section('action-btn')
@endsection
@section('content')
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            {{-- <div class="alert alert-warning" role="alert">
                A simple warning alert with <a href="#" class="alert-link" data-bs-toggle="modal"
                    data-bs-target="#modelAgreement">agreement</a>. Give it a click if you
                like.
            </div> --}}
            {{-- @if (\Auth::user()->type == 'Owner')
                <div id="modelAgreement" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="modelAgreementLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modelAgreementLabel">{{ __('Agreement') }}
                                </h4>
                            </div>
                            <div class="modal-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap into electronic typesetting,
                                    remaining essentially unchanged. It was popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                                <div class="form-group">
                                    <input type="button" value="{{ __('Accept') }}" class="btn btn-primary"
                                        data-bs-dismiss="modal">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif --}}
            <div class="row">
                <div class="col-xl-4">
                    <div class="sticky-top" style="top:30px">
                        <div>
                            <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                                style="
                                                                        visibility: visible;
                                                                        animation-delay: 0.2s;
                                                                        animation-name: fadeInUp;
                                                                      ">
                                <div class="card-body">
                                    <span class="price-badge bg-primary">
                                        {{ $storage_plan->name }}
                                    </span>
                                    @if (\Auth::user()->type == 'Owner' && \Auth::user()->plan == $storage_plan->id)
                                        <div class="d-flex flex-row-reverse m-0 p-0 ">
                                            <span class="d-flex align-items-center ">
                                                <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                                <span class="ms-2">{{ __('Active') }}</span>
                                            </span>
                                        </div>
                                    @endif

                                    <div class="text-end">
                                        <div class="mb-3">
                                            @if (\Auth::user()->type == 'super admin')
                                                <div class="action-btn bg-primary ms-2">
                                                    <a href="#"
                                                        data-url="{{ route('storage_plans.edit', $storage_plan->id) }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-ajax-popup="true" data-title="{{ __('Edit Plan') }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ __('Edit ') }}"><i
                                                            class="fas fa-edit text-white"></i></a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <h6 class="f-w-600">
                                        {{ $storage_plan->price }}{{ env('CURRENCY_SYMBOL') }}
                                        {{-- {{ __('Per Month') }} / {{ $storage_plan->price }}{{ env('CURRENCY_SYMBOL') }} --}}
                                    </h6>
                                    <h6 class="f-w-600">
                                        {{ __('Duration') }} / {{ env('STORAGE_PLAN_DURATION') }} {{ __('Months') }}
                                    </h6>

                                    @if ($credits && $storage_plan->price)
                                        <h4 class="mb-4 f-w-600">
                                            {{ __('Credits') }} / {{ $credits }}{{ env('CURRENCY_SYMBOL') }}
                                            <small>
                                                <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="{{ __('You save this amount from your previous storage plan') }}"></i>
                                            </small>
                                        </h4>
                                    @endif

                                    <h4>{{ __('Total Amount (+19% VAT)') }}</h4>
                                    @php
                                        $priceWithTax = App\Models\StoragePlan::priceWithTax($storage_plan->price);
                                    @endphp
                                    <h5> {{ $priceWithTax['pretty_with_tax'] }}</h5>


                                    @if ($storage_plan->description)
                                        <p class="mb-0">
                                            {{ $storage_plan->description }}<br />
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="list-group list-group-flush" id="useradd-sidenav">
                                @if (isset($admin_payments_details['is_stripe_enabled']) && $admin_payments_details['is_stripe_enabled'] == 'on')
                                    <a href="#stripe_payment"
                                        class="list-group-item list-group-item-action">{{ __('Stripe') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payments_details['is_paypal_enabled']) && $admin_payments_details['is_paypal_enabled'] == 'on')
                                    <a href="#paypal_payment"
                                        class="list-group-item list-group-item-action">{{ __('Paypal') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payments_details['is_paystack_enabled']) && $admin_payments_details['is_paystack_enabled'] == 'on')
                                    <a href="#paystack_payment"
                                        class="list-group-item list-group-item-action">{{ __('Paystack') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif


                                @if (isset($admin_payments_details['is_flutterwave_enabled']) &&
                                        $admin_payments_details['is_flutterwave_enabled'] == 'on')
                                    <a href="#flutterwave_payment"
                                        class="list-group-item list-group-item-action">{{ __('Flutterwave') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payments_details['is_razorpay_enabled']) && $admin_payments_details['is_razorpay_enabled'] == 'on')
                                    <a href="#razorpay_payment"
                                        class="list-group-item list-group-item-action">{{ __('Razorpay') }} <div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payments_details['is_mercado_enabled']) && $admin_payments_details['is_mercado_enabled'] == 'on')
                                    <a href="#mercado_payment"
                                        class="list-group-item list-group-item-action">{{ __('Mercado Pago') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payments_details['is_paytm_enabled']) && $admin_payments_details['is_paytm_enabled'] == 'on')
                                    <a href="#paytm_payment"
                                        class="list-group-item list-group-item-action">{{ __('Paytm') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payments_details['is_mollie_enabled']) && $admin_payments_details['is_mollie_enabled'] == 'on')
                                    <a href="#mollie_payment"
                                        class="list-group-item list-group-item-action">{{ __('Mollie') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payments_details['is_skrill_enabled']) && $admin_payments_details['is_skrill_enabled'] == 'on')
                                    <a href="#skrill_payment"
                                        class="list-group-item list-group-item-action">{{ __('Skrill') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payments_details['is_coingate_enabled']) && $admin_payments_details['is_coingate_enabled'] == 'on')
                                    <a href="#coingate_payment"
                                        class="list-group-item list-group-item-action">{{ __('Coingate') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payments_details['is_paymentwall_enabled']) &&
                                        $admin_payments_details['is_paymentwall_enabled'] == 'on')
                                    <a href="#paymentwall_payment"
                                        class="list-group-item list-group-item-action">{{ __('Paymentwall') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 payment-btn">
                    @if (isset($admin_payments_details['is_stripe_enabled']) && $admin_payments_details['is_stripe_enabled'] == 'on')
                        {{-- stripe payment --}}
                        <div id="stripe_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Stripe') }}</h5>
                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (
                                $admin_payments_details['is_stripe_enabled'] == 'on' &&
                                    !empty($admin_payments_details['stripe_key']) &&
                                    !empty($admin_payments_details['stripe_secret']))
                                <div class="tab-pane {{ ($admin_payments_details['is_stripe_enabled'] == 'on' && !empty($admin_payments_details['stripe_key']) && !empty($admin_payments_details['stripe_secret'])) == 'on' ? 'active' : '' }}"
                                    id="stripe_payment">
                                    <form role="form" action="{{ route('stripe.pay') }}" method="post"
                                        class="require-validation" id="payment-form">
                                        @csrf

                                        <div class="border p-3 rounded stripe-payment-div">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="custom-radio">
                                                        <label
                                                            class="font-16 font-weight-bold">{{ __('Credit / Debit Card') }}</label>
                                                    </div>
                                                    <p class="mb-0 pt-1 text-sm">
                                                        {{ __('Safe money transfer using your bank account. We support Mastercard, Visa, Discover and American express.') }}
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="card-name-on"
                                                            class="form-label text-dark">{{ __('Name on card') }}</label>
                                                        <input type="text" name="name" id="card-name-on"
                                                            class="form-control required"
                                                            placeholder="{{ \Auth::user()->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div id="card-element">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>
                                                    <div id="card-errors" role="alert"></div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-group w-100">
                                                            <label for="paypal_coupon"
                                                                class="form-label">{{ __('Coupon') }}</label>
                                                            <input type="text" id="stripe_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Coupon Code') }}">
                                                        </div>
                                                        <div class="form-group ms-3 mt-4">
                                                            <a href="#" class="text-muted apply-coupon"
                                                                data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                                    class="fas fa-save"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="error" style="display: none;">
                                                        <div class='alert-danger alert'>
                                                            {{ __('Please correct the errors and try again.') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}"
                                                    name="plan_duration_id"> --}}
                                                <input type="hidden" name="storage_id"
                                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">
                                                <input type="submit" value="{{ __('Continue') }}"
                                                    class="btn btn-xs btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- stripr payment end --}}
                    @endif
                    @if (isset($admin_payments_details['is_paypal_enabled']) && $admin_payments_details['is_paypal_enabled'] == 'on')
                        {{-- paypal  --}}
                        <div id="paypal_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Paypal') }}</h5>
                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (
                                $admin_payments_details['is_paypal_enabled'] == 'on' &&
                                    !empty($admin_payments_details['paypal_client_id']) &&
                                    !empty($admin_payments_details['paypal_secret_key']))
                                <div class="tab-pane {{ ($admin_payments_details['is_stripe_enabled'] != 'on' && $admin_payments_details['is_paypal_enabled'] == 'on' && !empty($admin_payments_details['paypal_client_id']) && !empty($admin_payments_details['paypal_secret_key'])) == 'on' ? 'active' : '' }}"
                                    id="paypal_payment">
                                    {{-- <div class="card"> --}}
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="{{ route('storage.plan.pay.with.paypal') }}">
                                        @csrf
                                        {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}" name="plan_duration_id"> --}}
                                        <input type="hidden" name="storage_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">

                                        <div class="border p-3 mb-3 rounded">
                                            <div class="row">
                                                <div class="col-md-12 mt-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-group w-100">
                                                            <label for="paypal_coupon"
                                                                class="form-label">{{ __('Coupon') }}</label>
                                                            <input type="text" id="paypal_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Coupon Code') }}">
                                                        </div>

                                                        <div class="form-group ms-3 mt-4">
                                                            <a href="#" class="text-muted apply-coupon"
                                                                data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                                    class="fas fa-save"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <input type="button" value="{{ __('Continue') }}"
                                                    class="btn btn-xs btn-primary submit-btn">
                                            </div>
                                        </div>
                                    </form>
                                    {{-- </div> --}}
                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- paypal end --}}
                    @endif
                    @if (isset($admin_payments_details['is_paystack_enabled']) && $admin_payments_details['is_paystack_enabled'] == 'on')
                        {{-- Paystack --}}
                        <div id="paystack_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Paystack') }}</h5>

                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (isset($admin_payments_details['is_paystack_enabled']) && $admin_payments_details['is_paystack_enabled'] == 'on')
                                <div id="paystack-payment" class="tabs-card">
                                    <div class="">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="paystack_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="paystack_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right paymentwall-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="paymentwall-coupon-price"></b>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="button"
                                                    onclick="preparePayment(this,'paystack')">
                                                    {{ __('Pay Now') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- Paystack end --}}
                    @endif

                    @if (isset($admin_payments_details['is_flutterwave_enabled']) &&
                            $admin_payments_details['is_flutterwave_enabled'] == 'on')
                        {{-- Flutterwave --}}
                        <div id="flutterwave_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Flutterwave') }}</h5>

                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (isset($admin_payments_details['is_flutterwave_enabled']) &&
                                    $admin_payments_details['is_flutterwave_enabled'] == 'on')
                                <div class="tab-pane " id="flutterwave_payment">
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="{{ route('plan.pay.with.paypal') }}">
                                        @csrf
                                        {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}" name="plan_duration_id"> --}}
                                        <input type="hidden" name="storage_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">

                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="flutterwave_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="flutterwave_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="button"
                                                    onclick="preparePayment(this,'flutterwave')">
                                                    {{ __('Pay Now') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- Flutterwave END --}}
                    @endif

                    @if (isset($admin_payments_details['is_razorpay_enabled']) && $admin_payments_details['is_razorpay_enabled'] == 'on')
                        {{-- Razorpay --}}
                        <div id="razorpay_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Razorpay') }} </h5>

                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (isset($admin_payments_details['is_razorpay_enabled']) && $admin_payments_details['is_razorpay_enabled'] == 'on')
                                <div class="tab-pane " id="razorpay_payment">

                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="{{ route('plan.pay.with.paypal') }}">
                                        @csrf
                                        {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}" name="plan_duration_id"> --}}
                                        <input type="hidden" name="storage_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">

                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="razorpay_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="razorpay_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="button"
                                                    onclick="preparePayment(this,'razorpay')">
                                                    {{ __('Pay Now') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- Razorpay end --}}
                    @endif

                    @if (isset($admin_payments_details['is_mercado_enabled']) && $admin_payments_details['is_mercado_enabled'] == 'on')
                        {{-- Mercado Pago --}}
                        <div id="mercado_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Mercado Pago') }}</h5>

                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (isset($admin_payments_details['is_mercado_enabled']) && $admin_payments_details['is_mercado_enabled'] == 'on')
                                <div class="tab-pane " id="mercado_payment">

                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="{{ route('plan.pay.with.paypal') }}">
                                        @csrf
                                        {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}" name="plan_duration_id"> --}}
                                        <input type="hidden" name="storage_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">

                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="mercado_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="mercado_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="button"
                                                    onclick="preparePayment(this,'mercado')">
                                                    {{ __('Pay Now') }}
                                                </button>

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- Mercado Pago end --}}
                    @endif

                    @if (isset($admin_payments_details['is_paytm_enabled']) && $admin_payments_details['is_paytm_enabled'] == 'on')
                        {{-- Paytm --}}
                        <div id="paytm_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Paytm') }}</h5>

                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (isset($admin_payments_details['is_paytm_enabled']) && $admin_payments_details['is_paytm_enabled'] == 'on')
                                <div class="tab-pane " id="paytm_payment">
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="{{ route('paytm.prepare.plan') }}">
                                        @csrf
                                        {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}" name="plan_duration_id"> --}}
                                        <input type="hidden" name="storage_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">
                                        <input type="hidden" name="total_price" id="paytm_total_price"
                                            value="{{ $storage_plan->price }}" class="form-control">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="mobile_number">{{ __('Mobile Number') }}</label>
                                                        <input type="text" id="mobile_number" name="mobile_number"
                                                            class="form-control coupon"
                                                            placeholder="{{ __('Enter Mobile Number') }}">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-100">
                                                        <label for="paytm_coupon"
                                                            class="form-label">{{ __('Coupon') }}</label>
                                                        <input type="text" id="paytm_coupon" name="coupon"
                                                            class="form-control coupon"
                                                            placeholder="{{ __('Enter Coupon Code') }}">
                                                    </div>

                                                    <div class="form-group ms-3 mt-4">
                                                        <a href="#" class="text-muted apply-coupon"
                                                            data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                                class="fas fa-save"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="submit">
                                                    {{ __('Pay Now') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- Paytm end --}}
                    @endif

                    @if (isset($admin_payments_details['is_mollie_enabled']) && $admin_payments_details['is_mollie_enabled'] == 'on')
                        {{-- Mollie --}}
                        <div id="mollie_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Mollie') }}</h5>

                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (isset($admin_payments_details['is_mollie_enabled']) && $admin_payments_details['is_mollie_enabled'] == 'on')
                                <div class="tab-pane " id="mollie_payment">
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="{{ route('mollie.prepare.plan') }}">
                                        @csrf
                                        {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}" name="plan_duration_id"> --}}
                                        <input type="hidden" name="storage_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">
                                        <input type="hidden" name="total_price" id="mollie_total_price"
                                            value="{{ $storage_plan->price }}" class="form-control">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="mollie_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="mollie_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="submit">
                                                    {{ __('Pay Now') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            {{-- Mollie end --}}
                        </div>
                    @endif

                    @if (isset($admin_payments_details['is_skrill_enabled']) && $admin_payments_details['is_skrill_enabled'] == 'on')
                        {{-- Skrill --}}
                        <div id="skrill_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Skrill') }}</h5>

                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (isset($admin_payments_details['is_skrill_enabled']) && $admin_payments_details['is_skrill_enabled'] == 'on')
                                <div class="tab-pane " id="skrill_payment">

                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="{{ route('skrill.prepare.plan') }}">
                                        @csrf
                                        <input type="hidden" name="id"
                                            value="{{ date('Y-m-d') }}-{{ strtotime(date('Y-m-d H:i:s')) }}-payatm">
                                        <input type="hidden" name="order_id"
                                            value="{{ str_pad(!empty($order->id) ? $order->id + 1 : 0 + 1, 4, '100', STR_PAD_LEFT) }}">
                                        @php
                                            $skrill_data = [
                                                'transaction_id' => md5(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'),
                                                'user_id' => 'user_id',
                                                'amount' => 'amount',
                                                'currency' => 'currency',
                                            ];
                                            session()->put('skrill_data', $skrill_data);
                                            
                                        @endphp
                                        {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}" name="plan_duration_id"> --}}
                                        <input type="hidden" name="storage_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">
                                        <input type="hidden" name="total_price" id="skrill_total_price"
                                            value="{{ $storage_plan->price }}" class="form-control">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="skrill_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="skrill_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="submit">
                                                    {{ __('Pay Now') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- Skrill end --}}
                    @endif

                    @if (isset($admin_payments_details['is_coingate_enabled']) && $admin_payments_details['is_coingate_enabled'] == 'on')
                        {{-- Coingate --}}
                        <div id="coingate_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Coingate') }}</h5>

                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (isset($admin_payments_details['is_coingate_enabled']) && $admin_payments_details['is_coingate_enabled'] == 'on')
                                <div class="tab-pane " id="coingate_payment">
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                        id="payment-form" action="{{ route('coingate.prepare.plan') }}">
                                        @csrf
                                        {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}" name="plan_duration_id"> --}}
                                        <input type="hidden" name="counpon" id="coingate_coupon" value="">
                                        <input type="hidden" name="storage_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">
                                        <input type="hidden" name="total_price" id="coingate_total_price"
                                            value="{{ $storage_plan->price }}" class="form-control">
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="coingate_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="coingate_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                <button class="btn btn-xs btn-primary" type="submit">
                                                    {{ __('Pay Now') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- Coingate end --}}
                    @endif

                    @if (isset($admin_payments_details['is_paymentwall_enabled']) &&
                            $admin_payments_details['is_paymentwall_enabled'] == 'on')
                        {{-- Paymentwall --}}
                        <div id="paymentwall_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Paymentwall') }}</h5>

                            </div>
                            {{-- <div class="card-body"> --}}
                            @if (isset($admin_payments_details['is_paymentwall_enabled']) &&
                                    $admin_payments_details['is_paymentwall_enabled'] == 'on')
                                <div class="tab-pane " id="paymentwall_payment">

                                    <form role="form" action="{{ route('paymentwall') }}" method="post"
                                        id="paymentwall-payment-form" class="w3-container w3-display-middle w3-card-4">
                                        @csrf
                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <label for="paymentwall_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="paymentwall_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>

                                                <div class="form-group ms-3 mt-4">
                                                    <a href="#" class="text-muted apply-coupon"
                                                        data-toggle="tooltip" data-title="{{ __('Apply') }}"><i
                                                            class="fas fa-save"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 my-2 px-2">
                                            <div class="text-end">
                                                {{-- <input type="hidden" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($defaultDuration) }}" name="plan_duration_id"> --}}
                                                <input type="hidden" name="storage_id"
                                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($storage_plan->id) }}">
                                                <button class="btn btn-xs btn-primary" type="submit"
                                                    id="pay_with_paymentwall">
                                                    {{ __('Pay Now') }}
                                                </button>

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            @endif
                            {{-- </div> --}}
                        </div>
                        {{-- Paymentwall end --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
