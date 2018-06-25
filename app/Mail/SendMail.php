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
    public $id;
    public $date_order;
    public $date_using;
    public $booking_code;
    public $total_payment;
    public $status_order;
    public function __construct( $order)
    {
       $this->id = $order->id;
       $this->status_order = $order->order_status;
       $this->date_order=$order->date_order;
       $this->date_using=$order->date_using;
       $this->booking_code=$order->booking_code;
       $this->total_payment=$order->total_payment;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->status_order=='accept'){   
        return $this->view('Mail.mail')->subject('Reservation Confirm');
        }else{
            return $this->view('Mail.mail')->subject('Information Reservation');
        }
    }
}
