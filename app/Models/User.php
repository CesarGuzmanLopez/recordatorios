<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $Telefono
 * @property string|null $Info
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Aviso[] $avisos
 *
 * @package App\Models
 */
class User extends Model implements Authenticatable
{
    use HasRoles;
    use HasPermissions;
    use AuthenticableTrait;

	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
        'lastname',
		'email',
		'email_verified_at',
		'password',
		'telefono',
		'Info',
		'remember_token'
	];

	public function avisos()
	{
		return $this->hasMany(Aviso::class, 'ID_Usuario');
	}
}

