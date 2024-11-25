<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietdonhang
 * 
 * @property int $ctdh_id
 * @property int $ctdh_dongia
 * @property int $sp_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Sanpham $sanpham
 *
 * @package App\Models
 */
class Chitietdonhang extends Model
{
	protected $table = 'chitietdonhang';
	protected $primaryKey = 'ctdh_id';

	protected $casts = [
		'ctdh_dongia' => 'int',
		'sp_id' => 'int'
	];

	protected $fillable = [
		'ctdh_dongia',
		'sp_id'
	];

	public function sanpham()
	{
		return $this->belongsTo(Sanpham::class, 'sp_id');
	}
}
