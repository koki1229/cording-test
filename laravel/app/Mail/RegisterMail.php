<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $to_email)
    {
        $this->name = $name;
        $this->to_email = $to_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->to_email)// 送信先アドレス
        ->subject('登録が完了しました。')// 件名
        ->view('registers.register_mail')//本文
        ->with(['name' => $this->name]);
    }
}
