<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Advertisements')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Advertisements')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Advertisements')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="pr-2">
        <a href="#" data-size="md" data-url="<?php echo e(route('advertisements.create')); ?>" data-ajax-popup="true"
            data-title="<?php echo e(__('Create New Advertisements')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create ')); ?>"><i class="ti ti-plus"></i></a>
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
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Advertisement Type')); ?></th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-name="<?php echo e($advertisement->advertisement_type); ?>">
                                        <td>
                                            <?php if($advertisement->advertisement_type == 1): ?>
                                                <?php echo e(__('Banner Image')); ?>

                                            <?php elseif($advertisement->advertisement_type == 3): ?>
                                                <?php echo e(__('Interstitial Ad')); ?>

                                            <?php else: ?>
                                                <?php echo e(__('Google Ad code')); ?>

                                            <?php endif; ?>

                                        </td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn  bg-info ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="<?php echo e(route('advertisements.edit', $advertisement->id)); ?>"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit Advertisements')); ?>"
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
                                                        data-confirm-yes="delete-form-<?php echo e($advertisement->id); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Delete')); ?>">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    <?php echo Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['advertisements.destroy', $advertisement->id],
                                                        'id' => 'delete-form-' . $advertisement->id,
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
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '#advertisement_type', function(e) {
            var advertisementType = $(this).val();



            if (advertisementType == 1) {
                $("#info-standard").show();
                $("#info-google").hide();
                $("#info-interstitial").hide();
            } else if (advertisementType == 2) {
                $("#info-standard").hide();
                $("#info-google").show();
                $("#info-interstitial").hide();
            } else if (advertisementType == 3) {
                $("#info-standard").hide();
                $("#info-google").hide();
                $("#info-interstitial").show();
            } else {
                $("#info-standard").hide();
                $("#info-google").hide();
                $("#info-interstitial").hide();
            }


        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/advertisement/index.blade.php ENDPATH**/ ?>