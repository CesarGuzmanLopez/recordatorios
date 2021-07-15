<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * 
 * @property int $id
 * @property string|null $Serie
 * @property string|null $Motor
 * @property string|null $placas
 * @property string|null $Descripcion
 * @property float|null $Kilometros
 * @property Carbon|null $Ultimo_mantenimiento
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Item extends Model
{
	protected $table = 'items';

	protected $casts = [
		'Kilometros' => 'float'
	];

	protected $dates = [
		'Ultimo_mantenimiento'
	];

	protected $fillable = [
		'Serie',
		'Motor',
		'placas',
		'Descripcion',
		'Kilometros',
		'Ultimo_mantenimiento'
	];
}
