<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorPayStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // Status:
    //
    // 1. Paid
    // 2. Cancelled
    // 3. Ended
    //


    public function up()
    {
        Schema::create('vendor_pay_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_pay_statuses');
    }
}
