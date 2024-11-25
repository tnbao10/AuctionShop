<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DanhmucSanpham
 * 
 * @property int $dmsp_id
 * @property int $dm_id
 * @property int $sp_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Danhmuc $danhmuc
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class DanhmucSanpham extends Model
{
	protected $table = 'danhmuc_sanpham';
	protected $primaryKey = 'dmsp_id';

	protected $casts = [
		'dm_id' => 'int',
		'sp_id' => 'int'
	];

	protected $fillable = [
		'dm_id',
		'sp_id'
	];

	public function danhmuc()
	{
		return $this->belongsTo(Danhmuc::class, 'dm_id');
	}

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}
}
