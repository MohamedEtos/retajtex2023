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
        Schema::create('old_order_sublimations', function (Blueprint $table) {
            $table->id();
            $table->string('cust_name')->nullable();
            $table->integer('copy')->nullable();
            $table->integer('fileh')->nullable();
            $table->integer('total_meter')->nullable();
            $table->string('printer')->nullable();
            $table->string('type_print')->nullable();
            $table->string('date')->nullable();
            $table->string('designer')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('who_signed_order')->nullable();
            $table->text('note')->nullable();
            $table->string('images')->nullable();
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
        Schema::dropIfExists('old_order_sublimations');
    }
};
