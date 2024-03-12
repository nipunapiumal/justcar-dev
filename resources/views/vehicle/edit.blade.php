@extends('layouts.admin')
@section('page-title')
    {{ __('Vehicle') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 ">{{ __('Vehicle') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('vehicle.index') }}">{{ __('Vehicle') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit') }}</li>
@endsection
@section('action-btn')
<div class="pr-2">
    @if (Utility::getStorageUsage() >= \Auth::user()->total_storage)
        <a href="" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
            data-bs-placement="top" title="{{ __('Sell Vehicle') }}">
            <i class="ti ti-plus"></i>
        </a>
    @else
        <a href="{{ route('vehicle.create') }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="{{ __('Sell Vehicle') }}">
            {{-- <i class="ti ti-car"></i> --}}
            <i class="ti ti-plus"></i>
        </a>
    @endif



</div>
@endsection
@section('filter')
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('custom/libs/summernote/summernote-bs4.css') }}">
@endpush
@push('script-page')
    <script src="{{ asset('custom/libs/summernote/summernote-bs4.js') }}"></script>
    <script>
        var Dropzones = function() {
            var e = $('[data-toggle="dropzone1"]'),
                t = $(".dz-preview");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            e.length && (Dropzone.autoDiscover = !1, e.each(function() {
                var e, a, n, o, i;
                e = $(this), a = void 0 !== e.data("dropzone-multiple"), n = e.find(t), o = void 0, i = {
                    url: "{{ route('products.update', $product->id) }}",
                    method: 'PUT',
                    headers: {
                        'x-csrf-token': CSRF_TOKEN,
                    },
                    thumbnailWidth: null,
                    thumbnailHeight: null,
                    previewsContainer: n.get(0),
                    previewTemplate: n.html(),
                    maxFiles: 10,
                    parallelUploads: 10,
                    autoProcessQueue: false,
                    uploadMultiple: true,
                    acceptedFiles: a ? null : "image/*",
                    success: function(file, response) {
                        if (response.flag == "success") {
                            show_toastr('success', response.msg, 'success');
                            window.location.href = "{{ route('product.index') }}";
                        } else {
                            show_toastr('Error', response.msg, 'error');
                        }
                    },
                    error: function(file, response) {
                        // Dropzones.removeFile(file);
                        if (response.error) {
                            show_toastr('Error', response.error, 'error');
                        } else {
                            show_toastr('Error', response, 'error');
                        }
                    },
                    init: function() {
                        var myDropzone = this;

                        this.on("addedfile", function(e) {
                            !a && o && this.removeFile(o), o = e
                        })
                    }
                }, n.html(""), e.dropzone(i)
            }))
        }()



        // $('#submit-all').on('click', function() {
        $(document).delegate("#frmTarget", "submit", function(e) {
            e.preventDefault();
            var fd = new FormData();
            var file = document.getElementById('is_cover_image').files[0];
            if (file) {
                fd.append('is_cover_image', file);
            }

            var files = $('[data-toggle="dropzone1"]').get(0).dropzone.getAcceptedFiles();
            $.each(files, function(key, file) {
                fd.append('multiple_files[' + key + ']', $('[data-toggle="dropzone1"]')[0].dropzone
                    .getAcceptedFiles()[key]); // attach dropzone image element
            });
            var other_data = $('#frmTarget').serializeArray();
            $.each(other_data, function(key, input) {
                fd.append(input.name, input.value);
            });

            $.ajax({
                url: "{{ route('vehicle.update', $product->id) }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data.flag == "success") {
                        show_toastr('success', data.msg, 'success');
                        window.location.href = "{{ route('vehicle.index') }}";
                    } else {
                        show_toastr('Error', data.msg, 'error');
                    }
                },
                error: function(data) {
                    console.log(data);
                    if (data.error) {
                        show_toastr('Error', data.error, 'error');
                    } else {
                        show_toastr('Error', data, 'error');
                    }
                },
            });
        });



        $(".deleteRecord").click(function() {

            var id = $(this).data("id");

            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: '{{ route('products.file.delete', '__product_id') }}'.replace('__product_id', id),
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {

                    if (data.success) {
                        show_toastr('success', data.success, 'success');
                        $('.product_Image[data-id="' + data.id + '"]').remove();
                    } else {
                        show_toastr('Error', data.error, 'error');
                        $('.product_Image[data-id="' + data.id + '"]').remove();
                    }
                }
            });
        });
    </script>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($product, ['method' => 'POST', 'id' => 'frmTarget', 'enctype' => 'multipart/form-data']) }}
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                {{ Form::label('vehicle_number', __('Vehicle Number'), ['class' => 'col-form-label']) }}
                                {!! Form::text('vehicle_number', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    {{ Form::label('fin_number', __('Fin Number'), ['class' => 'col-form-label']) }}
                                    {!! Form::text('fin_number', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-5 py-4">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="fin_number_display" class="form-check-input"
                                            id="fin_number_display" {{ $product->fin_number_display == 'on' ? 'checked' : '' }}>
                                        {{ Form::label('fin_number_display', __('Display Fin Number'), ['class' => 'form-check-label']) }}
                                    </div>
                                    @error('fin_number_display')
                                        <span class="invalid-fin_number_display" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('vehicle_type_id', __('Vehicle Type'), ['class' => 'col-form-label']) }}
                                {{-- <select name="vehicle_type_id" id="vehicle_type_id" class="form-control" data-toggle="select" data-url="{{route('product.get-vehicle-brands')}}" required>
                                    <option value="">{{__('Please Select')}}</option>
                                    @foreach ($vehicle_types as $vehicle_type)
                                    <option value="{{$vehicle_type->id}}">
                                        {{ $vehicle_type->name }}
                                    </option>
                                    @endforeach
                                </select> --}}
                               
                               
                               {!! Form::select('vehicle_type_id', $vehicle_types, $product->vehicle_type_id, [
                                    'class' => 'form-control',
                                    'data-toggle' => 'select',
                                    'data-url' => route('product.get-vehicle-brands'),
                                ]) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('brand_id', __('Vehicle Brand'), ['class' => 'col-form-label']) }}
                                {!! Form::select('brand_id', $vehicle_brands, $product->brand_id, [
                                    'class' => 'form-control',
                                    'data-toggle' => 'select',
                                    'readonly' => 'true',
                                    'data-url' => route('product.get-models'),
                                ]) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('model_id', __('Vehicle Model'), ['class' => 'col-form-label']) }}
                                {!! Form::select('model_id', $vehicle_models, $product->model_id, [
                                    'class' => 'form-control',
                                    'data-toggle' => 'select',
                                ]) !!}
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('register_year', __('First Register Year'), ['class' => 'col-form-label']) }}
                                        {!! Form::select('register_year', \App\Models\Utility::getRegistrationYears(), $product->register_year, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('register_month', __('First Register Month'), ['class' => 'col-form-label']) }}
                                        {!! Form::select('register_month', \App\Models\Utility::getRegistrationMonths(), $product->register_month, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]) !!}
                                    </div>

                                </div>
                            </div><!-- /row-->

                            <div class="form-group">
                                {{ Form::label('millage', __('Millage (km)'), ['class' => 'col-form-label']) }}
                                {!! Form::text('millage', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('fuel_type_id', __('Fuel Type'), ['class' => 'col-form-label']) }}
                                {!! Form::select('fuel_type_id', $fuel_types, $product->fuel_type_id, [
                                    'class' => 'form-control',
                                    'data-toggle' => 'select',
                                ]) !!}
                            </div>
                            {{-- <div class="form-group">
                                {{ Form::label('power', __('Power'), ['class' => 'col-form-label']) }}
                                {!! Form::select('power', $powers, $product->power, ['class' => 'form-control', 'data-toggle' => 'select']) !!}
                            </div> --}}

                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        {{ Form::label('prev_owners', __('Previous Owners'), ['class' => 'form-label']) }}
                                        {!! Form::number('prev_owners', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        {{ Form::label('transmission_id', __('Transmission'), ['class' => 'col-form-label']) }}
                                        {!! Form::select('transmission_id', \App\Models\Utility::getVehicleTransmission(), $product->transmission_id, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]) !!}
                                    </div>
                                </div>
                            </div><!-- /row-->

                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        {{ Form::label('power', __('Power'), ['class' => 'col-form-label']) }}
                                        {!! Form::number('power', $product->power, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        {{ Form::label('power_type', __('Type'), ['class' => 'col-form-label']) }}
                                        {!! Form::select('power_type', \App\Models\Utility::getVehiclePowerTypes(), $product->power_type, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]) !!}
                                    </div>
                                </div>
                            </div><!-- /row-->


                            <div class="col-md-12">
                                <h6>{{ __('Equipments') }}</h6>
                                <hr>
                            </div>

                            <div class="row">

                                @foreach ($vehicleEquipments as $vehicleEquipment)
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="equipments[]"
                                                    value="{{ $vehicleEquipment->name }}" class="form-check-input"
                                                    id="equipment{{ $vehicleEquipment->id }}"
                                                    {{ in_array($vehicleEquipment->name, json_decode($product->equipments)) ? 'checked' : '' }}>
                                                {{ Form::label('equipment' . $vehicleEquipment->id . '', $vehicleEquipment->name, ['class' => 'form-check-label']) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- /row-->




                        </div>

                        <div class="col-12 col-md-6">
                            <div class="col-md-12">
                                <h6>{{ __('Exterior Color') }}</h6>
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    @foreach ($exteriorColors as $exteriorColor)
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label class="colorinput">
                                                <input name="exterior_color" type="radio"
                                                    value="{{ $exteriorColor->name }}"
                                                    data-theme="{{ $exteriorColor->name }}" class="colorinput-input"
                                                    {{ $product->exterior_color == $exteriorColor->name ? 'checked' : '' }}>
                                                <span class="colorinput-color"
                                                    style="background:{{ $exteriorColor->name }}"></span>
                                                <span class="color-name">{{ $exteriorColor->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>


                            </div>


                            {{-- <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#f5f5dc" data-theme="#f5f5dc"
                                                class="colorinput-input"
                                                >
                                            <span class="colorinput-color" style="background:#f5f5dc"></span>
                                            <span>Beige</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#FFD700"
                                                data-theme="#FFD700" class="colorinput-input"
                                                {{ $product->exterior_color == '#FFD700' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#FFD700"></span>
                                            <span>Gold</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#6a0dad"
                                                data-theme="#6a0dad" class="colorinput-input"
                                                {{ $product->exterior_color == '#6a0dad' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#6a0dad"></span>
                                            <span>Purple</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#FFFF00"
                                                data-theme="#FFFF00" class="colorinput-input"
                                                {{ $product->exterior_color == '#FFFF00' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#FFFF00"></span>
                                            <span>Yellow</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#000000"
                                                data-theme="#000000" class="colorinput-input"
                                                {{ $product->exterior_color == '#000000' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#000000"></span>
                                            <span>Black</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#00FF00"
                                                data-theme="#00FF00" class="colorinput-input"
                                                {{ $product->exterior_color == '#00FF00' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#00FF00"></span>
                                            <span>Green</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#ff0000"
                                                data-theme="#ff0000" class="colorinput-input"
                                                {{ $product->exterior_color == '#ff0000' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#ff0000"></span>
                                            <span>Red</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#0000FF"
                                                data-theme="#0000FF" class="colorinput-input"
                                                {{ $product->exterior_color == '#0000FF' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#0000FF"></span>
                                            <span>Blue</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#808080"
                                                data-theme="#808080" class="colorinput-input"
                                                {{ $product->exterior_color == '#808080' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#808080"></span>
                                            <span>Grey</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#C0C0C0"
                                                data-theme="#C0C0C0" class="colorinput-input"
                                                {{ $product->exterior_color == '#C0C0C0' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#C0C0C0"></span>
                                            <span>Silver</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#964B00"
                                                data-theme="#964B00" class="colorinput-input"
                                                {{ $product->exterior_color == '#964B00' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#964B00"></span>
                                            <span>Brown</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#FFA500"
                                                data-theme="#FFA500" class="colorinput-input"
                                                {{ $product->exterior_color == '#FFA500' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#FFA500"></span>
                                            <span>Orange</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="exterior_color" type="radio" value="#ffffff"
                                                data-theme="#ffffff" class="colorinput-input"
                                                {{ $product->exterior_color == '#ffffff' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#ffffff"></span>
                                            <span>White</span>
                                        </label>
                                    </div>
                                </div>


                            </div> --}}
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="is_metallic" class="form-check-input" id="is_metallic"
                                        {{ $product->is_metallic == 1 ? 'checked' : '' }} value="1">
                                    {{ Form::label('is_metallic', __('Metallic'), ['class' => 'form-check-label']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6>{{ __('Interior Design') }}</h6>
                                <hr>
                            </div>
                            <div class="row">
                                @foreach ($interiorDesigns as $interiorDesign)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="interior_design[]"
                                                    value="{{ $interiorDesign->name }}" class="form-check-input"
                                                    id="interior_design{{ $interiorDesign->id }}"
                                                    {{ in_array($interiorDesign->name, json_decode($product->interior_design)) ? 'checked' : '' }}>
                                                {{ Form::label('interior_design' . $interiorDesign->id . '', $interiorDesign->name, ['class' => 'form-check-label']) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Cloth" class="form-check-input" id="interior_design2">
                                                        {{ Form::label('interior_design2', __('Cloth'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Full Leather" class="form-check-input" id="interior_design3">
                                                        {{ Form::label('interior_design3', __('Full Leather'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Other" class="form-check-input" id="interior_design4">
                                                        {{ Form::label('interior_design4', __('Other'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Part Leather" class="form-check-input" id="interior_design5">
                                                        {{ Form::label('interior_design5', __('Part Leather'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Velour" class="form-check-input" id="interior_design6">
                                                        {{ Form::label('interior_design6', __('Velour'), ['class' => 'form-check-label']) }}
                                                    </div>
                                                </div>
                                            </div> -->
                            </div><!-- /row-->
                            <h6>{{ __('Interior Color') }}</h6>
                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    @foreach ($interiorColors as $interiorColor)
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label class="colorinput">
                                                <input name="interior_color" type="radio"
                                                    value="{{ $interiorColor->name }}"
                                                    data-theme="{{ $interiorColor->name }}" class="colorinput-input"
                                                    {{ $product->interior_color == $interiorColor->name ? 'checked' : '' }}>
                                                <span class="colorinput-color"
                                                    style="background:{{ $interiorColor->name }}"></span>
                                                <span class="color-name">{{ $interiorColor->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach


                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="interior_design[]" value="Alcantara"
                                                class="form-check-input" id="interior_design1"
                                                {{ in_array('Alcantara', json_decode($product->interior_design)) ? 'checked' : '' }}>
                                            {{ Form::label('interior_design1', __('Alcantara'), ['class' => 'form-check-label']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="interior_design[]" value="Cloth"
                                                class="form-check-input" id="interior_design2"
                                                {{ in_array('Cloth', json_decode($product->interior_design)) ? 'checked' : '' }}>
                                            {{ Form::label('interior_design2', __('Cloth'), ['class' => 'form-check-label']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="interior_design[]" value="Full Leather"
                                                class="form-check-input" id="interior_design3"
                                                {{ in_array('Full Leather', json_decode($product->interior_design)) ? 'checked' : '' }}>
                                            {{ Form::label('interior_design3', __('Full Leather'), ['class' => 'form-check-label']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="interior_design[]" value="Other"
                                                class="form-check-input" id="interior_design4"
                                                {{ in_array('Other', json_decode($product->interior_design)) ? 'checked' : '' }}>
                                            {{ Form::label('interior_design4', __('Other'), ['class' => 'form-check-label']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="interior_design[]" value="Part Leather"
                                                class="form-check-input" id="interior_design5"
                                                {{ in_array('Part Leather', json_decode($product->interior_design)) ? 'checked' : '' }}>
                                            {{ Form::label('interior_design5', __('Part Leather'), ['class' => 'form-check-label']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="interior_design[]" value="Velour"
                                                class="form-check-input" id="interior_design6"
                                                {{ in_array('Velour', json_decode($product->interior_design)) ? 'checked' : '' }}>
                                            {{ Form::label('interior_design6', __('Velour'), ['class' => 'form-check-label']) }}
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- /row-->
                            {{-- <div class="col-md-12">
                                <h6>{{ __('Interior Color') }}</h6>
                                <hr>
                            </div> --}}
                            {{-- <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="interior_color" type="radio" value="#f5f5dc"
                                                data-theme="#f5f5dc" class="colorinput-input"
                                                {{ $product->interior_color == '#f5f5dc' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#f5f5dc"></span>
                                            <span>Beige</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="interior_color" type="radio" value="#964B00"
                                                data-theme="#964B00" class="colorinput-input"
                                                {{ $product->interior_color == '#964B00' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#964B00"></span>
                                            <span>Brown</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="interior_color" type="radio" value="#000000"
                                                data-theme="#000000" class="colorinput-input"
                                                {{ $product->interior_color == '#000000' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#000000"></span>
                                            <span>Black</span>
                                        </label>
                                    </div>
                                    <div class="col-3">
                                        <label class="colorinput">
                                            <input name="interior_color" type="radio" value="#808080"
                                                data-theme="#808080" class="colorinput-input"
                                                {{ $product->interior_color == '#808080' ? 'checked' : '' }}>
                                            <span class="colorinput-color" style="background:#808080"></span>
                                            <span>Grey</span>
                                        </label>
                                    </div>

                                </div>
                            </div> --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="is_cover_image"
                                        class="col-form-label">{{ __('Upload Cover Image') }}</label>
                                    <input type="file" name="is_cover_image" id="is_cover_image"
                                        class="form-control">
                                </div>

                                <div class="card-wrapper p-3 lead-common-box">
                                    <div class="card mb-3 border shadow-none">
                                        <div class="px-3 py-3">
                                            <div class="row align-items-center">
                                                <div class="col ml-n2">
                                                    <p class="card-text small text-muted">
                                                        <img class="rounded"
                                                            src=" {{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                            width="70px" alt="Image placeholder" data-dz-thumbnail>
                                                    </p>
                                                </div>
                                                <div class="col-auto actions">
                                                    <a class="action-item"
                                                        href=" {{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                        download="" data-toggle="tooltip"
                                                        data-original-title="{{ __('Download') }}">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 border-0">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="mb-0">{{ __('Product Image') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            {{ Form::label('sub_images', __('Upload Product Images'), ['class' => 'col-form-label']) }}
                                            <div class="dropzone dropzone-multiple" data-toggle="dropzone1"
                                                data-dropzone-url="http://" data-dropzone-multiple>
                                                <div class="fallback">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="dropzone-1"
                                                            name="file" multiple>
                                                        <label class="custom-file-label"
                                                            for="customFileUpload">{{ __('Choose file') }}</label>
                                                    </div>
                                                </div>
                                                <ul
                                                    class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                                    <li class="list-group-item px-0">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <div class="avatar">
                                                                    <img class="rounded" src=""
                                                                        alt="Image placeholder" data-dz-thumbnail>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="text-sm mb-1" data-dz-name>...</h6>
                                                                <p class="small text-muted mb-0" data-dz-size></p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a href="#" class="dropdown-item" data-dz-remove>
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-wrapper p-3 lead-common-box">
                                                @foreach ($product_image as $file)
                                                    <div class="card mb-3 border shadow-none product_Image"
                                                        data-id="{{ $file->id }}">
                                                        <div class="px-3 py-3">
                                                            <div class="row align-items-center">
                                                                <div class="col ml-n2">
                                                                    <p class="card-text small text-muted">
                                                                        <img class="rounded"
                                                                            src=" {{ asset(Storage::url('uploads/product_image/' . $file->product_images)) }}"
                                                                            width="70px" alt="Image placeholder"
                                                                            data-dz-thumbnail>
                                                                    </p>
                                                                </div>
                                                                <div class="col-auto actions">
                                                                    <a class="action-item"
                                                                        href=" {{ asset(Storage::url('uploads/product_image/' . $file->product_images)) }}"
                                                                        download="" data-toggle="tooltip"
                                                                        data-original-title="{{ __('Download') }}">
                                                                        <i class="fas fa-download"></i>
                                                                    </a>
                                                                </div>

                                                                <div class="col-auto actions">
                                                                    <a name="deleteRecord"
                                                                        class="action-item deleteRecord"
                                                                        data-id="{{ $file->id }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('product_categorie', __('Product Categories'), ['class' => 'col-form-label']) }}
                                {!! Form::select('product_categorie[]', $product_categorie, null, [
                                    'class' => 'form-control multi-select',
                                    'id' => 'choices-multiple',
                                    'multiple',
                                ]) !!}
                                @if (count($product_categorie) == 0)
                                    {{ __('Add product category') }}
                                    <a href="{{ route('product_categorie.index') }}">
                                        {{ __('Click here') }}
                                    </a>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('youtube_video', __('Youtube Video'), ['class' => 'col-form-label']) }}
                                {!! Form::text('youtube_video', null, ['class' => 'form-control']) !!}
                                <small>You can promote your vehicle even better with a video! Simply make a video of your
                                    vehicle, upload it to YouTube, set it to "unlisted" or "public" and add the link
                                    here.</small>

                            </div>

                            <div class="form-group col-md-6 py-4">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="product_display" class="form-check-input"
                                        id="product_display" {{ $product->product_display == 'on' ? 'checked' : '' }}>
                                    {{ Form::label('product_display', __('Product Display'), ['class' => 'form-check-label']) }}
                                </div>
                                @error('product_display')
                                    <span class="invalid-product_display" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp

                                @foreach ($store_languages as $lang)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                            id="{{ $lang }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#{{ $lang }}" type="button" role="tab"
                                            aria-controls="home"
                                            aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="myTabContent">

                                @foreach ($store_languages as $lang)
                                    @php
                                        $data = App\Models\ProductLangs::where('parent_id', $product->id)
                                            ->where('lang', $lang)
                                            ->first();
                                    @endphp
                                    <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                        id="{{ $lang }}" role="tabpanel"
                                        aria-labelledby="{{ $lang }}-tab">
                                        <div class="row">
                                            <div class="col-12 pt-4">
                                                <div class="form-group">
                                                    {{ Form::label($lang . '_name', __('Title'), ['class' => 'col-form-label']) }}
                                                    {!! Form::text($lang . '_name', (isset($data["name"])?$data["name"]:''), ['class' => 'form-control']) !!}

                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label($lang . '_description', __('Product Description'), ['class' => 'col-form-label']) }}
                                                    {{ Form::textarea($lang . '_description', (isset($data["description"])?$data["description"]:''), ['class' => 'form-control summernote-simple', 'rows' => 2, 'placeholder' => __('Product Description')]) }}
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            </div>


                            <div class="form-group">
                                {{ Form::label('net_price', __('Net Price'), ['class' => 'col-form-label']) }}
                                {{ Form::number('net_price', null, ['step' => 'any', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('price', __('Gross Price'), ['class' => 'col-form-label']) }}
                                {{ Form::number('price', null, ['step' => 'any', 'class' => 'form-control']) }}
                            </div>

                        </div>


                    </div>
                    <div class="form-group col-12 d-flex justify-content-end col-form-label">
                        <a href="{{ route('product.index') }}"
                            class="btn btn-secondary btn-light">{{ __('Cancel') }}</a>
                        <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
