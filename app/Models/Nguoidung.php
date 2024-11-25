<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
/**
 * Class Nguoidung
 *
 * @property int $nd_id
 * @property string $username
 * @property string $password
 * @property string $nd_hoten
 * @property string $nd_email
 * @property string $nd_sdt
 * @property string $nd_namsinh
 * @property string $nd_diachi
 * @property int $nd_trangthai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Baocao[] $baocaos
 * @property Collection|Binhluan[] $binhluans
 * @property Collection|Donhang[] $donhangs
 * @property Collection|Giohang[] $giohangs
 *
 * @package App\Models
 */
class Nguoidung extends User
{
	protected $table = 'nguoidung';
	protected $primaryKey = 'nd_id';
	public $timestamps = false;

	protected $casts = [
		'nd_trangthai' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'nd_hoten',
		'nd_email',
		'nd_sdt',
		'nd_namsinh',
		'nd_diachi',
		'nd_trangthai'
	];

	public function baocaos()
	{
		return $this->hasMany(Baocao::class, 'nd_id');
	}

	public function binhluans()
	{
		return $this->hasMany(Binhluan::class, 'nd_id');
	}

	public function donhangs()
	{
		return $this->hasMany(Donhang::class, 'nd_id');
	}

	public function giohangs()
	{
		return $this->hasMany(Giohang::class, 'nd_id');
	}
}
