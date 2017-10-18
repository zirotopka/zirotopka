<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivasionShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $code;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password, $code)
    {
        $this->user = $user;
        $this->code = $code;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@reformator.one', 'Reformator One')
                    ->subject('Активация аккаунта Reformator One!')
                    ->view('mail._activasion',['user' => $this->user, 'password' => $this->password,'code' => $this->code]);
    }
}
