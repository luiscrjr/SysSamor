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

    public function listaPorAssistido(){
        
        $id = Request::route('id');
        $entrevistas = DB::select('SELECT 
        a.nome assistido, u.name usuario, data_entrevista, estado_saude, observacao
            FROM
                entrevistas e
                    INNER JOIN
                assistidos a ON e.id_assistido = a.id
                    INNER JOIN
                users u ON u.id = e.id_entrevistador
            WHERE
                id_assistido = ?', [$id]);

        if(count($entrevistas)==0){
            return redirect('/assistidos');
        }
        
        return view('listagemEntrevistas')->with('entrevistas', $entrevistas)->with('assistido', $id);
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