<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VendorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendor_profiles')->insert([
            'user_id' => 4,
            'description' => 'Short description for Vendor One',
            'address' => 'Address No1',
            'city' => 'New York',
            'state' => 'NY',
            'zip' => '12313',
            'phone' => '+011231231231',
            'membership_expires_at' => Carbon::now()->addDay(15)->format('Y-m-d H:i:s'),
            'trial_ends_at' => Carbon::now()->addDay(15)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('vendor_profiles')->insert([
            'user_id' => 5,
            'description' => 'Short description for Vendor Two',
            'address' => 'Address No1',
            'city' => 'New York',
            'state' => 'NY',
            'zip' => '12313',
            'phone' => '+011231231231',
            'membership_expires_at' => Carbon::now()->addDay(15)->format('Y-m-d H:i:s'),
            'trial_ends_at' => Carbon::now()->addDay(15)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
