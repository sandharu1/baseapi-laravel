<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('s1api.login.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
