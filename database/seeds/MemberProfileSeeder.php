<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MemberProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_profiles')->insert([
            'user_id' => 2,
            'description' => 'Short description for Vendor One',
            'address' => 'Address No1',
            'city' => 'New York',
            'state' => 'NY',
            'zip' => '12313',
            'phone' => '+011231231231',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('member_profiles')->insert([
            'user_id' => 3,
            'description' => 'Short description for Vendor One',
            'address' => 'Address No1',
            'city' => 'New York',
            'state' => 'NY',
            'zip' => '12313',
            'phone' => '+011231231231',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
