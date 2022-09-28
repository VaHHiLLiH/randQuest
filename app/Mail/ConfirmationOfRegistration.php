<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

final class ConfirmationOfRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private string $email;
    private string $name;
    private int $code;
    private string $token;

    public function __construct(string $email, string $name, int $code, string $token)
    {
        $this->email = $email;
        $this->name = $name;
        $this->code = $code;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->with([
                        'email'  => $this->email,
                        'name'   => $this->name,
                        'code'   => $this->code,
                        'token'  => $this->token,
                    ])
                    ->view('email.email');
    }
}
