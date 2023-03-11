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
        Schema::create('sublimations', function (Blueprint $table) {
            $table->id();
            $table->string('cust_name');
            $table->integer('copy');
            $table->integer('fileh');
            $table->integer('total_meter');
            $table->string('printer');
            $table->string('type_print')->nullable();
            $table->string('date');
            $table->string('designer');
            $table->string('phone_number')->nullable();
            $table->string('who_signed_order');
            $table->text('note')->nullable();
            $table->string('images');
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
        Schema::dropIfExists('sublimations');
    }
};
