<?php

namespace App\Http\Controllers;

use App\Http\Responses\JsonResponse;
use App\Sound;

class SoundController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Sound  $sound
     * @return \Illuminate\Http\Response
     */
    public function show(Sound $sound, JsonResponse $response)
    {
        return $response->response($sound);
    }
}
