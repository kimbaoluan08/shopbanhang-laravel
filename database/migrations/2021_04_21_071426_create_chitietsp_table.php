<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietsp', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('ma_sp');
            $table->string('CPU');
            $table->string('RAM');
            $table->string('manHinh');
            $table->string('doHoa');
            $table->string('Ocung');
            $table->string('Hdh');
            $table->string('trongLuong');
            $table->string('kichThuoc');
            $table->string('xuatXu');
            $table->integer('namSX');
            $table->string('Link_Video');
            $table->text('ThongTinSP');
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
        Schema::dropIfExists('chitietsp');
    }
}
