<?php ($store_logo = asset(Storage::url('uploads/gallery_image/'))); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gallery')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h5 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Gallery')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Gallery')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="pr-2">

        <?php if(Utility::getStorageUsage() >= \Auth::user()->total_storage): ?>
            <a href="#" data-title="<?php echo e(__('Create New Gallery')); ?>" class="disabled btn btn-sm btn-primary btn-icon m-1"
                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        <?php else: ?>
            <a href="#" data-size="md" data-url="<?php echo e(route('gallery.create')); ?>" data-ajax-popup="true"
                data-title="<?php echo e(__('Create New Gallery')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create')); ?>"><i class="ti ti-plus"></i></a>
        <?php endif; ?>


    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable ">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort"><?php echo e(__('Gallery Image')); ?></th>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Category')); ?>

                                    </th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <?php if($gallery->gallery_img): ?>
                                                    <img alt="Image placeholder"
                                                        src="<?php echo e($store_logo); ?>/<?php echo e($gallery->gallery_img); ?>"
                                                        class="rounded-circle" alt="images">
                                                <?php else: ?>
                                                    <img alt="Image placeholder" src="<?php echo e($store_logo); ?>/default.jpg"
                                                        class="rounded-circle" alt="images">
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td><?php echo e($gallery->gallery_category()); ?></td>
                                        </td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn  bg-info ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="<?php echo e(route('gallery.edit', $gallery->id)); ?>"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit Gallery')); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Edit')); ?>" data-tooltip="Edit"><i
                                                            class="ti ti-pencil text-white"></i></a>
                                                </div>

                                                <div class="action-btn bg-danger ms-2">
                                                    <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"
                                                        href="#" data-title="<?php echo e(__('Delete Lead')); ?>"
                                                        data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="delete-form-<?php echo e($gallery->id); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Delete')); ?>">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    <?php echo Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['gallery.destroy', $gallery->id],
                                                        'id' => 'delete-form-' . $gallery->id,
                                                    ]); ?>

                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/gallery/index.blade.php ENDPATH**/ ?>