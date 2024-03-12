<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Whatsapp Messaging')); ?>

<?php $__env->stopSection(); ?>
<?php
    
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = \App\Models\Utility::getValByName('default_language');
    
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Whatsapp Messaging')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Whatsapp Messaging')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->type == 'Owner'): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body p-4">
                        <?php echo e(Form::model($store_settings, ['route' => ['customMassage', $store_settings->slug], 'method' => 'POST'])); ?>

                        <div class="row">
                            <h6 class="font-weight-bold"><?php echo e(__('Order Variable')); ?></h6>
                            <div class="form-group col-md-6">
                                <p class="mb-1"><?php echo e(__('Store Name')); ?> : <span
                                        class="pull-right text-primary">{store_name}</span></p>
                                <p class="mb-1"><?php echo e(__('Order No')); ?> : <span
                                        class="pull-right text-primary">{order_no}</span></p>
                                <p class="mb-1"><?php echo e(__('Customer Name')); ?> : <span
                                        class="pull-right text-primary">{customer_name}</span></p>
                                <p class="mb-1"><?php echo e(__('Billing Address')); ?> : <span
                                        class="pull-right text-primary">{billing_address}</span></p>
                                <p class="mb-1"><?php echo e(__('Billing Ccountry')); ?> : <span
                                        class="pull-right text-primary">{billing_country}</span></p>
                                <p class="mb-1"><?php echo e(__('Billing City')); ?> : <span
                                        class="pull-right text-primary">{billing_city}</span></p>
                                <p class="mb-1"><?php echo e(__('Billing Postalcode')); ?> : <span
                                        class="pull-right text-primary">{billing_postalcode}</span></p>
                                <p class="mb-1"><?php echo e(__('Shipping Address')); ?> : <span
                                        class="pull-right text-primary">{shipping_address}</span></p>
                                <p class="mb-1"><?php echo e(__('Shipping Country')); ?> : <span
                                        class="pull-right text-primary">{shipping_country}</span></p>

                                <p class="mb-1"><?php echo e(__('Shipping City')); ?> : <span
                                        class="pull-right text-primary">{shipping_city}</span></p>
                                <p class="mb-1"><?php echo e(__('Shipping Postalcode')); ?> : <span
                                        class="pull-right text-primary">{shipping_postalcode}</span></p>
                                <p class="mb-1"><?php echo e(__('Item Variable')); ?> : <span
                                        class="pull-right text-primary">{item_variable}</span></p>
                                <p class="mb-1"><?php echo e(__('Qty Total')); ?> : <span
                                        class="pull-right text-primary">{qty_total}</span></p>
                                <p class="mb-1"><?php echo e(__('Sub Total')); ?> : <span
                                        class="pull-right text-primary">{sub_total}</span></p>
                                <p class="mb-1"><?php echo e(__('Discount Amount')); ?> : <span
                                        class="pull-right text-primary">{discount_amount}</span></p>
                                <p class="mb-1"><?php echo e(__('Shipping Amount')); ?> : <span
                                        class="pull-right text-primary">{shipping_amount}</span></p>
                                <p class="mb-1"><?php echo e(__('Total Tax')); ?> : <span
                                        class="pull-right text-primary">{total_tax}</span></p>
                                <p class="mb-1"><?php echo e(__('Final Total')); ?> : <span
                                        class="pull-right text-primary">{final_total}</span></p>
                            </div>
                            <div class="form-group col-md-6">
                                <h6 class="font-weight-bold"><?php echo e(__('Item Variable')); ?></h6>
                                <p class="mb-1"><?php echo e(__('Sku')); ?> : <span class="pull-right text-primary">{sku}</span>
                                </p>
                                <p class="mb-1"><?php echo e(__('Quantity')); ?> : <span
                                        class="pull-right text-primary">{quantity}</span></p>
                                <p class="mb-1"><?php echo e(__('Product Name')); ?> : <span
                                        class="pull-right text-primary">{product_name}</span></p>
                                <p class="mb-1"><?php echo e(__('Variant Name')); ?> : <span
                                        class="pull-right text-primary">{variant_name}</span></p>
                                <p class="mb-1"><?php echo e(__('Item Tax')); ?> : <span
                                        class="pull-right text-primary">{item_tax}</span></p>
                                <p class="mb-1"><?php echo e(__('Item total')); ?> : <span
                                        class="pull-right text-primary">{item_total}</span></p>
                                <div class="form-group">
                                    <label for="storejs" class="col-form-label">{item_variable}</label>
                                    <?php echo e(Form::text('item_variable', null, ['class' => 'form-control', 'placeholder' => '{quantity} x {product_name} - {variant_name} + {item_tax} = {item_total}'])); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo e(Form::label('content', __('Whatsapp Message'), ['class' => 'col-form-label'])); ?>

                                    <?php echo e(Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required'])); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-end">
                            <div class="card-footer">
                                <div class="col-sm-12 px-2">
                                    <div class="d-flex justify-content-end">
                                        <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/settings/whatsapp_setting.blade.php ENDPATH**/ ?>