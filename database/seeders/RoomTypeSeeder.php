<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            'type_name' => 'Silent Room'
        ]);
        DB::table('room_types')->insert([
            'type_name' => 'Desk'
        ]);
        DB::table('room_types')->insert([
            'type_name' => 'Meeting Room'
        ]);
    }
}
