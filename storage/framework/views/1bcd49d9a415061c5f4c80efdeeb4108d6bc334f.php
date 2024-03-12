<?php $__env->startSection('page-title'); ?>
    <?php echo e($emailTemplate->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('custom/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('email_template.index')); ?>"><?php echo e(__('Email Templates')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e($emailTemplate->name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <?php echo e(Form::model($emailTemplate, array('route' => array('email_template.update', $emailTemplate->id), 'method' => 'PUT'))); ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('name',__('Name'),['class'=>'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('name',null,array('class'=>'form-control font-style','disabled'=>'disabled'))); ?>

                        </div>
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('from',__('From'),['class'=>'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('from',null,array('class'=>'form-control font-style','required'=>'required'))); ?>

                        </div>
                        <?php echo e(Form::hidden('lang',$currEmailTempLang->lang,array('class'=>''))); ?>

                        <div class="col-lg-12">
                            <div class="text-end">
                                <div class="d-flex justify-content-end">
                                        <?php echo e(Form::submit(__('Save Changes'),array('class'=>'btn btn-xs btn-primary'))); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-xs">
                        <div class="col-3 pb-3">
                            <h6 class="font-weight-bold"><?php echo e(__('Order')); ?></h6>
                            <p class="mb-1"><?php echo e(__('App Name')); ?> : <span class="pull-right text-primary">{app_name}</span></p>
                            <p class="mb-1"><?php echo e(__('Order Name')); ?> : <span class="pull-right text-primary">{order_name}</span></p>
                            <p class="mb-1"><?php echo e(__('Order Status')); ?> : <span class="pull-right text-primary">{order_status}</span></p>
                            <p class="mb-1"><?php echo e(__('Order URL')); ?> : <span class="pull-right text-primary">{order_url}</span></p>
                            <p class="mb-1"><?php echo e(__('Order Id')); ?> : <span class="pull-right text-primary">{order_id}</span></p>
                            <p class="mb-1"><?php echo e(__('Order Date')); ?> : <span class="pull-right text-primary">{order_date}</span></p>
                            <p class="mb-1"><?php echo e(__('Owner Name')); ?> : <span class="pull-right text-primary">{owner_name}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="language-wrap">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 language-list-wrap">
                                <div class="language-list">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="text-sm font-weight-bold">
                                                <a href="<?php echo e(route('manage.email.language',[$emailTemplate->id,$lang])); ?>" class="nav-link <?php echo e(($currEmailTempLang->lang == $lang)?'active':''); ?>"><?php echo e(Str::upper($lang)); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 language-form-wrap">
                                <?php echo e(Form::model($currEmailTempLang, array('route' => array('store.email.language',$currEmailTempLang->parent_id), 'method' => 'PUT'))); ?>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <?php echo e(Form::label('subject',__('Subject'),['class'=>'col-form-label text-dark'])); ?>

                                        <?php echo e(Form::text('subject',null,array('class'=>'form-control font-style','required'=>'required'))); ?>

                                    </div>
                                    <div class="form-group col-12">
                                        <?php echo e(Form::label('content',__('Email Message'),['class'=>'col-form-label text-dark'])); ?>

                                        <?php echo e(Form::textarea('content',$currEmailTempLang->content,array('class'=>'summernote-simple','required'=>'required'))); ?>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <div class="d-flex justify-content-end">
                                                    <?php echo e(Form::hidden('lang',null)); ?>

                                                    <?php echo e(Form::submit(__('Save Changes'),array('class'=>'btn btn-xs btn-primary'))); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/email_templates/show.blade.php ENDPATH**/ ?>