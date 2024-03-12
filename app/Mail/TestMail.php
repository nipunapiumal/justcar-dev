<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // $data = [
        //     "subject" => "Subject",
        //     "first_name" => "first_name",
        //     "last_name" => "last_name",
        //     "email" => "email",
        //     "phone" => "phone",
        //     "message" => "message",
        //     "product_id" => "7",
        // ];

        // return $this->markdown('emails.contactMail')->with(
        //     [
        //         // 'order' => $this->order,
        //         // 'product_link' => $this->product_link,
        //         'store' => Store::find(1),
        //         'request' => (object)$data,
        //         'product' => Product::find(7),
        //     ]
        // );

        return $this->view('emails.test_mail')->subject('Mail send for testing site.');
    }
}
