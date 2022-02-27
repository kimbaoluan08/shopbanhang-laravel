<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->bigIncrements('masp');
            $table->string('tensp', 191);
            $table->unsignedInteger('giaGoc')->default('0');
            $table->unsignedInteger('giaBan')->default('0');
            $table->string('hinh', 200);
            $table->text('thongTin');
            $table->timestamps();
            $table->tinyInteger('trangThai');
            $table->Integer('id_loai');
            $table->Integer('id_hangsx');
            $table->unique(['tensp']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
