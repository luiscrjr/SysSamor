<?php namespace samor\Http\Controllers;

use Illuminate\Support\Facades\DB;
use samor\Assistido;

class AssistidoController extends Controller{

    public function lista(){
        
        $assistidos = DB::select('select * from assistidos');

        return view('listagemAssistidos')->with('assistidos', $assistidos);
    }
}