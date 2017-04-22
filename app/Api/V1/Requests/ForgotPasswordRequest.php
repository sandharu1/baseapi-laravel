<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('s1api.forgot_password.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}