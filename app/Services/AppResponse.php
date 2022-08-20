<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class AppResponse
{
    /**
     * @param $statusCode
     * @param $message
     * @param $data
     * @return JsonResponse
     */
    public function success($statusCode = 200, $message, $data = []): JsonResponse
    {
        $responseData = [
            'status_code' => $statusCode,
            'message' => $message,
            'data' => $data
        ];

        return response()->json(
            $responseData
        );
    }

    /**
     * @param $statusCode
     * @param $message
     * @param $errors
     * @return JsonResponse
     */
    public function failed($statusCode, $message, $errors = []): JsonResponse
    {
        $responseData = [
            'status_code' => $statusCode,
            'message' => $message
        ];

        if (!empty($errors)) {
            $responseData['errors'] = $errors;
        }

        return response()->json(
            $responseData
        );
    }
}
