<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Binhluan
 * 
 * @property int $bl_id
 * @property string $bl_noidung
 * @property Carbon $bl_ngaytao
 * @property int $nd_id
 * @property int $sp_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Nguoidung $nguoidung
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Binhluan extends Model
{
	protected $table = 'binhluan';
	protected $primaryKey = 'bl_id';

	protected $casts = [
		'nd_id' => 'int',
		'sp_id' => 'int'
	];

	protected $dates = [
		'bl_ngaytao'
	];

	protected $fillable = [
		'bl_noidung',
		'bl_ngaytao',
		'nd_id',
		'sp_id'
	];

	public function nguoidung()
	{
		return $this->belongsTo(Nguoidung::class, 'nd_id');
	}

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}
}
