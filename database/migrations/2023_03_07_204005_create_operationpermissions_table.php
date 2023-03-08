<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operationpermissions', function (Blueprint $table) {
            $table->id();
            $table->string('cust_name');
            $table->string('ptint_type');
            $table->integer('total_meter');
            $table->string('printer');
            $table->date('date');
            $table->string('designer');
            $table->string('phone_number');
            $table->string('path');
            $table->longText('note');
            $table->longText('pic');
            $table->softDeletes();
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
        Schema::dropIfExists('operationpermissions');
    }
};
