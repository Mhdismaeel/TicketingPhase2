<?php

namespace App\Actions\Helper;


use Illuminate\Http\JsonResponse;

class Success
{
    public static function execute($message = '', $data = [], $code = null): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message ?? '',
            'data' => $data,
            'response_code' => $code ?? 200
        ]);
    }
}
