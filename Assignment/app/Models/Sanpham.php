<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sanpham extends Model
{
    use HasFactory;
    //Cách 1: Sử dụng Query Buider
    protected $fillable = [
        'hinh_anh',
        'ten_san_pham',
        'so_luong',
        'gia',
        'ngay_nhap',
        'mo_ta',
        'danh_muc_id'
    ];

    public $table = 'san_phams';

    public $timestamp = false;

    public function getAll()
    {
        $data = DB::table('san_phams')
            ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
            ->select("san_phams.*", 'danh_mucs.ten_danh_muc')
            ->orderBy('san_phams.id', 'DESC')
            ->get();
        return $data;
    }
    public function createSanPham($data)
    {
        DB::table('san_phams')->insert(
            [
                'hinh_anh' => $data['hinh_anh'],
                'ten_san_pham' => $data['ten_san_pham'],
                'so_luong' => $data['so_luong'],
                'gia' => $data['gia'],
                'ngay_nhap' => $data['ngay_nhap'],
                'mo_ta' => $data['mo_ta'],
                'danh_muc_id' => $data['danh_muc_id'],
            ]
        );
        // DB::table('san_phams')->insert($data);
    }

    public function updateSanPham($data, $id)
    {
        DB::table('san_phams')
            ->where('id', $id)
            ->update($data);
    }
}
