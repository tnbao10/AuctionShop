<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Daugium
 *
 * @property int $dg_id
 * @property int $dg_giakhoidiem
 * @property int $dg_buocnhay
 * @property int $dg_giamax
 * @property int $sp_id
 * @property int $ch_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Cuahang $cuahang
 * @property Sanpham $sanpham
 * @property Collection|Chitietdaugium[] $chitietdaugia
 *
 * @package App\Models
 */
class Daugia extends Model
{
	protected $table = 'daugia';
	protected $primaryKey = 'dg_id';

	protected $casts = [
		'dg_giakhoidiem' => 'int',
		'dg_buocnhay' => 'int',
		'dg_giamax' => 'int',
		'sp_id' => 'int',
		'ch_id' => 'int'
	];

	protected $fillable = [
        'dg_thoigianbatdau',
        'dg_thoigianketthuc',
		'dg_giakhoidiem',
		'dg_buocnhay',
		'dg_giamax',
		'sp_id',
		'ch_id'
	];

	public function cuahang()
	{
		return $this->belongsTo(Cuahang::class, 'ch_id');
	}

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}

	public function chitietdaugia()
	{
		return $this->hasMany(Chitietdaugium::class, 'dg_id');
	}
}
