<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->engine = 'InnoDB';
            $table->bigIncrements('masp')->comment('Mã sản phẩm');
            $table->string('tensp', 191)->comment('Tên sản phẩm # Tên sản phẩm');
            $table->unsignedInteger('giaGoc')->default('0')->comment('Giá gốc # Giá gốc của sản phẩm');
            $table->unsignedInteger('giaBan')->default('0')->comment('Giá bán # Giá bán hiện tại của sản phẩm');
            $table->string('hinh', 200)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->text('thongTin')->comment('Thông tin # Thông tin về sản phẩm');
            $table->string('danhGia', 50)->default('0;0;0;0;0')->comment('Chất lượng # Chất lượng của sản phẩm (1-5 sao), định dạng: 1;2;3;4;5');
            $table->timestamp('taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo sản phẩm');
            $table->timestamp('capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật sản phẩm gần nhất');
            $table->tinyInteger('trangThai')->default('2')->comment('Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng');
            $table->unsignedTinyInteger('maloai')->comment('Loại sản phẩm # l_ma # l_ten # Mã loại sản phẩm');
            
            $table->unique(['tensp']);
            $table->foreign('maloai') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('maloai')->on('loai') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `sanpham` comment 'Sản phẩm # Sản phẩm: hoa'");
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
