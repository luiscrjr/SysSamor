<?php namespace samor\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use samor\Entrevistas;

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
        
        $id_assistido = Request::route('id');
        $id_usuario = Auth::user()->id;
        dd($id_usuario);
        $assistido = new Assistidos($params);
        $assistido->save();

        return redirect('/assistidos')->withInput();
    }
}