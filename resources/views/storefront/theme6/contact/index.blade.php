@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Contact Us') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <section class="inner_page_breadcrumb style2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title">{{ __('Contact Us') }}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('store.slug', $store->slug) }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Contact Us') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Contact -->
    <section class="our-faq bgc-f9 pt0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="form_grid">
                        <div class="wrapper">
                            {!! Form::open(
                                ['route' => ['store.store-contact', $store->slug], 'class' => 'contact_form'],
                                ['method' => 'POST'],
                            ) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('First Name') }}*</label>
                                        <input class="form-control" type="text" name="first_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Last Name') }}*</label>
                                        <input class="form-control" type="text" name="last_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Email') }}*</label>
                                        <input class="form-control email" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Phone No') }}</label>
                                        <input class="form-control" type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Subject') }}</label>
                                        <input class="form-control" type="text" name="subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Message') }}</label>
                                        <textarea name="message" class="form-control" rows="6" maxlength="1000"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-thm">{{ __('Get In Touch') }}</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script-page')
    <script>
        $("#pro_scroll").click(function() {
            $('html, body').animate({
                scrollTop: $("#pro_items").offset().top
            }, 1000);
        });
    </script>
@endpush
