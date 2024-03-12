<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        body {
            margin: 1rem;
            font-family: sans-serif;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #293240;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        .w-100 {
            width: 100% !important;
        }

        .text-end {
            text-align: right !important;
        }

        .text-muted {
            --bs-text-opacity: 1;
            color: #6c757d !important;
        }

        .info-header td {
            padding-left: 30px;
        }

        /* .product-info tr:first-child {
                                                                border-top: 1px solid;
                                                                border-bottom: 1px solid;
                                                            } */

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .d-flex {
            display: flex !important;
        }

        .justify-content-end {
            justify-content: flex-end !important;
        }

        .justify-content-between {
            justify-content: space-between !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .pt-2 {
            padding-top: 0.5rem !important;
        }

        .pb-2 {
            padding-bottom: 0.5rem !important;
        }

        .text-start {
            text-align: left !important;
        }

        table {
            border-collapse: collapse;
        }


        /* .fixed-bottom {
                        position: fixed;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        z-index: 1030;
                    } */

        .mt-2 {
            margin-top: 0.5rem !important;
        }


        .m-0 {
            margin: 0 !important;
        }

        .m-1 {
            margin: 0.25rem !important;
        }

        .m-2 {
            margin: 0.5rem !important;
        }

        .m-3 {
            margin: 1rem !important;
        }

        .m-4 {
            margin: 1.5rem !important;
        }

        .m-5 {
            margin: 3rem !important;
        }

        .m-auto {
            margin: auto !important;
        }
    </style>

    <?php
        $logo = asset(Storage::url('uploads/logo/'));
        $company_logo = \App\Models\Utility::GetLogo();
        $lang = App::getLocale();

        $product_price = $product->net_price != 0 ? $product->net_price : 0;
        //product count tax
        $taxes = Utility::tax($product->product_tax);
        $itemTaxes = [];
        $producttax = 0;
    ?>

    <div class="text-end">
        <img style="max-width: 300px;"
            src="<?php echo e($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png')); ?>"
            alt="<?php echo e(config('app.name', 'Storego')); ?>" class="logo logo-lg nav-sidebar-logo" />
    </div>

    <h4 class="mb-0"><b><?php echo e($customer->company); ?></b></h4>
    <div><?php echo e($customer->name); ?></div>
    <div><?php echo e($customer->address); ?></div>
    <div><?php echo e($customer->zip_code); ?> <?php echo e($customer->city); ?> </div>
    <div><?php echo e($customer->phone_number); ?> </div>

    <div class="info-header d-flex justify-content-end text-end">
        <table border="0" class="mt-5 w-100">
            <tr>
                
                <td class="pl-4 text-end">
                    <div><b><?php echo e(__('Invoice')); ?> <?php echo e(__('Date')); ?></b></div>
                    <div><?php echo e(\App\Models\Utility::dateFormat($invoice->created_at)); ?></div>
                </td>

            </tr>
        </table>
    </div>
    <h3 class="mt-3"><?php echo e(__('Invoice Number')); ?> #<?php echo e($invoice->invoice_no); ?></h3>
    <p>
        <?php
            if ($invoice->description) {
                $desc = json_decode($invoice->description);
                $desc = $desc->$lang;
            }
        ?>
        <?php echo nl2br($desc); ?>

    </p>

    <table class="mt-5 w-100">
        <tr style="border-top: 1px solid;border-bottom: 1px solid;">
            <th class="pt-2 pb-2 text-start">
                POS
            </th>
            <th class="pt-2 pb-2 text-start">
                <?php echo e(__('Description')); ?>

            </th>
            <th class="pt-2 pb-2 text-end">
                <?php echo e(__('Total')); ?> <?php echo e(env('CURRENCY_SYMBOL')); ?>

            </th>
        </tr>
        <tr>
            <td>
                1
            </td>
            <td>
                <?php echo e($product->getVehicleBrand()); ?> <?php echo e($product->getVehicleModel()); ?>

                <br>
                <?php echo e(__('Fin Number')); ?> <?php echo e($product->fin_number); ?>

                <br>
                <?php echo e(__('First Register Year')); ?>/<?php echo e(__('month')); ?>

                <?php echo e($product->register_year); ?>/<?php echo e($product->register_month); ?>

                <br>
                <?php echo e(__('Millage (km)')); ?> <?php echo e($product->millage); ?>

                <br>
                <?php echo e($fuel_type->name); ?>

                - <?php echo e(\App\Models\Utility::getVehicleTransmission($product->transmission_id)); ?>

                - <?php echo e($product->power); ?> (<?php echo e($product->power_type); ?>)
                <br>
                <table>
                    <tr>
                        <td><?php echo e(__('Interior Color')); ?></td>
                        <td style="padding-left: 10px">
                            <div
                                style="height: 20px;width:20px;background-color:<?php echo e($product->interior_color); ?>;border:1px solid">
                            </div>
                        </td>
                        <td style="padding-left: 10px"><?php echo e(__('Exterior Color')); ?></td>
                        <td style="padding-left: 10px">
                            <div
                                style="height: 20px;width:20px;background-color:<?php echo e($product->exterior_color); ?>;border:1px solid">
                            </div>
                        </td>
                    </tr>
                </table>
                <br>
                <?php echo e(__('Equipments')); ?>

                <ul>
                    <?php $__currentLoopData = json_decode($product->equipments); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_equipment => $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($equipment); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <br>
                <?php echo e(__('Interior Design')); ?>

                <ul>
                    <?php $__currentLoopData = json_decode($product->interior_design); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_interior_design => $interior_design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($interior_design); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>


            </td>
            <td class="text-end">
                <?php echo e(\App\Models\Utility::priceFormat($product->net_price)); ?>

            </td>


        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>

                <table class="w-100">
                    <tr style="border-bottom: 1px solid">
                        <td>
                            <div><?php echo e(__('Total')); ?> <?php echo e(__('Net')); ?></div>
                        </td>
                        <td class="text-end"><?php echo e(\App\Models\Utility::priceFormat($product_price)); ?></td>
                    </tr>
                    <?php if(!empty($taxes)): ?>
                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($tax)): ?>
                                <tr style="border-bottom: 1px solid">
                                    <?php
                                        $producttax = Utility::taxRate($tax->rate, $product_price, 1);
                                        $itemTax['tax_name'] = $tax->name;
                                        $itemTax['tax'] = $tax->rate;
                                        $itemTaxes[] = $itemTax;

                                        echo '<td>' . $tax->name . ' ' . $tax->rate . '%' . '</td>';
                                        echo '<td class="text-end">' . Utility::priceFormat($producttax) . '</td>';
                                    ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php
                        $subtotal = Utility::priceFormat($product_price + $producttax);
                    ?>


                    <tr style="border-bottom: 2px solid red;">
                        <td><b><?php echo e(__('Total')); ?></b></td>
                        <td class="text-end"><b><?php echo e($subtotal); ?></b></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="m-3">
        <p class="text-muted mt-4"><small><?php echo e(Utility::getValByName($lang . '_terms_and_conditions')); ?></small></p>

        <table border="0" class="mt-2 w-100 text-muted">
            <tr style="border-top: 1px solid;border-bottom: 1px solid;">
                <td>
                    <?php echo e(Utility::getValByName('title_text')); ?>

                    <br>
                    <?php echo e(Utility::getValByName('address')); ?>

                    <br>
                    <?php echo e(Utility::getValByName('zip_code')); ?> <?php echo e(Utility::getValByName('city')); ?>

                    <br>
                    <?php if($vat_number = Utility::getValByName('vat_number')): ?>
                        <div><?php echo e(__('Vat Number')); ?>: <?php echo e($vat_number); ?></div>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($phone_number = Utility::getValByName('phone_number')): ?>
                        <div><?php echo e(__('Phone No')); ?>: <?php echo e($phone_number); ?></div>
                    <?php endif; ?>
                    <?php if($fax_number = Utility::getValByName('fax_number')): ?>
                        <div> <?php echo e(__('Fax Number')); ?>: <?php echo e($fax_number); ?></div>
                    <?php endif; ?>
                    <?php if($email = Utility::getValByName('email')): ?>
                        <div> <?php echo e(__('Email')); ?>: <?php echo e($email); ?></div>
                    <?php endif; ?>
                    <?php if($website = Utility::getValByName('website')): ?>
                        <div><?php echo e(__('Website')); ?>: <?php echo e($website); ?></div>
                    <?php endif; ?>

                </td>
                <td class="text-end">
                    <?php echo nl2br(Utility::getValByName('bank_number')); ?>

                </td>
            </tr>

        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/invoice/view.blade.php ENDPATH**/ ?>