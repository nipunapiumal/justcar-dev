@extends('storefront.layout.theme16to21')
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



    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ __('Profile') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Profile') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Contact 1 start -->
    <div class="contact-1 content-area-20">
        <div class="container">
            {{-- <!-- Main title -->
        <div class="main-title text-center">
            <h1>Contact Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div> --}}
            <div class="row g-0 contact-innner">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-form" style="border-right: none">
                        <h3 class="mb-20">{{ __('Main Information') }}</h3>
                        {{ Form::model($userDetail, ['route' => ['customer.profile.update', $slug, $userDetail], 'id' => 'contact-form', 'method' => 'put', 'enctype' => 'multipart/form-data']) }}
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="form-floating mb-20">

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

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    {{ Form::text('name', null, ['class' => 'form-control','id' => 'floating-full-name','placeholder' => __('First Name')]) }}
                                    {{ Form::label('floating-full-name', __('First Name')) }}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    {{ Form::text('email', null, ['class' => 'form-control','id' => 'floating-full-name','placeholder' => __('Enter User Email')]) }}
                                    {{ Form::label('floating-full-name', __('Enter User Email')) }}
                                </div>
                            </div>
                            <h3 class="mb-20 mt-5">{{ __('Password Informations') }}</h3>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="password" name="current_password" id="floating-full-name" class="form-control" placeholder="{{__('Enter Current Password')}}">
                                    {{-- {{ Form::password('current_password', null, ['class' => 'form-control','id' => 'floating-full-name','placeholder' => __('Enter Current Password')]) }} --}}
                                    {{ Form::label('floating-full-name', __('Enter Current Password')) }}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="password" name="new_password" id="floating-full-name" class="form-control" placeholder="{{__('Enter New Password')}}">
                                    {{-- {{ Form::text('', null, ['class' => 'form-control','id' => 'floating-full-name','placeholder' => __('Enter New Password')]) }} --}}
                                    {{ Form::label('floating-full-name', __('Enter New Password')) }}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-floating mb-20">
                                    <input type="password" name="confirm_password" id="floating-full-name" class="form-control" placeholder="{{__('Enter Re-type New Password')}}">
                                    {{-- {{ Form::password('confirm_password', null, ['class' => 'form-control','id' => 'floating-full-name','placeholder' => __('Enter Re-type New Password')]) }} --}}
                                    {{ Form::label('floating-full-name', __('Enter Re-type New Password')) }}
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-5">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact 1 end -->
@endsection
@push('script-page')
    <script>
        if ('{!! !empty($is_cart) && $is_cart == true !!}') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
