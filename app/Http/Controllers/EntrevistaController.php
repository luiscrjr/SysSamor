<?php namespace samor\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Carbon\Carbon;
use samor\Assistidos;
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
        
        $params = Request::all();
        $params['id_assistido'] = Request::route('id');
        $params['id_entrevistador'] = \Auth::user()->id;
        $params['data_entrevista'] = date("Y-m-d h:m:s");
       
        $entrevista = new Entrevistas($params);
        $entrevista->save();

        return redirect('/assistidos');
    }
}