<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_comments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('item_id'); // ID barang (found/lost item)
            $table->string('item_type'); // Tipe barang (found/lost)
            $table->unsignedBigInteger('user_id'); // ID pengguna yang berkomentar
            $table->text('comment'); // Isi komentar
            $table->unsignedBigInteger('parent_id')->nullable(); // Kolom untuk komentar balasan
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key untuk user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Foreign key untuk parent_id (balasan)
            $table->foreign('parent_id')->references('id')->on('user_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_comments');
    }
}
