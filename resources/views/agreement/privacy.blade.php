@extends('layouts.auth')
@section('page-title')
{{ __('Privacy Policy') }}
@endsection
@section('language-bar')
        <li class="nav-item">
            <select name="language" id="language" class="btn-primary custom_btn ms-2 me-2 language_option_bg" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                @foreach(App\Models\Utility::languages() as $language)
                    <option @if($lang == $language) selected @endif value="{{ route('privacy',$language) }}">{{Str::upper($language)}}</option>
                @endforeach
            </select>
        </li>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card-body">
            <div class="">
                <h2 class="mb-3 f-w-600">{{ __('Privacy Policy') }}</h2>
            </div>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </div>
  
</div>
@endsection
@push('custom-scripts')
<script src="{{asset('custom/libs/jquery/dist/jquery.min.js')}}"></script>
<script>
$(document).ready(function () {
  $(".form_data").submit(function (e) {
      $(".login_button").attr("disabled", true);
      return true;
  });
});
</script>
@if(env('RECAPTCHA_MODULE') == 'yes')
        {!! NoCaptcha::renderJs() !!}
@endif
@endpush
