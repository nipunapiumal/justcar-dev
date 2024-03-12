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


    $(document).delegate("form#frmTarget", "submit", function(e) {
        e.preventDefault();

        var fd = new FormData();

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
            url: "<?php echo e(route('gallery.store')); ?>",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(data) {
                if (data.flag == "success") {
                    show_toastr('success', data.msg, 'success');
                    window.location.href = "<?php echo e(route('gallery.index')); ?>";
                } else {
                    show_toastr('Error', data.msg, 'error');
                }
            },
            error: function(data) {
                // Dropzones.removeFile(file);
                if (data.error) {
                    show_toastr('Error', data.error, 'error');
                } else {
                    show_toastr('Error', data, 'error');
                }
            },
        });


    });
</script>

<?php echo e(Form::open(['url' => 'gallery', 'id' => 'frmTarget', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">

            <?php echo e(Form::label('gallery_categorie', __('Gallery Category'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('gallery_categorie', $galleryCategories, null, [
                'class' => 'form-control',
                // 'data-toggle' => 'select',
                'required' => 'required',
            ])); ?>

        </div>
        <div class="form-group">
            <div class="col-12 border-0">
                <div class="row">
                    <div class="col-6">
                        <h5 class="mb-0"><?php echo e(__('Gallery Images')); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?php echo e(Form::label('sub_images', __('Upload Gallery Images'), ['class' => 'col-form-label'])); ?>

                            <div class="dropzone dropzone-multiple" data-toggle="dropzone1" data-dropzone-url="http://"
                                data-dropzone-multiple>
                                <div class="fallback">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dropzone-1" name="file"
                                            multiple>
                                        <label class="custom-file-label"
                                            for="customFileUpload"><?php echo e(__('Choose file')); ?></label>
                                    </div>
                                </div>
                                <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
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
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary ms-2">
    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/gallery/create.blade.php ENDPATH**/ ?>