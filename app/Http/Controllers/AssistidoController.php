<?php namespace samor\Http\Controllers;

use Illuminate\Support\Facades\DB;
use samor\Assistido;
use Request;
use samor\Assistidos;

class AssistidoController extends Controller{

    public function lista(){
        
        $assistidos = Assistidos::all();

        return view('listagemAssistidos')->with('assistidos', $assistidos);
    }

    public function listaPorId(){
        
        $id = Request::input('id');
        $assistidos = DB::select('select * from assistidos where id = ?', [$id]);

        return view('listagemAssistidos')->with('assistidos', $assistidos);
    }

    public function novo(){
        
        return view('novoAssistido');
    }

    public function adiciona(){
        
        $nome = Request::input('nome');
        $foto = "";
        $documentos = "";
        $escolaridade = "";
        $profissao = "";
        $detalhe_profissao = "";
        $estado_civil = "";
        $rg = "";
        $cpf = "";
        $ctps = "";
        $titulo_eleitor = "";
        $local_nascimento = "";
        $local_dormitorio = "";
        $familia = "";
        $motivo_rua = "";
        $id_endereco = "";
        $nome_pessoa_indicou = "";
        $data_nascimento = "";
        $eh_desabrigado = "";
        $data_eh_desabrigado = "";

        $assistidos = DB::insert('insert into assistidos values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [$nome, $foto, $documentos, $escolaridade, $profissao, $detalhe_profissao, $estado_civil, $rg, $cpf, $ctps, $titulo_eleitor, $local_nascimento, 
        $local_dormitorio, $familia, $motivo_rua, $id_endereco, $nome_pessoa_indicou, $data_nascimento, $eh_desabrigado, $data_eh_desabrigado]);

        return redirect('/assistidos')->withInput();
    }
}