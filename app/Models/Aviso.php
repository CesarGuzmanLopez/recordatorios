<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Aviso
 * 
 * @property int $id
 * @property int $ID_Usuario
 * @property int|null $ID_item
 * @property int $Medio_de_Aviso
 * @property string|null $Descripcion
 * @property Carbon $Fecha_de_recordatorio
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Aviso extends Model
{
	protected $table = 'avisos';

	protected $casts = [
		'ID_Usuario' => 'int',
		'ID_item' => 'int',
		'Medio_de_Aviso' => 'int'
	];

	protected $dates = [
		'Fecha_de_recordatorio'
	];

	protected $fillable = [
		'ID_Usuario',
		'ID_item',
		'Medio_de_Aviso',
		'Descripcion',
		'Fecha_de_recordatorio'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_Usuario');
	}
}
