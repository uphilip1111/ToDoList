<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToDoListRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:1', 'max:20'],
            'content' => ['sometimes', 'string', 'min:1', 'max:100'],
            'attachment' => ['sometimes', 'string', 'min:1', 'max:50'],
        ];
    }
}
