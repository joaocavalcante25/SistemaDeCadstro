<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dependente
 * 
 * @property int $id
 * @property string $nome
 * @property Carbon $data_nasc_dep
 * @property int $id_cadastro
 * 
 * @property Cadastro $cadastro
 *
 * @package App\Models
 */
class Dependente extends Model
{
	protected $table = 'dependente';
	public $timestamps = false;

	protected $casts = [
		'id_cadastro' => 'int'
	];

	protected $dates = [
		'data_nasc_dep'
	];

	protected $fillable = [
		'nome',
		'data_nasc_dep',
		'id_cadastro'
	];

	public function cadastro()
	{
		return $this->belongsTo(Cadastro::class, 'id_cadastro');
	}
}
