<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Donhang
 * 
 * @property int $dh_id
 * @property int $dh_tongtien
 * @property Carbon $dh_ngaytao
 * @property string $dh_diachi
 * @property string $dh_sdt
 * @property int $dh_trangthai
 * @property int $nd_id
 * @property int $ch_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cuahang $cuahang
 * @property Nguoidung $nguoidung
 *
 * @package App\Models
 */
class Donhang extends Model
{
	protected $table = 'donhang';
	protected $primaryKey = 'dh_id';

	protected $casts = [
		'dh_tongtien' => 'int',
		'dh_trangthai' => 'int',
		'nd_id' => 'int',
		'ch_id' => 'int'
	];

	protected $dates = [
		'dh_ngaytao'
	];

	protected $fillable = [
		'dh_tongtien',
		'dh_ngaytao',
		'dh_diachi',
		'dh_sdt',
		'dh_trangthai',
		'nd_id',
		'ch_id'
	];

	public function cuahang()
	{
		return $this->belongsTo(Cuahang::class, 'ch_id');
	}

	public function nguoidung()
	{
		return $this->belongsTo(Nguoidung::class, 'nd_id');
	}
}
