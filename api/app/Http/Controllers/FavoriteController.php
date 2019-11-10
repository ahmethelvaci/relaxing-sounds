<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Http\Responses\JsonResponse;
use App\Sound;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JsonResponse $response)
    {
        $device = auth()->user();
        return $response->response($device->sounds()->paginate(10));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sound $sound, JsonResponse $response)
    {
        $device = auth()->user();

        $favorite = Favorite::where([
            ['device_id', $device->id],
            ['sound_id', $sound->id]
        ])->first();

        if ($favorite == null) {
            $device->sounds()->attach($sound);
            return $response->response(['status' => true], 201);
        } else {
            return $response->response(['status' => false], 409, 'This sound alredy in favorites');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sound $sound, JsonResponse $response)
    {
        $device = auth()->user();

        $favorite = Favorite::where([
            ['device_id', $device->id],
            ['sound_id', $sound->id]
        ])->first();

        if ($favorite == null) {
            return $response->response(['status' => false], 409, 'This sound alredy not in favorites');
        } else {
            $device->sounds()->detach($sound);
            return $response->response(['status' => true]);
        }
        
    }
}
