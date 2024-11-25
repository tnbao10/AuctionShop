<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuahang
 *
 * @property int $ch_id
 * @property string $ch_ten
 * @property string $ch_diachi
 * @property string $ch_thongtin
 * @property string $ch_banner
 * @property string $ch_anhdaidien
 * @property int $ch_trangthai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Baocao[] $baocaos
 * @property Collection|Danhmuc[] $danhmucs
 * @property Collection|Daugium[] $daugia
 * @property Collection|Donhang[] $donhangs
 * @property Collection|Loaisanpham[] $loaisanphams
 * @property Collection|Sanpham[] $sanphams
 * @property Collection|Thuonghieu[] $thuonghieus
 *
 * @package App\Models
 */
class Cuahang extends Model
{
	protected $table = 'cuahang';
	protected $primaryKey = 'ch_id';
	public $timestamps = false;

	protected $fillable = [
        'ch_id',
		'ch_ten',
		'ch_diachi',
		'ch_thongtin',
		'ch_banner',
		'ch_anhdaidien',
		'ch_trangthai',
		'nd_id'
	];

	public function baocaos()
	{
		return $this->hasMany(Baocao::class, 'ch_id');
	}

	public function danhmucs()
	{
		return $this->hasMany(Danhmuc::class, 'ch_id');
	}

	public function daugia()
	{
		return $this->hasMany(Daugium::class, 'ch_id');
	}

	public function donhangs()
	{
		return $this->hasMany(Donhang::class, 'ch_id');
	}

	public function loaisanphams()
	{
		return $this->hasMany(Loaisanpham::class, 'ch_id');
	}

	public function sanphams()
	{
		return $this->hasMany(Sanpham::class, 'ch_id');
	}

	public function thuonghieus()
	{
		return $this->hasMany(Thuonghieu::class, 'ch_id');
	}
}
