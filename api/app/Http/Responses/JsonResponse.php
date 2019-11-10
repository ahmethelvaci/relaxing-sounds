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
    public function response($result, int $status = 200, string $errorMessage = null)
    {
        if (!is_array($result) && !($result instanceof Arrayable)) {
            throw new InvalidArgumentException('Response $result must be Arrayable!');
        }

        if ($result instanceof Arrayable) {
            $result = $result->toArray();
        }

        $response = [
            'result' => $result,
            'errorMessage' => $errorMessage,
            'errorCode' => $status,
        ];

        return response()->json($response, $status);
    }
}
