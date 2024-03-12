<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Vehicle')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Vehicle')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('vehicle.index')); ?>"><?php echo e(__('Vehicle')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Sell Vehicle')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
    <script>
        var Dropzones = function() {
            var e = $('[data-toggle="dropzone1"]'),
                t = $(".dz-preview");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            e.length && (Dropzone.autoDiscover = !1, e.each(function() {
                var e, a, n, o, i;
                e = $(this), a = void 0 !== e.data("dropzone-multiple"), n = e.find(t), o = void 0, i = {
                    url: "<?php echo e(route('product.store')); ?>",
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
                            window.location.href = "<?php echo e(route('vehicle.index')); ?>";
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
                url: "<?php echo e(route('vehicle.store')); ?>",
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
                        window.location.href = "<?php echo e(route('vehicle.index')); ?>";
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
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php echo e(Form::open(['method' => 'POST', 'id' => 'frmTarget', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="vehicle_number" class="form-label"><?php echo e(__('Vehicle Number')); ?></label>
                                <input type="text" name="vehicle_number" class="form-control" id="vehicle_number">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <label for="fin_number" class="form-label"><?php echo e(__('Fin Number')); ?></label>
                                    <input type="text" name="fin_number" class="form-control" id="fin_number">
                                </div>
                                <div class="form-group col-md-5 py-4">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="fin_number_display" class="form-check-input"
                                            id="fin_number_display">
                                        <?php echo e(Form::label('fin_number_display', __('Display Fin Number'), ['class' => 'form-check-label'])); ?>

                                    </div>
                                    <?php $__errorArgs = ['fin_number_display'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-fin_number_display" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                           

                            <div class="form-group">
                                <div class="form-group">
                                    <?php echo e(Form::label('vehicle_type_id', __('Vehicle Type'), ['class' => 'col-form-label'])); ?>


                                    <select name="vehicle_type_id" id="vehicle_type_id" class="form-control" data-toggle="select" data-url="<?php echo e(route('product.get-vehicle-brands')); ?>" required>
                                        <option value=""><?php echo e(__('Please Select')); ?></option>
                                        <?php $__currentLoopData = $vehicleTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($vehicleType->id); ?>">
                                            <?php echo e($vehicleType->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="brand_id" class="form-label"><?php echo e(__('Vehicle Brand')); ?></label>
                                <select name="brand_id" class="form-control" data-toggle="select" id="brand_id" data-url="<?php echo e(route('product.get-models')); ?>">
                                    <option value=""><?php echo e(__('Please Select')); ?></option>
                                </select>
                                <small>
                                    <?php echo e(__('If you cannot find your brand here, you can click below link to request new vehicle brand. We will notify you once we approved your requested brand!')); ?>

                                    <a href="<?php echo e(route('vehicleRequest')); ?>"><?php echo e(__('Request a New Brand')); ?>!</a>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="model_id" class="form-label"><?php echo e(__('Vehicle Model')); ?></label>
                                <select name="model_id" class="form-control" data-toggle="select" id="model_id">
                                    <option value=""><?php echo e(__('Please Select')); ?></option>
                                </select>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('register_year', __('First Register Year'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('register_year', \App\Models\Utility::getRegistrationYears(), null, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]); ?>

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('register_month', __('First Register Month'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('register_month', \App\Models\Utility::getRegistrationMonths(), null, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]); ?>



                                    </div>
                                </div>
                            </div><!-- /row-->


                            <div class="form-group">
                                <label for="millage" class="form-label"><?php echo e(__('Millage (km)')); ?></label>
                                <input type="text" name="millage" class="form-control" id="millage">
                            </div>
                            <div class="form-group">
                                <label for="fuel_type_id" class="form-label"><?php echo e(__('Fuel Type')); ?></label>
                                <select name="fuel_type_id" class="form-control" data-toggle="select" id="fuel_type_id">
                                    <option value=""><?php echo e(__('Please Select')); ?></option>
                                    <?php $__currentLoopData = $fuelTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuelType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($fuelType->id); ?>">
                                            <?php echo e($fuelType->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('prev_owners', __('Previous Owners'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::number('prev_owners', null, ['class' => 'form-control']); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('transmission_id', __('Transmission'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('transmission_id', \App\Models\Utility::getVehicleTransmission(), null, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]); ?>

                                    </div>
                                </div>
                            </div><!-- /row-->

                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('power', __('Power'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::number('power', null, ['class' => 'form-control']); ?>

                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('power_type', __('Type'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('power_type', \App\Models\Utility::getVehiclePowerTypes(), null, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]); ?>

                                    </div>
                                </div>
                            </div><!-- /row-->

                            <div class="col-md-12">
                                <h6><?php echo e(__('Equipments')); ?></h6>
                                <hr>
                            </div>

                            <div class="row">

                                <?php $__currentLoopData = $vehicleEquipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleEquipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="equipments[]"
                                                    value="<?php echo e($vehicleEquipment->name); ?>" class="form-check-input"
                                                    id="equipment<?php echo e($vehicleEquipment->id); ?>">
                                                <?php echo e(Form::label('equipment' . $vehicleEquipment->id . '', $vehicleEquipment->name, ['class' => 'form-check-label'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div><!-- /row-->




                        </div>
                        <div class="col-md-6 col-12">
                            <h6><?php echo e(__('Exterior Color')); ?></h6>
                            <hr>
                            <div class="form-group">
                                <div class="row">
                                    <?php $__currentLoopData = $exteriorColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exteriorColor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label class="colorinput">
                                                <input name="exterior_color" type="radio"
                                                    value="<?php echo e($exteriorColor->name); ?>"
                                                    data-theme="<?php echo e($exteriorColor->name); ?>" class="colorinput-input">
                                                <span class="colorinput-color"
                                                    style="background:<?php echo e($exteriorColor->name); ?>"></span>
                                                <span class="color-name"><?php echo e($exteriorColor->name); ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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
                                    <?php echo e(Form::label('is_metallic', __('Metallic'), ['class' => 'form-check-label'])); ?>

                                </div>
                            </div>
                            <h6><?php echo e(__('Interior Design')); ?></h6>
                            <hr>

                            <div class="row">
                                <?php $__currentLoopData = $interiorDesigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interiorDesign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="interior_design[]"
                                                    value="<?php echo e($interiorDesign->name); ?>" class="form-check-input"
                                                    id="interior_design<?php echo e($interiorDesign->id); ?>">
                                                <?php echo e(Form::label('interior_design' . $interiorDesign->id . '', $interiorDesign->name, ['class' => 'form-check-label'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <!-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Cloth" class="form-check-input" id="interior_design2">
                                                        <?php echo e(Form::label('interior_design2', __('Cloth'), ['class' => 'form-check-label'])); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Full Leather" class="form-check-input" id="interior_design3">
                                                        <?php echo e(Form::label('interior_design3', __('Full Leather'), ['class' => 'form-check-label'])); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Other" class="form-check-input" id="interior_design4">
                                                        <?php echo e(Form::label('interior_design4', __('Other'), ['class' => 'form-check-label'])); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Part Leather" class="form-check-input" id="interior_design5">
                                                        <?php echo e(Form::label('interior_design5', __('Part Leather'), ['class' => 'form-check-label'])); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="interior_design[]" value="Velour" class="form-check-input" id="interior_design6">
                                                        <?php echo e(Form::label('interior_design6', __('Velour'), ['class' => 'form-check-label'])); ?>

                                                    </div>
                                                </div>
                                            </div> -->
                            </div><!-- /row-->
                            <h6><?php echo e(__('Interior Color')); ?></h6>
                            <hr>

                            <div class="form-group">
                                <div class="row">
                                    <?php $__currentLoopData = $interiorColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interiorColor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label class="colorinput">
                                                <input name="interior_color" type="radio"
                                                    value="<?php echo e($interiorColor->name); ?>"
                                                    data-theme="<?php echo e($interiorColor->name); ?>" class="colorinput-input">
                                                <span class="colorinput-color"
                                                    style="background:<?php echo e($interiorColor->name); ?>"></span>
                                                <span class="color-name"><?php echo e($interiorColor->name); ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <label for="is_cover_image" class="col-form-label"><?php echo e(__('Upload Cover Image')); ?></label>
                                <input type="file" name="is_cover_image" id="is_cover_image"
                                    class="form-control custom-input-file">
                            </div>
                            <h5 class="mb-0"><?php echo e(__('Images')); ?></h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <?php echo e(Form::label('sub_images', __('Upload Product Images'), ['class' => 'col-form-label'])); ?>

                                    <div class="dropzone dropzone-multiple" data-toggle="dropzone1"
                                        data-dropzone-url="http://" data-dropzone-multiple>
                                        <div class="fallback">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="dropzone-1"
                                                    name="file" multiple>
                                                <label class="custom-file-label"
                                                    for="customFileUpload"><?php echo e(__('Choose file')); ?></label>
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
                                <?php echo e(Form::label('product_categorie', __('Product Categories'), ['class' => 'col-form-label'])); ?>

                                <?php echo Form::select('product_categorie[]', $product_categorie, null, [
                                    'class' => 'form-control multi-select',
                                    'id' => 'choices-multiple',
                                    'multiple',
                                ]); ?>

                                <?php if(count($product_categorie) == 0): ?>
                                    <?php echo e(__('Add product category')); ?>

                                    <a href="<?php echo e(route('product_categorie.index')); ?>">
                                        <?php echo e(__('Click here')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><?php echo e(__('Youtube Video')); ?></label>
                                <input type="text" name="youtube_video" class="form-control" id="youtube_video">
                                <small>You can promote your vehicle even better with a video! Simply make a video of your
                                    vehicle, upload it to YouTube, set it to "unlisted" or "public" and add the link
                                    here.</small>

                            </div>
                            
                            <div class="form-group col-md-6 py-4">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="product_display" class="form-check-input"
                                        id="product_display">
                                    <?php echo e(Form::label('product_display', __('Product Display'), ['class' => 'form-check-label'])); ?>

                                </div>
                                <?php $__errorArgs = ['product_display'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-product_display" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php $store_languages = App\Models\Utility::getStoreLanguages(); ?>

                                <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                            id="<?php echo e($lang); ?>-tab" data-bs-toggle="tab"
                                            data-bs-target="#<?php echo e($lang); ?>" type="button" role="tab"
                                            aria-controls="home"
                                            aria-selected="true"><?php echo e(\App\Models\Utility::getLangCodes($lang)); ?></button>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="tab-content" id="myTabContent">

                                <?php $__currentLoopData = $store_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                        id="<?php echo e($lang); ?>" role="tabpanel"
                                        aria-labelledby="<?php echo e($lang); ?>-tab">
                                        <div class="row">
                                            <div class="col-12 pt-4">
                                                <div class="form-group">
                                                    <?php echo e(Form::label($lang . '_name', __('Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo Form::text($lang . '_name', null, ['class' => 'form-control']); ?>


                                                </div>
                                                <div class="form-group">
                                                    <?php echo e(Form::label($lang . '_description', __('Product Description'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::textarea($lang . '_description', null, ['class' => 'form-control summernote-simple', 'rows' => 2, 'placeholder' => __('Product Description')])); ?>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                            <div class="form-group">
                                <?php echo e(Form::label('net_price', __('Net Price'), ['class' => 'col-form-label'])); ?>

                                <?php echo e(Form::number('net_price', null, ['step' => 'any', 'class' => 'form-control'])); ?>

                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('price', __('Gross Price'), ['class' => 'col-form-label'])); ?>

                                <?php echo e(Form::number('price', null, ['step' => 'any', 'class' => 'form-control'])); ?>

                            </div>

                        </div>


                    </div>
                    <div class="form-group col-12 d-flex justify-content-end col-form-label">
                        <a href="<?php echo e(route('vehicle.index')); ?>"
                            class="btn btn-secondary btn-light"><?php echo e(__('Cancel')); ?></a>
                        <input type="submit" id="submit-all" value="<?php echo e(__('Save')); ?>" class="btn btn-primary ms-2">
                    </div>

                    
                </div>
                <?php echo e(Form::close()); ?>


            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/vehicle/create.blade.php ENDPATH**/ ?>