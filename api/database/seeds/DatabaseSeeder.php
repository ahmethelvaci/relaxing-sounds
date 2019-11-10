<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $device = new App\Device();
        $device->name = 'test';
        $device->api_token = 'uZHWPJBFoTYVq0FdtD9iSACHeT8R3hzYc76vwJeojglB2gUuIOAUSH8sGfLeJNn9zPXP5HVjNNj6jYuX';
        $device->save();

        factory(App\Library::class, 10)->create();
        factory(App\Sound::class, 200)->create();
        factory(App\Favorite::class, 20)->create();
    }
}
