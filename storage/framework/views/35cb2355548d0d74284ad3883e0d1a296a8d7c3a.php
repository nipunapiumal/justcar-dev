<table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600">
    <tr>
        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
            <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                    style="background:#ffffff;background-color:#ffffff;width:100%;">
                    <tbody>
                        <tr>
                            <td
                                style="direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-bottom:70px;padding-top:30px;text-align:center;vertical-align:top;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="" style="vertical-align:top;width:600px;">
                                            <div class="mj-column-per-100 outlook-group-fix"
                                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                                <table border="0" cellpadding="0" cellspacing="0"
                                                    role="presentation" style="vertical-align:top;" width="100%">
                                                    <tr>
                                                        <td align="left"
                                                            style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                                                            <div
                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                
                                                                <p style="line-height:32px"><b
                                                                        style="font-weight:700"><?php echo e(__('Hi Dear,')); ?></b>
                                                                </p>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    
                                                    <tr>
                                                        <td align="left"
                                                            style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                                                            <div
                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                <p style="margin: 10px 0;">
                                                                    <?php echo e(__('vehicle contact email desc 1', [
                                                                        'last_name' => $request->last_name,
                                                                    ])); ?>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left"
                                                            style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                                                            <div
                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                <p style="margin: 10px 0;"><b><?php echo e(__('Title')); ?></b>
                                                                </p>
                                                                <p>
                                                                    <a
                                                                        href="<?php echo e(route('store.product.product_view', [$store->slug, $product->id])); ?>">
                                                                        <?php echo e($product->getName()); ?>

                                                                    </a>

                                                                </p>
                                                                <p style="margin: 10px 0;">
                                                                    <b><?php echo e(__('Vehicle Number')); ?></b>
                                                                </p>
                                                                <p><?php echo e($product->vehicle_number); ?></p>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left"
                                                            style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                                                            <div
                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                <p style="margin: 10px 0;">
                                                                    <?php echo e(__('vehicle contact email desc 2', [
                                                                        'app_name' =>
                                                                            isset(\Utility::settings()['company_name']) && !empty(\Utility::settings()['company_name'])
                                                                                ? \Utility::settings()['company_name']
                                                                                : env('APP_NAME'),
                                                                    ])); ?>

                                                                </p>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    
                                                    <tr>
                                                        <td align="left"
                                                            style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                                                            <div
                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                <p style="margin-top:10px;margin-bottom:0;"><i
                                                                        style="font-style:normal"><b
                                                                            style="font-weight:700"><?php echo e(__('Regards,')); ?></b></i>
                                                                </p>
                                                                <p style="margin-top:0;margin-bottom:10px;"><i
                                                                        style="font-style:normal">
                                                                        <?php echo e(isset(\Utility::settings()['company_name']) && !empty(\Utility::settings()['company_name']) ? \Utility::settings()['company_name'] : env('APP_NAME')); ?>

                                                                    </i>
                                                                </p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left"
                                                            style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                                                            <p style="margin: 10px 0;">
                                                                <i style="font-style:normal">
                                                                    <b><?php echo e(__('Message from the interested party')); ?></b>
                                                                </i>
                                                            </p>
                                                            <div
                                                                style="background: #ffdc82;background-color: #ffdc82;padding:20px">
                                                                <table>
                                                                    <tr>
                                                                        <td>
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <?php echo e(__('Name')); ?></i>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                        <td style="padding-left:15px;">
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <?php echo e($request->first_name); ?>

                                                                                        <?php echo e($request->last_name); ?>

                                                                                    </i>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <?php echo e(__('Email')); ?>

                                                                                    </i>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                        <td style="padding-left:15px;">
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <a
                                                                                            href="mailto:<?php echo e($request->email); ?>"><?php echo e($request->email); ?></a>
                                                                                    </i>
                                                                                </p>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <?php echo e(__('Phone No')); ?>

                                                                                    </i>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                        <td style="padding-left:15px;">
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <?php echo e($request->phone); ?>

                                                                                    </i>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <?php echo e(__('Subject')); ?>

                                                                                    </i>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                        <td style="padding-left:15px;">
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <?php echo e($request->subject); ?>

                                                                                    </i>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <?php echo e(__('Message')); ?>

                                                                                    </i>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                        <td style="padding-left:15px;">
                                                                            <div
                                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                                                                                <p
                                                                                    style="margin-top:10px;margin-bottom:0;">
                                                                                    <i style="font-style:normal">
                                                                                        <b><?php echo e($request->message); ?></b>
                                                                                    </i>
                                                                                </p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left"
                                                            style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                                                            <div
                                                                style="font-family:Open Sans, Helvetica, Arial, sans-serif;line-height:22px;text-align:left;color:#797e82;">
                                                                <p style="margin-top:10px;margin-bottom:0;font-size: 12px;text-align: center;color: #c4c4c4;"><i
                                                                        style="font-style:normal">
                                                                        © <?php echo e(date('Y')); ?> 
                                                                        <?php echo e(__('copyright_text', [
                                                                            'app_name' => env('APP_NAME'),
                                                                            'membership' => '',
                                                                        ])); ?>    
                                                                    </i>
                                                                </p>
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
</table>
<?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/emails/contactMail.blade.php ENDPATH**/ ?>