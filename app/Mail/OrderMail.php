<?php

namespace App\Mail;

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
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('mails.order')
        ->from('ismart.project.trungdung@gmail.com' , 'IT24H')
                    ->subject("[IT24H] Thông tin đơn hàng #IT24H{$this->data['orders']['code_order']}")
                    ->with($this->data);
    }
}
