<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Users')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-2"><?php echo e(__('Users')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Users')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="pr-2">
        <a href="#" data-size="md" data-url="<?php echo e(route('store-resource.create')); ?>" data-ajax-popup="true"
            data-title="<?php echo e(__('Create New User')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            data-bs-placement="top" title="<?php echo e(__('Create')); ?>"><i class="ti ti-plus"></i></a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('User Name')); ?></th>
                                    <th><?php echo e(__('Role')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    
                                    
                                    <th><?php echo e(__('Created At')); ?></th>
                                    
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($usr->name); ?></td>
                                        <td><span class="badge bg-light text-dark"><?php echo e(\App\Models\Utility::getUserRoles($usr->type)); ?></span></td>
                                        <td><?php echo e($usr->email); ?></td>
                                        <td><?php echo e(\App\Models\Utility::dateFormat($usr->created_at)); ?></td>
                                        
                                        <td class="Action">
                                            <span>
                                                <div class="action-btn  bg-info ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="<?php echo e(route('users.edit', $usr->id)); ?>"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit User')); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Edit')); ?>"><i
                                                            class="ti ti-pencil text-white"></i></a>
                                                </div>
                                                <div class="action-btn bg-danger ms-2">
                                                    <a class="bs-pass-para align-items-center btn btn-sm d-inline-flex"
                                                        href="#" data-title="<?php echo e(__('Delete Lead')); ?>"
                                                        data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="delete-form-<?php echo e($usr->id); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Delete ')); ?>">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                    <?php echo Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['store-resource.destroy', $usr->id],
                                                        'id' => 'delete-form-' . $usr->id,
                                                    ]); ?>

                                                    <?php echo Form::close(); ?>

                                                </div>
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="#" data-size="md"
                                                        data-url="<?php echo e(route('user.reset', \Crypt::encrypt($usr->id))); ?>"
                                                        data-ajax-popup="true" data-title="<?php echo e(__('Reset Password')); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Reset Password')); ?>"> <i
                                                            class="fas fa-key text-white"></i></a>
                                                </div>
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="<?php echo e(route('auto-login',["id"=>$usr->id,"token"=>Str::random(32)])); ?>"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo e(__('Auto Login')); ?>"><i
                                                            class="fas fa-sign-in-alt text-white"></i>
                                                    </a>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/users/index.blade.php ENDPATH**/ ?>