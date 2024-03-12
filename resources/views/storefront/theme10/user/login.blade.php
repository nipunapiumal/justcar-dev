@extends('storefront.layout.theme6')
@section('page-title')
    {{__('Login')}}
@endsection
@push('css-page')

@endpush
@section('content')
   
   
<!-- Our SigIn -->
<section class="our-log bgc-f9">
    <div class="container">
        <div class="row justify-content-center">
    <div class="col-md-6 col-lg-6 col-xl-5 ">
      <div class="login_form mt60-sm">
        <h2 class="title">{{__('Customer')}} <span> {{__('login')}} </span></h2>


        <p>
        {{__('Dont have account ?')}}
        <a href="{{route('store.usercreate',$slug)}}" class="login-form-main-a text-primary">{{__('Register')}}</a>
        </p>
        {!! Form::open(array('route' => array('customer.login', $slug,(!empty($is_cart) && $is_cart==true)?$is_cart:false),'class'=>'login-form-main'),['method'=>'POST']) !!}
          <div class="mb-2 mr-sm-2">
                <label for="exampleInputEmail1" class="form-label float-left mt-2">{{__('username')}}</label>
                {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))}}
          </div>
          <div class="form-group mb5">
            <label for="exampleInputPassword1" class="form-label float-left">{{__('Password')}}</label>
            {{Form::password('password',array('class'=>'form-control','id'=>'exampleInputPassword1','placeholder'=>__('Enter Your Password')))}}
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="exampleCheck3" checked>
            <label class="custom-control-label" for="exampleCheck3">
                {{__('By using the system, you accept the')}} <a href="" class="text-primary"> {{__('Privacy Policy')}} </a> {{__('and')}} <a href="" class="text-primary"> {{__('System Regulations')}}. </a>
            </label>
          </div>
          <button type="submit" class="btn btn-log btn-thm mt5">{{__('Sign In')}}</button>
          {{Form::close()}}
      </div>
    </div>
        </div>
    </div>
</section>


        @endsection
@push('script-page')
    <script>
        if ('{!! !empty($is_cart) && $is_cart==true !!}') {
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
