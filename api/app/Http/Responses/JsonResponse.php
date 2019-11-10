<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Arrayable;
use InvalidArgumentException;

class JsonResponse
{
    /**
     * Standart responses for controllers
     * 
     * @param Illuminate\Contracts\Support\Arrayable|array $data 
     * @param int $status
     * @param string $errorMessage
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($data, int $status = 200, string $errorMessage = null)
    {
        if (!is_array($data) && !($data instanceof Arrayable)) {
            throw new InvalidArgumentException('Response $data must be Arrayable!');
        }

        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }

        $response = [
            'data' => $data,
            'errorMessage' => $errorMessage,
            'errorCode' => $status,
        ];

        return response()->json($response, $status);
    }
}
