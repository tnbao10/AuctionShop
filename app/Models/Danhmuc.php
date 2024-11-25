<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Danhmuc
 *
 * @property int $dm_id
 * @property string $dm_ten
 * @property string $dm_mota
 * @property int $dm_trangthai
 * @property int $ch_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Cuahang $cuahang
 * @property Collection|Sanpham[] $sanphams
 *
 * @package App\Models
 */
class Danhmuc extends Model
{
	protected $table = 'danhmuc';
	protected $primaryKey = 'dm_id';

	protected $casts = [
		'dm_trangthai' => 'int',
		'ch_id' => 'int'
	];

	protected $fillable = [
		'dm_ten',
		'dm_mota',
		'dm_trangthai',
		'ch_id'
	];

	public function cuahang()
	{
		return $this->belongsTo(Cuahang::class, 'ch_id');
	}

	public function sanphams()
	{
		return $this->belongsToMany(Sanpham::class, 'danhmuc_sanpham', 'dm_id', 'sp_id')
					->withPivot('dmsp_id')
					->withTimestamps();
	}
}
