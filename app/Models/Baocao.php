<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Baocao
 * 
 * @property int $bc_id
 * @property string $bc_noidung
 * @property int $ch_id
 * @property int $nd_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cuahang $cuahang
 * @property Nguoidung $nguoidung
 *
 * @package App\Models
 */
class Baocao extends Model
{
	protected $table = 'baocao';
	protected $primaryKey = 'bc_id';

	protected $casts = [
		'ch_id' => 'int',
		'nd_id' => 'int'
	];

	protected $fillable = [
		'bc_noidung',
		'ch_id',
		'nd_id'
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
