<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User;
/**
 * Class Quantrivien
 * 
 * @property int $qt_id
 * @property string $username
 * @property string $password
 * @property string $qt_hoten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Quantrivien extends User
{
	protected $table = 'quantrivien';
	protected $primaryKey = 'qt_id';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'qt_hoten'
	];
}
