<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $file;
    public function __construct(Order $order, String $file)
    {
        //
        $this->order = $order;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->file === '') {
            return $this->markdown('emails.OrderMail');
        }
        return $this->markdown('emails.OrderMail')
            ->attach('.././storage/app/'.$this->file);
    }
}
