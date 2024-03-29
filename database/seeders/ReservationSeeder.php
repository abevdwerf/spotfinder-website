<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'user_id' => 1,
            'room_id' => 1,
            'reservation_start' => Carbon::now()->format('Y-m-d H:i:s'),
            'reservation_end' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('reservations')->insert([
            'user_id' => 2,
            'room_id' => 3,
            'reservation_start' => Carbon::now()->format('Y-m-d H:i:s'),
            'reservation_end' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('reservations')->insert([
            'user_id' => 3,
            'room_id' => 2,
            'reservation_start' => Carbon::now()->format('Y-m-d H:i:s'),
            'reservation_end' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
