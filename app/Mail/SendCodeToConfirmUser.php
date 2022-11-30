<?php


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCodeToConfirmUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * @var string
     */
    private string $email;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var int
     */
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
            'email' => $this->name,
            'name'  => $this->name,
            'code'  => $this->code,
        ])->view('email.checkCode');
    }
}
