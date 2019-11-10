<?php

namespace App\Http\Controllers;

use App\Http\Responses\JsonResponse;
use App\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JsonResponse $response)
    {
        return $response->response(Library::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library, JsonResponse $response)
    {
        return $response->response($library->sounds()->paginate(10));
    }
}
