<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sanpham
 *
 * @property int $sp_id
 * @property string $sp_ten
 * @property int $sp_soluong
 * @property string $sp_mota
 * @property int $sp_trangthai
 * @property int $ch_id
 * @property int $th_id
 * @property int $lsp_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Cuahang $cuahang
 * @property Collection|Binhluan[] $binhluans
 * @property Collection|Chitietdonhang[] $chitietdonhangs
 * @property Collection|Danhmuc[] $danhmucs
 * @property Collection|Daugia[] $daugia
 *
 * @package App\Models
 */
class Sanpham extends Model
{
	protected $table = 'sanpham';
	protected $primaryKey = 'sp_id';

	protected $casts = [
		'sp_soluong' => 'int',
		'sp_trangthai' => 'int',
		'ch_id' => 'int'
	];

	protected $fillable = [
		'sp_ten',
		'sp_soluong',
        'sp_gia',
		'sp_mota',
		'sp_trangthai',
		'ch_id',
		'lsp_id',
        'th_id'
	];

	public function cuahang()
	{
		return $this->belongsTo(Cuahang::class, 'ch_id');
	}

	public function binhluans()
	{
		return $this->hasMany(Binhluan::class, 'sp_id');
	}

	public function chitietdonhangs()
	{
		return $this->hasMany(Chitietdonhang::class, 'sp_id');
	}

	public function danhmucs()
	{
		return $this->belongsToMany(Danhmuc::class, 'danhmuc_sanpham', 'sp_id', 'dm_id')
					->withPivot('dmsp_id')
					->withTimestamps();
	}

	public function daugia()
	{
		return $this->hasMany(Daugia::class, 'sp_id');
	}

    public function loaisanpham()
	{
		return $this->belongsTo(Loaisanpham::class, 'lsp_id');
	}

    public function thuonghieu()
	{
		return $this->belongsTo(Thuonghieu::class, 'th_id');
	}
}
