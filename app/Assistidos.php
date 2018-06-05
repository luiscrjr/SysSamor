<?php namespace samor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assistidos extends Model {

	public $timestamps = false;

	protected $fillable = array('nome', 'rg', 'cpf', 'ctps', 
	'rg', 'escolaridade', 'profissao', 
	'detalhe_profissao', 'estado_civil', 
	'nome_pessoa_indicou', 'titulo_eleitor', 
	'cidade_nascimento', 'familia', 'motivo_rua',
	'data_nascimento', 'eh_desabrigado', 'logradouro', 'bairro', 'cidade');


}
