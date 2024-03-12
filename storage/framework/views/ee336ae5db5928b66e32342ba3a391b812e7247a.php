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
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<div class="pr-2">
    <?php if(Utility::getStorageUsage() >= \Auth::user()->total_storage): ?>
        <a href="" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Sell Vehicle')); ?>">
            <i class="ti ti-plus"></i>
        </a>
    <?php else: ?>
        <a href="<?php echo e(route('vehicle.create')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Sell Vehicle')); ?>">
            
            <i class="ti ti-plus"></i>
        </a>
    <?php endif; ?>



</div>
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
                    url: "<?php echo e(route('products.update', $product->id)); ?>",
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
                            window.location.href = "<?php echo e(route('product.index')); ?>";
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
                url: "<?php echo e(route('vehicle.update', $product->id)); ?>",
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
                        window.location.href = "<?php echo e(route('vehicle.index')); ?>";
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
                url: '<?php echo e(route('products.file.delete', '__product_id')); ?>'.replace('__product_id', id),
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
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php echo e(Form::model($product, ['method' => 'POST', 'id' => 'frmTarget', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('vehicle_number', __('Vehicle Number'), ['class' => 'col-form-label'])); ?>

                                <?php echo Form::text('vehicle_number', null, ['class' => 'form-control']); ?>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <?php echo e(Form::label('fin_number', __('Fin Number'), ['class' => 'col-form-label'])); ?>

                                    <?php echo Form::text('fin_number', null, ['class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-md-5 py-4">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="fin_number_display" class="form-check-input"
                                            id="fin_number_display" <?php echo e($product->fin_number_display == 'on' ? 'checked' : ''); ?>>
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
                                <?php echo e(Form::label('vehicle_type_id', __('Vehicle Type'), ['class' => 'col-form-label'])); ?>

                                
                               
                               
                               <?php echo Form::select('vehicle_type_id', $vehicle_types, $product->vehicle_type_id, [
                                    'class' => 'form-control',
                                    'data-toggle' => 'select',
                                    'data-url' => route('product.get-vehicle-brands'),
                                ]); ?>

                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('brand_id', __('Vehicle Brand'), ['class' => 'col-form-label'])); ?>

                                <?php echo Form::select('brand_id', $vehicle_brands, $product->brand_id, [
                                    'class' => 'form-control',
                                    'data-toggle' => 'select',
                                    'readonly' => 'true',
                                    'data-url' => route('product.get-models'),
                                ]); ?>

                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('model_id', __('Vehicle Model'), ['class' => 'col-form-label'])); ?>

                                <?php echo Form::select('model_id', $vehicle_models, $product->model_id, [
                                    'class' => 'form-control',
                                    'data-toggle' => 'select',
                                ]); ?>

                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('register_year', __('First Register Year'), ['class' => 'col-form-label'])); ?>

                                        <?php echo Form::select('register_year', \App\Models\Utility::getRegistrationYears(), $product->register_year, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]); ?>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('register_month', __('First Register Month'), ['class' => 'col-form-label'])); ?>

                                        <?php echo Form::select('register_month', \App\Models\Utility::getRegistrationMonths(), $product->register_month, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]); ?>

                                    </div>

                                </div>
                            </div><!-- /row-->

                            <div class="form-group">
                                <?php echo e(Form::label('millage', __('Millage (km)'), ['class' => 'col-form-label'])); ?>

                                <?php echo Form::text('millage', null, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('fuel_type_id', __('Fuel Type'), ['class' => 'col-form-label'])); ?>

                                <?php echo Form::select('fuel_type_id', $fuel_types, $product->fuel_type_id, [
                                    'class' => 'form-control',
                                    'data-toggle' => 'select',
                                ]); ?>

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
                                        <?php echo e(Form::label('transmission_id', __('Transmission'), ['class' => 'col-form-label'])); ?>

                                        <?php echo Form::select('transmission_id', \App\Models\Utility::getVehicleTransmission(), $product->transmission_id, [
                                            'class' => 'form-control',
                                            'data-toggle' => 'select',
                                        ]); ?>

                                    </div>
                                </div>
                            </div><!-- /row-->

                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('power', __('Power'), ['class' => 'col-form-label'])); ?>

                                        <?php echo Form::number('power', $product->power, ['class' => 'form-control']); ?>

                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('power_type', __('Type'), ['class' => 'col-form-label'])); ?>

                                        <?php echo Form::select('power_type', \App\Models\Utility::getVehiclePowerTypes(), $product->power_type, [
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
                                                    id="equipment<?php echo e($vehicleEquipment->id); ?>"
                                                    <?php echo e(in_array($vehicleEquipment->name, json_decode($product->equipments)) ? 'checked' : ''); ?>>
                                                <?php echo e(Form::label('equipment' . $vehicleEquipment->id . '', $vehicleEquipment->name, ['class' => 'form-check-label'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div><!-- /row-->




                        </div>

                        <div class="col-12 col-md-6">
                            <div class="col-md-12">
                                <h6><?php echo e(__('Exterior Color')); ?></h6>
                                <hr>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <?php $__currentLoopData = $exteriorColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exteriorColor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-md-6 col-lg-3">
                                            <label class="colorinput">
                                                <input name="exterior_color" type="radio"
                                                    value="<?php echo e($exteriorColor->name); ?>"
                                                    data-theme="<?php echo e($exteriorColor->name); ?>" class="colorinput-input"
                                                    <?php echo e($product->exterior_color == $exteriorColor->name ? 'checked' : ''); ?>>
                                                <span class="colorinput-color"
                                                    style="background:<?php echo e($exteriorColor->name); ?>"></span>
                                                <span class="color-name"><?php echo e($exteriorColor->name); ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>


                            </div>


                            
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="is_metallic" class="form-check-input" id="is_metallic"
                                        <?php echo e($product->is_metallic == 1 ? 'checked' : ''); ?> value="1">
                                    <?php echo e(Form::label('is_metallic', __('Metallic'), ['class' => 'form-check-label'])); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6><?php echo e(__('Interior Design')); ?></h6>
                                <hr>
                            </div>
                            <div class="row">
                                <?php $__currentLoopData = $interiorDesigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interiorDesign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" name="interior_design[]"
                                                    value="<?php echo e($interiorDesign->name); ?>" class="form-check-input"
                                                    id="interior_design<?php echo e($interiorDesign->id); ?>"
                                                    <?php echo e(in_array($interiorDesign->name, json_decode($product->interior_design)) ? 'checked' : ''); ?>>
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
                                                    data-theme="<?php echo e($interiorColor->name); ?>" class="colorinput-input"
                                                    <?php echo e($product->interior_color == $interiorColor->name ? 'checked' : ''); ?>>
                                                <span class="colorinput-color"
                                                    style="background:<?php echo e($interiorColor->name); ?>"></span>
                                                <span class="color-name"><?php echo e($interiorColor->name); ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </div>
                            </div>

                            
                            <!-- /row-->
                            
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="is_cover_image"
                                        class="col-form-label"><?php echo e(__('Upload Cover Image')); ?></label>
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
                                                            src=" <?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                            width="70px" alt="Image placeholder" data-dz-thumbnail>
                                                    </p>
                                                </div>
                                                <div class="col-auto actions">
                                                    <a class="action-item"
                                                        href=" <?php echo e(asset(Storage::url('uploads/is_cover_image/' . $product->is_cover))); ?>"
                                                        download="" data-toggle="tooltip"
                                                        data-original-title="<?php echo e(__('Download')); ?>">
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
                                        <h5 class="mb-0"><?php echo e(__('Product Image')); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
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
                                                <?php $__currentLoopData = $product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="card mb-3 border shadow-none product_Image"
                                                        data-id="<?php echo e($file->id); ?>">
                                                        <div class="px-3 py-3">
                                                            <div class="row align-items-center">
                                                                <div class="col ml-n2">
                                                                    <p class="card-text small text-muted">
                                                                        <img class="rounded"
                                                                            src=" <?php echo e(asset(Storage::url('uploads/product_image/' . $file->product_images))); ?>"
                                                                            width="70px" alt="Image placeholder"
                                                                            data-dz-thumbnail>
                                                                    </p>
                                                                </div>
                                                                <div class="col-auto actions">
                                                                    <a class="action-item"
                                                                        href=" <?php echo e(asset(Storage::url('uploads/product_image/' . $file->product_images))); ?>"
                                                                        download="" data-toggle="tooltip"
                                                                        data-original-title="<?php echo e(__('Download')); ?>">
                                                                        <i class="fas fa-download"></i>
                                                                    </a>
                                                                </div>

                                                                <div class="col-auto actions">
                                                                    <a name="deleteRecord"
                                                                        class="action-item deleteRecord"
                                                                        data-id="<?php echo e($file->id); ?>">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
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
                                <?php echo e(Form::label('youtube_video', __('Youtube Video'), ['class' => 'col-form-label'])); ?>

                                <?php echo Form::text('youtube_video', null, ['class' => 'form-control']); ?>

                                <small>You can promote your vehicle even better with a video! Simply make a video of your
                                    vehicle, upload it to YouTube, set it to "unlisted" or "public" and add the link
                                    here.</small>

                            </div>

                            <div class="form-group col-md-6 py-4">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="product_display" class="form-check-input"
                                        id="product_display" <?php echo e($product->product_display == 'on' ? 'checked' : ''); ?>>
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
                                    <?php
                                        $data = App\Models\ProductLangs::where('parent_id', $product->id)
                                            ->where('lang', $lang)
                                            ->first();
                                    ?>
                                    <div class="tab-pane fade show <?php echo e(basename(App::getLocale()) == $lang ? 'active' : ''); ?>"
                                        id="<?php echo e($lang); ?>" role="tabpanel"
                                        aria-labelledby="<?php echo e($lang); ?>-tab">
                                        <div class="row">
                                            <div class="col-12 pt-4">
                                                <div class="form-group">
                                                    <?php echo e(Form::label($lang . '_name', __('Title'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo Form::text($lang . '_name', (isset($data["name"])?$data["name"]:''), ['class' => 'form-control']); ?>


                                                </div>
                                                <div class="form-group">
                                                    <?php echo e(Form::label($lang . '_description', __('Product Description'), ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::textarea($lang . '_description', (isset($data["description"])?$data["description"]:''), ['class' => 'form-control summernote-simple', 'rows' => 2, 'placeholder' => __('Product Description')])); ?>

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
                        <a href="<?php echo e(route('product.index')); ?>"
                            class="btn btn-secondary btn-light"><?php echo e(__('Cancel')); ?></a>
                        <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary ms-2">
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/vehicle/edit.blade.php ENDPATH**/ ?>