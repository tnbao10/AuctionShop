<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaisanpham
 *
 * @property int $lsp_id
 * @property string $lsp_ten
 * @property int $lsp_trangthai
 * @property int $ch_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Cuahang $cuahang
 *
 * @package App\Models
 */
class Loaisanpham extends Model
{
	protected $table = 'loaisanpham';
	protected $primaryKey = 'lsp_id';

	protected $casts = [
		'lsp_trangthai' => 'int',
		'ch_id' => 'int'
	];

	protected $fillable = [
		'lsp_ten',
		'lsp_trangthai',
		'ch_id'
	];

	public function cuahang()
	{
		return $this->belongsTo(Cuahang::class, 'ch_id');
	}
}
