<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thuonghieu
 *
 * @property int $th_id
 * @property string $th_ten
 * @property int $th_trangthai
 * @property int $ch_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Cuahang $cuahang
 *
 * @package App\Models
 */
class Thuonghieu extends Model
{
	protected $table = 'thuonghieu';
	protected $primaryKey = 'th_id';

	protected $casts = [
		'th_trangthai' => 'int',
		'ch_id' => 'int'
	];

	protected $fillable = [
		'th_ten',
		'th_trangthai',
		'ch_id'
	];

	public function cuahang()
	{
		return $this->belongsTo(Cuahang::class, 'ch_id');
	}
}
