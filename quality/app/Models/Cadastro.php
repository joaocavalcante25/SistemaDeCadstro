<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cadastro
 * 
 * @property int $id
 * @property string $nome
 * @property Carbon $data_nasc
 * @property string $email
 * @property boolean|null $foto
 * @property boolean $status
 * 
 * @property Collection|Dependente[] $dependentes
 *
 * @package App\Models
 */
class Cadastro extends Model
{
	protected $table = 'cadastro';
	public $timestamps = false;

	protected $casts = [
		'foto' => 'boolean'
	];

	protected $dates = [
		'data_nasc'
	];

	protected $fillable = [
		'nome',
		'data_nasc',
		'email',
		'foto',
		'status'
	];

	public function dependentes()
	{
		return $this->hasMany(Dependente::class, 'id_cadastro');
	}
}
