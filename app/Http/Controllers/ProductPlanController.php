<?php

namespace App\Http\Controllers;

use App\Models\ProductPlan;
use App\Models\ProductPlanOrder;
use App\Models\Utility;
use Illuminate\Http\Request;

class ProductPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objUser = \Auth::user();
        if ($objUser->type == 'super admin' || $objUser->type == 'Owner') {
            if ($objUser->type == 'super admin') {
                $orders = ProductPlanOrder::select(
                    [
                        'product_plan_orders.*',
                        'users.name as user_name',
                    ]
                )->join('users', 'product_plan_orders.user_id', '=', 'users.id')->orderBy('product_plan_orders.created_at', 'DESC')->get();
            
            } else {
                $orders = ProductPlanOrder::select(
                    [
                        'product_plan_orders.*',
                        'users.name as user_name',
                    ]
                )->join('users', 'product_plan_orders.user_id', '=', 'users.id')->orderBy('product_plan_orders.created_at', 'DESC')->where('users.id', '=', $objUser->id)->get();
            }

            $product_plans = ProductPlan::get();
            $admin_payments_setting = Utility::getAdminPaymentSetting();
            return view('product_plans.index', compact('product_plans', 'orders', 'admin_payments_setting'));
        } else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->type == 'super admin') {
            return view('product_plans.create');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (\Auth::user()->type == 'super admin') {
            $admin_payments_setting = Utility::getAdminPaymentSetting();
            if ((isset($admin_payments_setting['is_stripe_enabled']) && $admin_payments_setting['is_stripe_enabled'] == 'on')
                || (isset($admin_payments_setting['is_paypal_enabled']) && $admin_payments_setting['is_paypal_enabled'] == 'on')
                || (isset($admin_payments_setting['is_paystack_enabled']) && $admin_payments_setting['is_paystack_enabled'] == 'on')
                || (isset($admin_payments_setting['is_flutterwave_enabled']) && $admin_payments_setting['is_flutterwave_enabled'] == 'on')
                || (isset($admin_payments_setting['is_razorpay_enabled']) && $admin_payments_setting['is_razorpay_enabled'] == 'on')
                || (isset($admin_payments_setting['is_mercado_enabled']) && $admin_payments_setting['is_mercado_enabled'] == 'on')
            ) {
                $validation = [];
                $validation['name'] = 'required|unique:product_plans';
                $validation['price'] = 'required|numeric';

                $request->validate($validation);
                $post = $request->all();

                if (ProductPlan::create($post)) {
                    return redirect()->back()->with('success', __('Added Successfully'));
                } else {
                    return redirect()->back()->with('error', __('Something is wrong'));
                }
            } else {
                return redirect()->back()->with('error', __('Please set stripe/paypal api key & secret key for add new plan'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (\Auth::user()->type == 'super admin') {
            $product_plan = ProductPlan::find($id);

            return view('product_plans.edit', compact('product_plan'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (\Auth::user()->type == 'super admin') {
            $admin_payments_setting = Utility::getAdminPaymentSetting();
            if ((isset($admin_payments_setting['is_stripe_enabled']) && $admin_payments_setting['is_stripe_enabled'] == 'on')
                || (isset($admin_payments_setting['is_paypal_enabled']) && $admin_payments_setting['is_paypal_enabled'] == 'on')
                || (isset($admin_payments_setting['is_paystack_enabled']) && $admin_payments_setting['is_paystack_enabled'] == 'on')
                || (isset($admin_payments_setting['is_flutterwave_enabled']) && $admin_payments_setting['is_flutterwave_enabled'] == 'on')
                || (isset($admin_payments_setting['is_razorpay_enabled']) && $admin_payments_setting['is_razorpay_enabled'] == 'on')
                || (isset($admin_payments_setting['is_mercado_enabled']) && $admin_payments_setting['is_mercado_enabled'] == 'on')
            ) {
                $product_plan = ProductPlan::find($id);
                if ($product_plan) {

                    $validator = \Validator::make(
                        $request->all(),
                        [
                            'name' => 'required|unique:product_plans,name,' . $id,
                            'price' => 'required|numeric|min:0',
                        ]
                    );



                    if ($validator->fails()) {
                        $messages = $validator->getMessageBag();

                        return redirect()->back()->with('error', $messages->first());
                    }

                    $post = $request->all();
                    if ($product_plan->update($post)) {
                        return redirect()->back()->with('success', __('Updated Successfully!'));
                    } else {
                        return redirect()->back()->with('error', __('Something is wrong'));
                    }
                } else {
                    return redirect()->back()->with('error', __('Plan not found'));
                }
            } else {
                return redirect()->back()->with('error', __('Please set stripe/paypal api key & secret key for add new plan'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
