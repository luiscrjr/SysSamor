<?php namespace samor\Http\Controllers;

use Illuminate\Support\Facades\DB;
use samor\Assistido;
use Request;
use samor\Assistidos;

class EntrevistaController extends Controller{

    public function listaPorId(){
        
        $id = Request::route('id');
        $assistido = Assistidos::find($id);

        return view('listagemAssistidos')->with('assistidos', array($assistido));
    }

    public function nova(){

        $id = Request::route('id');
        $assistido = Assistidos::find($id);
        
        return view('novaEntrevista')->with('assistidos', array($assistido));
    }

    public function adiciona(){
        
        $params = Request::all();
        $assistido = new Assistidos($params);
        $assistido->save();

        return redirect('/assistidos')->withInput();
    }
}