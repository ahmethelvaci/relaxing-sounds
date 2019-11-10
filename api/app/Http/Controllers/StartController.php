<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Requests\StartRequest;
use App\Http\Responses\JsonResponse;

class StartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StartRequest $request, Device $device, JsonResponse $response)
    {
        $device = $device->start($request->name, $request->version);
        return $response->response($device);
    }
}
