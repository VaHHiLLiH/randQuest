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

    public function __construct(string $email, string $name, int $code)
    {
        $this->email = $email;
        $this->name = $name;
        $this->code = $code;
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
                        'code'   => $this->code
                    ])
                    ->view('email.email');
    }
}
