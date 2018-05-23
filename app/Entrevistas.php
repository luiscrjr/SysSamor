<?php namespace samor;

use Illuminate\Database\Eloquent\Model;

class Entrevistas extends Model {

	public $timestamps = false;

	protected $fillable = array('id_entrevistador', 'id_assistido', 'data_entrevista', 'estado_saude', 
	'observacao');

}
