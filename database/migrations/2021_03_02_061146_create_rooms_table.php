<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('room_code')->unique();
            $table->string('name', 50);
            $table->string('thumbnail');
            $table->integer('floor');
            $table->foreignId('category_id');
            $table->integer('price');
            $table->integer('rating')->nullable(); // max 5
            $table->boolean('status'); // 1 = kosong, 0 = diisi
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
        Schema::dropIfExists('rooms');
    }
}
