<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReferralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('referrals')->insert([
            'name' => 'Referral One',
            'user_id' => 2,
            'category_id' => 1,
            'email' => 'referral.one@ryansreferrals.com',
            'description' => 'Description for Referral One',
            'code' => null,
            'needed_at' => Carbon::now()->addDay(10),
            'contact_time' => '08.00-18.00',
            'phone' => '+015555555555',
            'city' => 'Long Island',
            'state' => 'NY',
            'urgent' => 0,
            'removable' => 1,
            'sold' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('referrals')->insert([
            'name' => 'Referral Two',
            'user_id' => 3,
            'category_id' => 1,
            'email' => 'referral.two@ryansreferrals.com',
            'description' => 'Description for Referral Two',
            'code' => null,
            'needed_at' => Carbon::now()->addDay(12),
            'contact_time' => '08.00-18.00',
            'phone' => '+015555555555',
            'city' => 'Long Island',
            'state' => 'NY',
            'urgent' => 1,
            'removable' => 1,
            'sold' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('referrals')->insert([
            'name' => 'Referral Three',
            'user_id' => 2,
            'category_id' => 1,
            'email' => 'referral.three@ryansreferrals.com',
            'description' => 'Description for Referral three',
            'code' => null,
            'needed_at' => Carbon::now()->addDay(10),
            'contact_time' => '08.00-18.00',
            'phone' => '+015555555555',
            'city' => 'Long Island',
            'state' => 'NY',
            'urgent' => 0,
            'removable' => 1,
            'sold' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('referrals')->insert([
            'name' => 'Referral Four',
            'user_id' => 3,
            'category_id' => 1,
            'email' => 'referral.four@ryansreferrals.com',
            'description' => 'Description for Referral Four',
            'code' => null,
            'needed_at' => Carbon::now()->addDay(12),
            'contact_time' => '08.00-18.00',
            'phone' => '+015555555555',
            'city' => 'Long Island',
            'state' => 'NY',
            'urgent' => 1,
            'removable' => 1,
            'sold' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
