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
            $table->string('phone_number')->nullable();
            $table->string('path')->nullable();
            $table->longText('note')->nullable();
            $table->longText('pic')->nullable();
            $table->integer('order_status')->default('0');    
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
