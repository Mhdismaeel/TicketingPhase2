<?php

namespace App\Actions\Helper;


use Illuminate\Http\JsonResponse;

class Fail
{
    public static function execute($message = '', $data = [], $code = null): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message ?? '',
            'data' => $data,
            'response_code' => $code ?? 500
        ]);
    }
}
