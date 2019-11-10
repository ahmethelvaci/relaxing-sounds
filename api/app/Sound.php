<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['library_id', 'name', 'src'];

    protected $hidden = ['library_id', 'pivot'];
}
