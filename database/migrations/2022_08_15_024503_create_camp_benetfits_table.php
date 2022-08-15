<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampBenetfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_benetfits', function (Blueprint $table) {
            $table->id();
            // Second Method
            $table->foreignId('camp_id')->constrained();
            // // First Method Forigen Key
            // $table->unsignedBigInteger('camp_id');
            $table->string('name');
            $table->timestamps();
            // // First Method Forigen Key
            // $table->foreign('camp_id')->references('id')->on('camps')->onUpdate('cascade')->onDelete('cascade')

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camp_benetfits');
    }
}
