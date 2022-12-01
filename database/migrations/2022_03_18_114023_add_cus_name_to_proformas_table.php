<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCusNameToProformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proformas', function (Blueprint $table) {
            $table->string('cus_name')->nullable();
            $table->string('cus_name_ar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proformas', function (Blueprint $table) {
            $table->dropColumn('cus_name');
            $table->dropColumn('cus_name_ar');
        });
    }
}
