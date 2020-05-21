<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReaderBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reader_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBigInteger('book_code_id');
            $table->foreign('book_code_id')->references('id')->on('book_codes')->onDelete('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('reader_id');
            $table->foreign('reader_id')->references('id')->on('readers')->onDelete('cascade')->onUpdate('cascade');
            $table->date('given_date')->nullable();
            $table->date('taken_date')->nullable();

            $table->enum('status', ['given', 'taken', 'paid'])->default('given');
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
        Schema::dropIfExists('reader_books');
    }
}
