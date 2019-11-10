<?php

namespace App;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Device extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    
    /**
     * Device first request
     * 
     * @param string $name
     * @param string $version
     * return Illuminate\Contracts\Support\Arrayable;
     */
    public function start(string $name, string $version) : Arrayable
    {
        $device = self::firstOrNew(['name' => $name]);

        if(!$device->api_token) {
            $device->api_token = Str::random(80);
            $device->save();
        }

        return collect([
            'api_token' => $device->api_token,
            'version' => $this->versionControl($version) 
        ]);
    }

    private function versionControl(string $version): string
    {
        if ($version === '1.0') {
            return 'update';
        } else {
            return 'force_update';
        }
    }
}
