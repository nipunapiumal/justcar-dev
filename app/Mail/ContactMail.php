<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $order;
    // public $product_link;
    public $store;
    public $request;
    public $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        // $this->order        = $order;
        // $this->product_link = $product_link;
        // $this->store        = $store;
        $this->request        = $request;
        // $this->product        = $vehicle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->product =Product::find($this->request->product_id);
        $this->store =Store::find($this->product->store_id);

        return $this->markdown('emails.contactMail')->with(
            [
                // 'order' => $this->order,
                // 'product_link' => $this->product_link,
                'store' => $this->store,
                'request' => $this->request,
                'product' => $this->product,
            ]
        );
    }
}
