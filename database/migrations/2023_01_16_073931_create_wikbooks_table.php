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
        Schema::create('wikbooks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('writter');
            $table->string('publisher');
            $table->string('isbn');
            $table->longText('synopsis', 64);
            $table->string('cover_book');
            $table->string('category_name');
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
        if (Schema::hasColumn('wikbook', 'cover_book')){
            $table->dropColum('cover_book');
        }
    }
};
