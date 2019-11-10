<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['device_id', 'sound_id'];

    public static function add(Sound $sound):bool
    {
        $device = auth()->user();

        $favorite = Favorite::where([
            ['device_id', $device->id],
            ['sound_id', $sound->id]
        ])->first();

        if ($favorite == null) {
            $device->sounds()->attach($sound);
            return true;
        } else {
            return false;
        }
    }

    public static function sub(Sound $sound):bool
    {
        $device = auth()->user();

        $favorite = self::where([
            ['device_id', $device->id],
            ['sound_id', $sound->id]
        ])->first();

        if ($favorite == null) {
            return false;
        } else {
            $device->sounds()->detach($sound);
            return true;
        }
    }

}
