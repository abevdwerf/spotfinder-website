<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'floor_id' => 1,
            'room_name' => '0.10',
            'max_persons' => 50,
            'room_type' => 0,
            'reserved' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('rooms')->insert([
            'floor_id' => 1,
            'room_name' => '0.60',
            'max_persons' => 50,
            'room_type' => 0,
            'reserved' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('rooms')->insert([
            'floor_id' => 1,
            'room_name' => '0.05',
            'max_persons' => 50,
            'room_type' => 1,
            'reserved' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
