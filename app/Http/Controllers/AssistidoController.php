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
        
        $id = Request::route('id');
        $assistido = Assistidos::find($id);

        return view('listagemAssistidos')->with('assistidos', array($assistido));
    }

    public function novo(){
        
        return view('novoAssistido');
    }

    public function adiciona(){
        
        $params = Request::all();
        $assistido = new Assistidos($params);
        $assistido->save();

        return redirect('/assistidos')->withInput();
    }

    public function mostraDocumentos(){

        $id = Request::route('id');
        
        //TODO(lr): Criar a BLL apropriada 
        $pasta = date("Ymdhmsu") . "-" . $id;

        //TODO(lr): Criar a DAO apropriada
        $documentos = DB::select('select documentos from assistidos where id = ?', [$id]);
        
        DB::update('update assistidos set documentos = ? where id = ?', [$pasta, $id]);
        mkdir("c:\\temp\\" . $pasta);

        return redirect('/assistidos');
    }
}