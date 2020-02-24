<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use ResponseErrorMessageTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email'    => ['required', 'string', 'email', 'min:3', 'max:320'],
            'password' => ['required', 'string', 'min:6', 'max:100', 'alpha_dash'],
        ];
    }
}
