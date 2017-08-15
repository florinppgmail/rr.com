<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableCreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate admin user

        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@ryansreferrals.com',
            'password' => '$2y$10$V9Z3p4a1K0/5t12deCUtDubcfi.5y/Ksf1GS26e63caNnr/Zx8wYq',
            'role_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
