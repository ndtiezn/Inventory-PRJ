<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhapkho extends Model
{
    const     CREATED_AT    = 'nk_taoMoi';
    const     UPDATED_AT    = 'nk_capNhat';
    protected $table        = 'nhapkho';
    protected $fillable     = ['nk_soHoaDon', 'nk_lydo', 'nv_nguoiLapPhieu', 'nk_ngayLapPhieu', 'nk_tongtien', 'nv_thuKho', 'nk_ngayNhapKho', 'nk_taoMoi', 'nk_capNhat', 'nk_trangThai', 'ncc_ma'];
    protected $guarded      = ['nk_ma'];
    protected $primaryKey   = 'nk_ma';
    protected $dates        = ['nk_ngayLapPhieu', 'nk_ngayNhapKho','nk_taoMoi', 'nk_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function nhanviens()
    {
        return $this->belongsTo('App\Nhanvien', 'nv_nguoiLapPhieu', 'nv_ma');
                    
    } 

}
