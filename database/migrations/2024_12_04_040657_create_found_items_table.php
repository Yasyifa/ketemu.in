<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundItemsTable extends Migration
{
    public function up()
    {
        Schema::create('found_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->text('description');
            $table->string('phone_number');
            $table->string('current_location');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('found_items');
    }
}
