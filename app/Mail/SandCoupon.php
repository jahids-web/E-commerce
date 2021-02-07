<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SandCoupon extends Mailable
{
    use Queueable, SerializesModels;
    private $coupon_name_to_send = "";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($coupon_name)
    {
        // $this->$coupon_name_to_send = $coupon_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('admin.mail.sandcoupon',[
        //     'coupon_name_to_send' = $this->coupon_name_to_send;
        // ]);
    }
}
