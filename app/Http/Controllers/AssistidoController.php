<?php namespace samor\Http\Controllers;

use Illuminate\Support\Facades\DB;
use samor\Assistido;
use Request;
use samor\Assistidos;
use Illuminate\Support\Facades\File;

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

    public function listaDocumentos(){

        $id = Request::route('id');
        
        //TODO(lr): Criar a BLL apropriada 
        $pasta = date("Ymdhmsu") . "-" . $id;

        //TODO(lr): Criar a DAO apropriada
        $documentos = DB::select('select documentos from assistidos where id = ?', [$id]);
        
        //TODO(lr): Separar no controller de subir documentos
        //TODO(lr): Verificar se já existe diretório criado antes de criar
        //DB::update('update assistidos set documentos = ? where id = ?', [$pasta, $id]);
        //mkdir("c:\\temp\\" . $pasta);

        $files = File::allFiles("C:\Users\luis.ribeiro\samor\storage\app");
        $allFiles = array();

        foreach ($files as $file)
        {
            array_push($allFiles,(string)$file);             
        }

        return \Response::json($allFiles);
    }

    public function baixaDocumento(){

        // any custom logic
    
       //check if user is logged in or user have permission to download this file etc
    
    
        $headers = [
            'Content-Type' => 'image/png',
        ];
    
        return response()->download(storage_path('app/example.png'), 'filename.jpeg', $headers);
     }
    
}