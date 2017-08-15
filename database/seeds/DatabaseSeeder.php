<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableCreateAdminSeeder::class);
         $this->call(UsersTableSeeder::class); // Members and Vendors
         $this->call(CategoriesTableSeeder::class);
         $this->call(ReferralTableSeeder::class);
         $this->call(VendorBoughtReferralsSeeder::class);
         $this->call(VendorCategoriesSeeder::class);
         $this->call(VendorProfileSeeder::class);
         $this->call(MemberProfileSeeder::class);
    }
}
