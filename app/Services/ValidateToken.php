<?php

namespace App\Services;

use Illuminate\Support\Str;

class ValidateToken
{

    public function generateToken(): string
    {
        return uniqid();
    }


}
