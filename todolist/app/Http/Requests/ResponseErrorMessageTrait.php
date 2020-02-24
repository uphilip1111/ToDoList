<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Enums\ResponseCodeEnum;

trait ResponseErrorMessageTrait
{
    protected function failedValidation(Validator $validator)
    {
        if(method_exists($this, 'message')) {
            $errorMsg = $this->container->call([$this, 'message']);
        } else {
            $errorMsg = '';
            foreach ($validator->errors()->getMessages() as $key => $message) {
                $errorMsg .= '[' . __($key) . "]  {$message[0]} \n";
            }
        }

        throw new HttpResponseException(response()->json([
                    'message' => trim($errorMsg),
                    'data'    => [],
        ], 422,
        [],
        JSON_UNESCAPED_UNICODE));
    }
}