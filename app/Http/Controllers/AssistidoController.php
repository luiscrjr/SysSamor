<?php namespace samor\Http\Controllers;

use Illuminate\Support\Facades\DB;
use samor\Assistido;
use Request;

class AssistidoController extends Controller{

    public function lista(){
        
        $assistidos = DB::select('select * from assistidos');

        return view('listagemAssistidos')->with('assistidos', $assistidos);
    }

    public function listaPorId(){
        
        $id = Request::input('id');
        $assistidos = DB::select('select * from assistidos where id = ?', [1]);

        return view('listagemAssistidos')->with('assistidos', $assistidos);
    }

    public function novo(){
        
        return view('novoAssistido');
    }
}