<?php

namespace Database\Seeders;

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
        $this->call(LocationSeeder::class);
        $this->call(FloorSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(DeskSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(SensorSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
