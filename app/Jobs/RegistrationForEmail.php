<?php

namespace App\Jobs;

use App\Mail\ConfirmationOfRegistration;
use App\Models\User;
use Faker\Factory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Type\Integer;

class RegistrationForEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var User
     */
    protected User $user;
    /**
     * @var string
     */
    protected string $token;
    /**
     * @var int
     */
    protected int $code;


    public function __construct(User $user, int $code, string $token)
    {
        $this->user = $user;
        $this->token = $token;
        $this->code = $code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new ConfirmationOfRegistration($this->user->email, $this->user->name, $this->code, $this->token));
    }
}
