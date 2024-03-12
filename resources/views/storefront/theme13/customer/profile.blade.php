@extends('storefront.layout.theme13to15')
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


<!-- Breadcrumb Area Start-->
<div class="breadcrumb-area bg-9">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="breadcrumb-text text-left">
                    <h2>{{ __('Profile') }}</h2>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                            <li>{{ __('Profile') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Contact Form Area Start -->
 <div class="contact-form-area pt-100 pb-150">
    <div class="container">
      
        <div class="contact-form-wrapper fix">
            {{ Form::model($userDetail, ['route' => ['customer.profile.update', $slug, $userDetail],'id' => 'contact-form', 'method' => 'put', 'enctype' => 'multipart/form-data']) }}
                <div class="row">
                    <div class="col-lg-7 col-md-8">
                        <div class="section-title-two pb-55">
                            <h3>{{ __('Main Information') }}</h3>
                        </div>
                    </div>
                    <div class="col-md-7">
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
                    <div class="col-sm-7 mt-5">
                        {{-- <div class="mb20">
                            <label for="name">{{ __('NAME') }}</label> --}}
                            {{ Form::text('name', null, ['class' => '']) }}
                            @error('name')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                        {{-- </div> --}}
                    </div>
                    <div class="col-sm-7">
                        {{-- <div class="mb20">
                            <label for="name">{{ __('Email') }}</label> --}}
                            {{ Form::text('email', null, ['class' => '', 'placeholder' => __('Enter User Email')]) }}
                            @error('email')
                                <span class="invalid-email" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror

                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-lg-7 col-md-8 mt-5">
                    <div class="section-title-two pb-55">
                        <h3>{{ __('Password Informations') }}</h3>
                    </div>
                </div>
                <div class="col-sm-7">
                        {{ Form::password('current_password', ['class' => '', 'placeholder' => __('Enter Current Password')]) }}
                </div>
                <div class="col-sm-7">
                    
                        {{ Form::password('new_password', ['class' => '', 'placeholder' => __('Enter New Password')]) }}
                        @error('new_password')
                            <span class="invalid-new_password" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="col-sm-7">
                    
                        {{ Form::password('confirm_password', ['class' => '', 'placeholder' => __('Enter Re-type New Password')]) }}
                        @error('confirm_password')
                            <span class="invalid-confirm_password" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <button type="submit" class="submit-btn default-btn gradient">
                    <span>{{__('Save Changes')}}</span>
                </button>
                <p class="form-messege"></p>
            </form>
        </div>
    </div>
</div>
<!-- Contact Form Area End -->

@endsection
@push('script-page')
    <script>
        if ('{!! !empty($is_cart) && $is_cart == true !!}') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
