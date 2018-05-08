<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $date_order;
    public $date_using;
    public $booking_code;
    public function __construct( $order)
    {
       $this->date_order=$order->date_order;
       $this->date_using=$order->date_using;
       $this->booking_code=$order->booking_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.mail')->subject('Reservation Confirm from Precious Party Planner');
    }
}