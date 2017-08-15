<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate bogus member users

        DB::table('users')->insert([
            'name' => 'Member One',
            'email' => 'member.one@ryansreferrals.com',
            'password' => '$2y$10$V9Z3p4a1K0/5t12deCUtDubcfi.5y/Ksf1GS26e63caNnr/Zx8wYq',
            'role_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Member Two',
            'email' => 'member.two@ryansreferrals.com',
            'password' => '$2y$10$V9Z3p4a1K0/5t12deCUtDubcfi.5y/Ksf1GS26e63caNnr/Zx8wYq',
            'role_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // generate bogus vendor users

        DB::table('users')->insert([
            'name' => 'Vendor One',
            'email' => 'vendor.one@ryansreferrals.com',
            'password' => '$2y$10$V9Z3p4a1K0/5t12deCUtDubcfi.5y/Ksf1GS26e63caNnr/Zx8wYq',
            'role_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Vendor Two',
            'email' => 'vendor.two@ryansreferrals.com',
            'password' => '$2y$10$V9Z3p4a1K0/5t12deCUtDubcfi.5y/Ksf1GS26e63caNnr/Zx8wYq',
            'role_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
