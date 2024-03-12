<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Job Board')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h5 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Job Board')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Job Board')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
        <div class="pr-2">
            <a href="#" data-size="md" data-url="<?php echo e(route('job-board.create')); ?>" data-ajax-popup="true"
                data-title="<?php echo e(__('Create New Job Board')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Create')); ?>"><i class="ti ti-plus"></i></a>
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
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Category')); ?>

                                    <th scope="col" class="sort"><?php echo e(__('Title')); ?></th>
                                    <th scope="col" class="sort"><?php echo e(__('Position')); ?></th>
                                    </th>
                                    <th class="text-right"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $job_boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($job_board->job_category()); ?></td>
                                        <td><?php echo e($job_board->title); ?></td>
                                        <td><?php echo e($job_board->position); ?></td>
                                        </td>
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn  bg-info ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="<?php echo e(route('job-board.edit', $job_board->id)); ?>"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit Job Board')); ?>"
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
                                                        data-confirm-yes="delete-form-<?php echo e($job_board->id); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Delete')); ?>">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['job-board.destroy', $job_board->id], 'id' => 'delete-form-' . $job_board->id]); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/job_boards/index.blade.php ENDPATH**/ ?>