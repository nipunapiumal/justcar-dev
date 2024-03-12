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
    <li class="breadcrumb-item active" aria-current="page">{{ __('Sell Vehicle') }}</li>
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
        var Dropzones = function() {
            var e = $('[data-toggle="dropzone1"]'),
                t = $(".dz-preview");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            e.length && (Dropzone.autoDiscover = !1, e.each(function() {
                var e, a, n, o, i;
                e = $(this), a = void 0 !== e.data("dropzone-multiple"), n = e.find(t), o = void 0, i = {
                    url: "{{ route('product.store') }}",
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
                            window.location.href = "{{ route('vehicle.index') }}";
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
                url: "{{ route('vehicle.store') }}",
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
                        window.location.href = "{{ route('vehicle.index') }}";
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
                    {{ Form::open(['method' => 'POST', 'id' => 'frmTarget', 'enctype' => 'multipart/form-data']) }}
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="vehicle_number" class="form-label">{{ __('Vehicle Number') }}</label>
                                <input type="text" name="vehicle_number" class="form-control" id="vehicle_number">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <label for="fin_number" class="form-label">{{ __('Fin Number') }}</label>
                                    <input type="text" name="fin_number" class="form-control" id="fin_number">
                                </div>
                                <div class="form-group col-md-5 py-4">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="fin_number_display" class="form-check-input"
                                            id="fin_number_display">
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
                                <div class="form-group">
                                    {{ Form::label('vehicle_type_id', __('Vehicle Type'), ['class' => 'col-form-label']) }}

                                    <select name="vehicle_type_id" id="vehicle_type_id" class="form-control" data-toggle="select" data-url="{{route('product.get-vehicle-brands')}}" required>
                                        <option value="">{{__('Please Select')}}</option>
                                        @foreach ($vehicleTypes as $vehicleType)
                                        <option value="{{$vehicleType->id}}">
                                            {{ $vehicleType->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    {{-- {{ Form::select('vehicle_type_id', $vehicleTypes, null, [
                                        'class' => 'form-control', 
                                        'data-toggle' => 'select', 
                                        'required' => 'required',
                                        'data-url' => route('product.get-vehicle-brands'),
                                        ]) }} --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="brand_id" class="form-label">{{ __('Vehicle Brand') }}</label>
                                <select name="brand_id" class="form-control" data-toggle="select" id="brand_id" data-url="{{route('product.get-models')}}">
                                    <option value="">{{__('Please Select')}}</option>
                                </select>
                                <small>
                                    {{ __('If you cannot find your brand here, you can click below link to request new vehicle brand. We will notify you once we approved your requested brand!') }}
                                    <a href="{{ route('vehicleRequest') }}">{{ __('Request a New Brand') }}!</a>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="model_id" class="form-label">{{ __('Vehicle Model') }}</label>
                                <select name="model_id" class="form-control" data-toggle="select" id="model_id">
                                    <option value="">{{__('Please Select')}}</option>
                                </select>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        {{ Form::label('register_year', __('First Register Year'), ['class' => 'form-label']) }}
                                        {!! Form::select('register_year', \App\Models\Utility::getRegistrationYears(), null, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        {{ Form::label('register_month', __('First Register Month'), ['class' => 'form-label']) }}
                                        {!! Form::select('register_month', \App\Models\Utility::getRegistrationMonths(), null, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]) !!}


                                    </div>
                                </div>
                            </div><!-- /row-->


                            <div class="form-group">
                                <label for="millage" class="form-label">{{ __('Millage (km)') }}</label>
                                <input type="text" name="millage" class="form-control" id="millage">
                            </div>
                            <div class="form-group">
                                <label for="fuel_type_id" class="form-label">{{ __('Fuel Type') }}</label>
                                <select name="fuel_type_id" class="form-control" data-toggle="select" id="fuel_type_id">
                                    <option value="">{{__('Please Select')}}</option>
                                    @foreach ($fuelTypes as $fuelType)
                                        <option value="{{ $fuelType->id }}">
                                            {{ $fuelType->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

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
                                        {{ Form::label('transmission_id', __('Transmission'), ['class' => 'form-label']) }}
                                        {!! Form::select('transmission_id', \App\Models\Utility::getVehicleTransmission(), null, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]) !!}
                                    </div>
                                </div>
                            </div><!-- /row-->

                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        {{ Form::label('power', __('Power'), ['class' => 'form-label']) }}
                                        {!! Form::number('power', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        {{ Form::label('power_type', __('Type'), ['class' => 'form-label']) }}
                                        {!! Form::select('power_type', \App\Models\Utility::getVehiclePowerTypes(), null, [
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
                                                    id="equipment{{ $vehicleEquipment->id }}">
                                                {{ Form::label('equipment' . $vehicleEquipment->id . '', $vehicleEquipment->name, ['class' => 'form-check-label']) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- /row-->




                        </div>
                        <div class="col-md-6 col-12">
                            <h6>{{ __('Exterior Color') }}</h6>
                            <hr>
                            <div class="form-group">
                                <div class="row">
                                    @foreach ($exteriorColors as $exteriorColor)
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label class="colorinput">
                                                <input name="exterior_color" type="radio"
                                                    value="{{ $exteriorColor->name }}"
                                                    data-theme="{{ $exteriorColor->name }}" class="colorinput-input">
                                                <span class="colorinput-color"
                                                    style="background:{{ $exteriorColor->name }}"></span>
                                                <span class="color-name">{{ $exteriorColor->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach



                                    <!-- <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#FFD700" data-theme="#FFD700" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#FFD700"></span>
                                                        <span class="color-name">Gold</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#6a0dad" data-theme="#6a0dad" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#6a0dad"></span>
                                                        <span class="color-name">Purple</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#FFFF00" data-theme="#FFFF00" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#FFFF00"></span>
                                                        <span class="color-name">Yellow</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#000000" data-theme="#000000" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#000000"></span>
                                                        <span class="color-name">Black</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#00FF00" data-theme="#00FF00" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#00FF00"></span>
                                                        <span class="color-name">Green</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#ff0000" data-theme="#ff0000" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#ff0000"></span>
                                                        <span class="color-name">Red</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#0000FF" data-theme="#0000FF" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#0000FF"></span>
                                                        <span class="color-name">Blue</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#808080" data-theme="#808080" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#808080"></span>
                                                        <span class="color-name">Grey</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#C0C0C0" data-theme="#C0C0C0" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#C0C0C0"></span>
                                                        <span class="color-name">Silver</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#964B00" data-theme="#964B00" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#964B00"></span>
                                                        <span class="color-name">Brown</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#FFA500" data-theme="#FFA500" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#FFA500"></span>
                                                        <span class="color-name">Orange</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="exterior_color" type="radio" value="#ffffff" data-theme=":#ffffff" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#ffffff"></span>
                                                        <span class="color-name">White</span>
                                                    </label>
                                                </div> -->
                                </div>


                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="is_metallic" class="form-check-input" id="is_metallic">
                                    {{ Form::label('is_metallic', __('Metallic'), ['class' => 'form-check-label']) }}
                                </div>
                            </div>
                            <h6>{{ __('Interior Design') }}</h6>
                            <hr>

                            <div class="row">
                                @foreach ($interiorDesigns as $interiorDesign)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="interior_design[]"
                                                    value="{{ $interiorDesign->name }}" class="form-check-input"
                                                    id="interior_design{{ $interiorDesign->id }}">
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
                                                    data-theme="{{ $interiorColor->name }}" class="colorinput-input">
                                                <span class="colorinput-color"
                                                    style="background:{{ $interiorColor->name }}"></span>
                                                <span class="color-name">{{ $interiorColor->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                    <!-- <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="interior_color" type="radio" value="#f5f5dc" data-theme="#f5f5dc" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#f5f5dc"></span>
                                                        <span class="color-name">Beige</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="interior_color" type="radio" value="#964B00" data-theme="#964B00" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#964B00"></span>
                                                        <span class="color-name">Brown</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="interior_color" type="radio" value="#000000" data-theme="#000000" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#000000"></span>
                                                        <span class="color-name">Black</span>
                                                    </label>
                                                </div>
                                                <div class="col-3">
                                                    <label class="colorinput">
                                                        <input name="interior_color" type="radio" value="#808080" data-theme="#808080" class="colorinput-input">
                                                        <span class="colorinput-color" style="background:#808080"></span>
                                                        <span class="color-name">Grey</span>
                                                    </label>
                                                </div> -->

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_cover_image" class="col-form-label">{{ __('Upload Cover Image') }}</label>
                                <input type="file" name="is_cover_image" id="is_cover_image"
                                    class="form-control custom-input-file">
                            </div>
                            <h5 class="mb-0">{{ __('Images') }}</h5>
                            <div class="card-body">
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
                                                            <img class="rounded" src="" alt="Image placeholder"
                                                                data-dz-thumbnail>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="text-sm mb-1" data-dz-name>...</h6>
                                                        <p class="small text-muted mb-0" data-dz-size>
                                                        </p>
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
                                <label class="col-form-label">{{ __('Youtube Video') }}</label>
                                <input type="text" name="youtube_video" class="form-control" id="youtube_video">
                                <small>You can promote your vehicle even better with a video! Simply make a video of your
                                    vehicle, upload it to YouTube, set it to "unlisted" or "public" and add the link
                                    here.</small>

                            </div>
                            {{-- <div class="form-group">
                                <label class="col-form-label">{{ __('Title') }}</label>
                                <input type="text" name="title" class="form-control" id="title">

                            </div> --}}
                            <div class="form-group col-md-6 py-4">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="product_display" class="form-check-input"
                                        id="product_display">
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
                                    <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                                        id="{{ $lang }}" role="tabpanel"
                                        aria-labelledby="{{ $lang }}-tab">
                                        <div class="row">
                                            <div class="col-12 pt-4">
                                                <div class="form-group">
                                                    {{ Form::label($lang . '_name', __('Title'), ['class' => 'col-form-label']) }}
                                                    {!! Form::text($lang . '_name', null, ['class' => 'form-control']) !!}

                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label($lang . '_description', __('Product Description'), ['class' => 'col-form-label']) }}
                                                    {{ Form::textarea($lang . '_description', null, ['class' => 'form-control summernote-simple', 'rows' => 2, 'placeholder' => __('Product Description')]) }}
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
                        <a href="{{ route('vehicle.index') }}"
                            class="btn btn-secondary btn-light">{{ __('Cancel') }}</a>
                        <input type="submit" id="submit-all" value="{{ __('Save') }}" class="btn btn-primary ms-2">
                    </div>

                    {{-- <div class="w-100 text-right">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill mr-auto"
                                id="submit-all">{{ __('Save') }}</button>
            </div> --}}
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection
