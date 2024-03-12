@extends('storefront.layout.themePlus1')
@section('page-title')
    {{ __('Main Information') }}
@endsection
@push('css-page')
@endpush
@section('content')
    @php
        $profile = asset(Storage::url('uploads/profile/'));
    @endphp

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="font-weight-bold text-dark">{{ __('Profile') }}</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Profile') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container pt-3 pb-2">

    {{ Form::model($userDetail, ['route' => ['customer.profile.update', $slug, $userDetail], 'id' => 'contact-form', 'method' => 'put', 'enctype' => 'multipart/form-data']) }}

    <div class="row pt-2">
        <div class="col-lg-3 mt-4 mt-lg-0">

            <div class="d-flex justify-content-center mb-4">
                <div class="profile-image-outer-container">
                    <div class="profile-image-inner-container bg-color-primary">
                        <img src="img/avatars/avatar.jpg">
                        <span class="profile-image-button bg-color-dark">
                            <i class="fas fa-camera text-light"></i>
                        </span>
                    </div>
                    <input type="file" id="file" name="profile" class="form-control profile-image-input" accept=".gif, .jpg, .png">
                </div>
            </div>

            {{-- <aside class="sidebar mt-2" id="sidebar">
                <ul class="nav nav-list flex-column mb-5">
                    <li class="nav-item"><a class="nav-link text-3 text-dark active" href="#">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link text-3" href="#">User Preferences</a></li>
                    <li class="nav-item"><a class="nav-link text-3" href="#">Billing</a></li>
                    <li class="nav-item"><a class="nav-link text-3" href="#">Invoices</a></li>
                </ul>
            </aside> --}}

        </div>
        <div class="col-lg-9">

                <h3 class="mb-20">{{ __('Main Information') }}</h3>
                <div class="form-group row">
                    {{Form::label('name',__('First Name'),array('class'=>'col-lg-4 col-form-label form-control-label line-height-9 pt-2 text-2')) }}
                    <div class="col-lg-8">
                        {{-- {{ Form::text('name', null, ['class' => 'form-control text-3 h-auto py-2','id' => 'floating-full-name','placeholder' => __('First Name')]) }} --}}
                        {{ Form::text('name', null, ['class' => 'form-control text-3 h-auto py-2']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('email',__('Enter User Email'),array('class'=>'col-lg-4 col-form-label form-control-label line-height-9 pt-2 text-2')) }}
                    <div class="col-lg-8">
                        {{ Form::text('email', null, ['class' => 'form-control text-3 h-auto py-2']) }}
                    </div>
                </div>


                <h3 class="mb-20 mt-5">{{ __('Password Informations') }}</h3>


                <div class="form-group row">
                    {{Form::label('current_password',__('Enter Current Password'),array('class'=>'col-lg-4 col-form-label form-control-label line-height-9 pt-2 text-2')) }}
                    <div class="col-lg-8">
                        {{ Form::password('current_password', ['class' => 'form-control text-3 h-auto py-2']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('new_password',__('Enter New Password'),array('class'=>'col-lg-4 col-form-label form-control-label line-height-9 pt-2 text-2')) }}
                    <div class="col-lg-8">
                        {{ Form::password('new_password', ['class' => 'form-control text-3 h-auto py-2']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('confirm_password',__('Enter Re-type New Password'),array('class'=>'col-lg-4 col-form-label form-control-label line-height-9 pt-2 text-2')) }}
                    <div class="col-lg-8">
                        {{ Form::password('confirm_password', ['class' => 'form-control text-3 h-auto py-2']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-lg-9">

                    </div>
                    <div class="form-group col-lg-3">
                        <input type="submit" value="{{ __('Save Changes') }}" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
                    </div>
                </div>
                
                
              

        </div>
    </div>
    {{ Form::close() }}

</div>
   
@endsection
@push('script-page')
    <script>
        if ('{!! !empty($is_cart) && $is_cart == true !!}') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
