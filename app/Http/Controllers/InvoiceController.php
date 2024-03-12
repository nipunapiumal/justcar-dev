<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\FuelType;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store_id         = \Auth::user()->current_store;
        $invoices = Invoice::where('store_id', $store_id)->where('created_by', \Auth::user()->creatorId())->get();

        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        return view('invoice.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // client data saves inside customers table, because I assume clients are also customers


        $languages = Utility::languages();
        $validator = \Validator::make(
            $request->all(),
            [
                'invoice_no' => 'required|max:45|unique:invoices',
                'email' => 'required|max:120',
                'name' => 'required|max:120',
                'address' => 'required',
                'zip_code' => 'required|max:45',
                'city' => 'required|max:45',
                'country' => 'required|max:45',
                'phone_number' => 'required|max:120',

            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $invoice = new Invoice();

        $data = [];
        foreach ($languages as $lang) {
            if ($request["$lang" . '_description']) {
                $contents  = $request["$lang" . '_description'];
            } else {
                $contents  = __('Invoice Desc 1', [], $lang);
            }
            $data[$lang] = $contents;
        }
        $invoice->description = json_encode($data);

        $customer_data = [
            'email' => $request->email,
            'name' => $request->name,
            'company' => $request->company,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'country' => $request->country,
            'phone_number' => $request->phone_number,
            'lang' => "en",
        ];

        $customer = Customer::updateOrCreate(
            [
                'email' => $request->email,
            ],
            $customer_data
        );

        $invoice->invoice_no = $request->invoice_no;
        $invoice->product_type = 2;
        $invoice->product_id = $request->product_id;
        $invoice->customer_id = $customer->id;
        $invoice->created_by = Auth::user()->creatorId();
        $invoice->store_id = Auth::user()->current_store;

        $product = Product::find($invoice->product_id);
        $customer = Customer::find($invoice->customer_id);
        $fuel_type = FuelType::find($product->fuel_type_id);

        //use to preview the pdf on the browser
        $debug = 0;
        if ($debug) {
            return view('invoice.view', compact('product', 'fuel_type', 'invoice', 'customer'));
        }


        $invoice->save();
        // share data to view
        view()->share('invoice.view', $product);
        $pdf = PDF::loadView('invoice.view', compact('product', 'fuel_type', 'invoice', 'customer'));
        // download PDF file with download method

        $file_name = $product->vehicle_number . '.pdf';
        $pdf->download($file_name);

        return redirect()->route('invoice.index')->with('success', __('Successfully Created!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $product = Product::find($invoice->product_id);
        $customer = Customer::find($invoice->customer_id);
        $fuel_type = FuelType::find($product->fuel_type_id);

        $pdf = PDF::loadView('invoice.view', compact('product', 'fuel_type', 'invoice', 'customer'));
        $file_name = $product->vehicle_number . '.pdf';
        return $pdf->stream($file_name, array("Attachment" => false));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoice.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        
        $languages = Utility::languages();
        $validator = \Validator::make(
            $request->all(),
            [
                // 'invoice_no' => 'required|max:45|unique:invoices',
                'email' => 'required|max:120',
                'name' => 'required|max:120',
                'address' => 'required',
                'zip_code' => 'required|max:45',
                'city' => 'required|max:45',
                'country' => 'required|max:45',
                'phone_number' => 'required|max:120',

            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $data = [];
        foreach ($languages as $lang) {
            if ($request["$lang" . '_description']) {
                $contents  = $request["$lang" . '_description'];
            } else {
                $contents  = __('Invoice Desc 1', [], $lang);
            }
            $data[$lang] = $contents;
        }
        $invoice->description = json_encode($data);

        $customer_data = [
            'email' => $request->email,
            'name' => $request->name,
            'company' => $request->company,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'country' => $request->country,
            'phone_number' => $request->phone_number,
            'lang' => "en",
        ];

        $customer = Customer::updateOrCreate(
            [
                'email' => $request->email,
            ],
            $customer_data
        );

        // $invoice->invoice_no = $request->invoice_no;
        $invoice->product_type = 2;
        $invoice->product_id = $request->product_id;
        $invoice->customer_id = $customer->id;
        $invoice->created_by = Auth::user()->creatorId();
        $invoice->store_id = Auth::user()->current_store;


        $invoice->update();
        return redirect()->back()->with(
            'success',
            __('Successfully Updated!')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->back()->with(
            'success',
            __('Successfully deleted!')
        );
    }
}
