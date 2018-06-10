<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Payment;
use App\Order;
use App\User;
class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;
    public $payment_status;
    public function __construct( $order)
    {
       $this->id = $order->id;
       $this->payment_status = $order->payment_status;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->payment_status=='paid off'){   
        return $this->view('Mail.payment')->subject('Payment Confirmation');
        }else{
            return $this->view('Mail.ppayment')->subject('Payment Failed');
        }
    }
}

