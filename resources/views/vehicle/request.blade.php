@extends('layouts.admin')
@section('page-title')
    {{ __('Request a New Brand') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Request a New Brand') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">{{ __('Vehicle') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Request a New Brand') }}</li>
@endsection
@section('action-btn')
@endsection
@section('filter')
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script-page')
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
    <script>
        $(document).delegate("#frmTarget", "submit", function(e) {
            e.preventDefault();
            var fd = new FormData();

            var other_data = $('#frmTarget').serializeArray();
            $.each(other_data, function(key, input) {
                fd.append(input.name, input.value);
            });

            $.ajax({
                url: "{{ route('vehicleRequest') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fd,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data) {
                    console.log(data);
                    if (data.flag == "success") {
                        show_toastr('success', data.msg, 'success');
                        window.location.href = "{{ route('product.index') }}";
                    } else {
                        show_toastr('Error', data.msg, 'error');
                    }
                },
                error: function(data) {
                    console.log(data);
                    // Dropzones.removeFile(file);
                    if (data.error) {
                        show_toastr('Error', data.error, 'error');
                    } else {
                        show_toastr('Error', data, 'error');
                    }
                },
            });
        });



        $('#cost').trigger('keyup');
    </script>
@endpush
@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('vehicleRequest') }}" id="frmTarget" method="POST">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="vehicle_brand" class="form-label">{{ __('Vehicle Brand') }}</label>
                                    <input type="text" name="vehicle_brand" class="form-control" id="vehicle_brand">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="vehicle_model" class="form-label">{{ __('Vehicle Model') }}</label>
                                    <input type="text" name="vehicle_model" class="form-control" id="vehicle_model">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="equipments" class="form-label">{{ __('Equipments') }}</label>
                                    <textarea name="equipments" id="equipments" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="interior_design" class="form-label">{{ __('Interior Design') }}</label>
                                    <textarea name="interior_design" id="interior_design" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="exterior_color" class="form-label">{{ __('Exterior Color') }}</label>
                                    <input type="text" name="exterior_color" class="form-control" id="exterior_color">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="interior_color" class="form-label">{{ __('Interior Color') }}</label>
                                    <input type="text" name="interior_color" class="form-control" id="interior_color">
                                </div>
                            </div>


                        </div>
                        <div class="form-group col-12 d-flex justify-content-end col-form-label">
                            <a href="{{ route('product.index') }}"
                                class="btn btn-secondary btn-light">{{ __('Cancel') }}</a>
                            <input type="submit" id="submit-all" value="{{ __('Save') }}" class="btn btn-primary ms-2">
                        </div>

                        {{-- <div class="w-100 text-right">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill mr-auto"
                                id="submit-all">{{ __('Save') }}</button>
            </div> --}}
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection
