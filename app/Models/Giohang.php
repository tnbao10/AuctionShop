<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Giohang
 * 
 * @property int $gh_id
 * @property string $gh_soluong
 * @property string $gh_dongia
 * @property int $nd_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Nguoidung $nguoidung
 *
 * @package App\Models
 */
class Giohang extends Model
{
	protected $table = 'giohang';
	protected $primaryKey = 'gh_id';

	protected $casts = [
		'nd_id' => 'int'
	];

	protected $fillable = [
		'gh_soluong',
		'gh_dongia',
		'nd_id',
		'gh_ngaythem'
	];

	public function nguoidung()
	{
		return $this->belongsTo(Nguoidung::class, 'nd_id');
	}
}
