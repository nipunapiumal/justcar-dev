<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommonEmailTemplate extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public $store;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template, $store)
    {
        $this->template = $template;
        $this->store = $store;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = $this->template->subject;
        if($subject=="Term Has Changed"){
            $subject = __("We're adding more details to our Terms of Use");
        }

        return $this->markdown('emails.common_email_template')->subject($subject)->with(
            [
                'content' => $this->template->content,
                'mail_header' => $this->store['name'],
            ]
        );
    }
}
