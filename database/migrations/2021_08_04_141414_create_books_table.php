<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 60);
            $table->string('penulis', 60);
            $table->string('photo');
            $table->integer('categories_id');
            $table->string('thn_terbit');
            $table->string('tgl_beli');
            $table->integer('jml_halaman');
            $table->string('ulasan')->nullable();
            $table->integer('nilai');
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
        Schema::dropIfExists('books');
    }
}
