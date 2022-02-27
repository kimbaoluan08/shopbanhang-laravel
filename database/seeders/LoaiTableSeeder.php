<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $types = ["Laptop", "Điện thoại", "TV", "Phụ Kiện", "Đồng hồ"];
        sort($types);

        $today = new DateTime('2021-01-01 08:00:00');

        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'maloai'      => $i,
                'tenloai'     => $types[$i-1],
                'taoMoi'  => $today->format('Y-m-d H:i:s'),
                'capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('loai')->insert($list);

    }
}