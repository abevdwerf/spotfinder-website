<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desks')->insert([
            'room_id' => 1,
            'available_spaces' => 6,
            'wall_outlet' => 6,
            'x' => 216.5,
            'y' => 216.5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('desks')->insert([
            'room_id' => 2,
            'available_spaces' => 3,
            'wall_outlet' => 1,
            'x' => 6.5,
            'y' => 26.5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('desks')->insert([
            'room_id' => 3,
            'available_spaces' => 6,
            'wall_outlet' => 3,
            'x' => 316.5,
            'y' => 316.5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
