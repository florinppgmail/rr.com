<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'OTHER',
            'description' => 'Other categories for admin to reassign referrals.',
            'icon'  => 'fa-cloud',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

DB::table('categories')->insert([
            'name' => 'Auto',
            'description' => 'Auto area',
            'icon'  => 'fa-cloud',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Home',
            'description' => 'Home area',
            'icon'  => 'fa-cloud',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Pets',
            'description' => 'Pets area',
            'icon'  => 'fa-cloud',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Audio',
            'category_id' => 1,
            'icon'  => 'fa-cloud',
            'description' => 'Auto audio area',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Auto body painting',
            'category_id' => 1,
            'description' => 'Auto body painting area',
            'icon'  => 'fa-cloud',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Pet Sitting',
            'description' => 'Pet sitting area',
            'category_id' => 3,
            'icon'  => 'fa-cloud',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
