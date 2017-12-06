<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMemberProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member_profiles', function(Blueprint $table){
            $table->string('country', 255)->nullable();
            $table->float('gps_lat', 18,15)->default(0);
            $table->float('gps_lng', 18, 15)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_profiles', function (Blueprint $table) {
            $table->dropColumn('country');
            $table->dropColumn('gps_lat');
            $table->dropColumn('gps_lng');
        });
    }
}
