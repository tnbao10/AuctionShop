<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Baiviet extends Model
{
	protected $table = 'baiviet';
	protected $primaryKey = 'bv_id';

	protected $casts = [
		'bv_trangthai' => 'int'
	];

	protected $fillable = [
		'bv_tieude',
		'bv_hinhanh',
		'bv_noidung',
		'bv_ngaytao',
		'bv_trangthai',
		'qt_id'
	];

	public function quantrivien()
	{
		return $this->belongsTo(Quantrivien::class, 'qt_id');
	}

}
