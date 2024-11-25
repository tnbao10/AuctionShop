<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hinhanhsanpham
 *
 * @property int $hasp_id
 * @property string $hasp_duongdan
 * @property int $hasp_anhdaidien
 * @property int $hasp_trangthai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Hinhanhsanpham extends Model
{
	protected $table = 'hinhanhsanpham';
	protected $primaryKey = 'hasp_id';

	protected $casts = [
		'hasp_anhdaidien' => 'int',
		'hasp_trangthai' => 'int'
	];

	protected $fillable = [
		'hasp_duongdan',
		'hasp_anhdaidien',
		'hasp_trangthai',
		'sp_id'
	];
}
