<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['bail','numeric',Rule::exists(User::class, 'id')],
            'username' => ['bail','string','max:20'],
            'password' => ['bail','string','max:20'],
            'nickname' => ['bail','string','max:20'],
            'admin' => ['bail','string','max:20'],
        ];
    }
}
