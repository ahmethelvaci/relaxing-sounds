<?php

namespace App;

use Illuminate\Auth\Authenticatable as IlluminateAuthenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Device extends Model implements Authenticatable
{
    use IlluminateAuthenticatable;

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

    /**
     * Get the sounds for the library.
     */
    public function sounds()
    {
        return $this->belongsToMany('App\Sound', 'favorites');
    }
}
