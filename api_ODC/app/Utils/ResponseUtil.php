<?php

namespace App\Utils;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ResponseUtil
{
    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function makeResponse($message, $data)
    {
        return [
            'success' => true,
            'data' => $data,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    public static function makeError($message, array $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }

    public static function validationResponse(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => ConstantName::VALIDATION_MESSAGE,
            'data' => $validator->errors()
        ], 400));
    }
}
