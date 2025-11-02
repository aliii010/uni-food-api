<?php

namespace App\Traits;

trait ApiResponses
{
    protected function ok($data, $message)
    {
        return $this->success($data, $message, 200);
    }

    protected function success($data, $message, $code = 200)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $code
        ], $code);
    }

    protected function error($message, $code)
    {
        return response()->json([
            'message' => $message,
            'status' => $code
        ], $code);
    }

}
    