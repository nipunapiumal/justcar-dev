@extends('storefront.layout.theme6')
@section('page-title')
    {{ __('Main Information') }}
@endsection
@push('css-page')
    {{-- <style>
        .wrap-custom-file label {
            background-image: url('{{ asset('assets/img/upload.svg') }}') !;

        }
    </style> --}}
@endpush
@section('content')
    @php
    $profile = asset(Storage::url('uploads/profile/'));
    //$default_avatar = asset(Storage::url('uploads/default_avatar/avatar.png'));
    @endphp


    <section class="our-dashbord dashbord bgc-f9">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    {{ Form::model($userDetail, ['route' => ['customer.profile.update', $slug, $userDetail], 'method' => 'put', 'enctype' => 'multipart/form-data']) }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="new_property_form mb30">
                                <h4 class="title mb30">{{ __('Main Information') }}</h4>
                                <div class="dp_user_thumb_content">
                                    <div class="wrap-custom-file mb25">
                                        <input type="file" name="profile" id="image1" accept=".gif, .jpg, .png">
                                        <label for="image1">
                                            <span>&nbsp;&nbsp;{{ __('Choose file here') }}</span>
                                        </label>
                                        {{-- <small class="file_title">Max file size is 1MB, Minimum dimension: 330x300 And
                                            Suitable files are
                                            .jpg & .png</small> --}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="mb20">
                                                    <label for="name">{{ __('NAME') }}</label>
                                                    {{ Form::text('name', null, ['class' => 'form-control form_control']) }}
                                                    @error('name')
                                                        <span class="invalid-name" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb20">
                                                    <label for="name">{{ __('Email') }}</label>
                                                    {{ Form::text('email', null, ['class' => 'form-control form_control', 'placeholder' => __('Enter User Email')]) }}
                                                    @error('email')
                                                        <span class="invalid-email" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="new_property_form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="title mb30"> {{ __('Password Informations') }}</h4>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb20">
                                            <label for="current_password">{{ __('Current Password') }}</label>
                                            {{ Form::password('current_password', ['class' => 'form-control form_control', 'placeholder' => __('Enter Current Password')]) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb20">
                                            <label for="new_password">{{ __('New Password') }}</label>
                                            {{ Form::password('new_password', ['class' => 'form-control form_control', 'placeholder' => __('Enter New Password')]) }}
                                            @error('new_password')
                                                <span class="invalid-new_password" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb20">
                                            <label for="confirm_password">{{ __('Re-type New Password') }}</label>
                                            {{ Form::password('confirm_password', ['class' => 'form-control form_control mb20', 'placeholder' => __('Enter Re-type New Password')]) }}
                                            @error('confirm_password')
                                                <span class="invalid-confirm_password" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">

                                        {{ Form::button(__('Save Changes'), ['type' => 'submit', 'class' => 'btn btn-thm ad_flor_btn']) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script-page')
    <script>
        if ('{!! !empty($is_cart) && $is_cart == true !!}') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
