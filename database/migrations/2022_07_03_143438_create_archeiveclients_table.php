<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArcheiveclientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archeiveclients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('country');
            $table->string('email');
            $table->integer('nemployees');
            $table->unsignedBigInteger('setting_id');
            $table->foreign('setting_id')->references('id')->on('settings')->cascadeOnDelete();
            $table->integer('status')->default(1);
            $table->string('created_at_str')->nullable();
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
        Schema::dropIfExists('archeiveclients');
    }
}
