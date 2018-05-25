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
        //$pasta = date("Ymdhmsu") . "-" . $id;

        
        //TODO(lr): Separar no controller de subir documentos
        //TODO(lr): Verificar se já existe diretório criado antes de criar
        //DB::update('update assistidos set documentos = ? where id = ?', [$pasta, $id]);
        //mkdir("c:\\temp\\" . $pasta);

        //TODO(lr): Criar a DAO apropriada
        $documentos = DB::select('select documentos from assistidos where id = ?', [$id]);

        $caminhoRelativo = "vazio\\";

        foreach ($documentos as $caminho) {
            
            $caminhoRelativo = $caminho->documentos != "" ? $caminho->documentos . "\\" : "vazio\\";
        }
        
        //TODO(lr):Abstrair caminho fisico de downloads
        $files = File::allFiles("C:\\Users\\luis.ribeiro\\samor\\storage\\app\\".$caminhoRelativo);
        $allFiles = array();

        foreach ($files as $file)
        {
             $fileFinal = explode("\\", $file);
             array_push($allFiles,(string) end($fileFinal));                       
        }

        return \Response::json($allFiles);
    }

    public function baixaDocumento(){

        $id = Request::route('id');
        $documento = Request::route('documento');

        $caminhodocumento = DB::select('select documentos from assistidos where id = ?', [$id]);

        $caminhoRelativo = "";

        foreach ($caminhodocumento as $caminho) {
            $caminhoRelativo = $caminho->documentos . "\\";
        }
        
        //TODO(lr):Abstrair caminho fisico de downloads
        $caminhoFisico = "C:\\Users\\luis.ribeiro\\samor\\storage\\app\\";
    
        $headers = [
            'Content-Type' => '',
        ];
    
        return response()->download($caminhoFisico.$caminhoRelativo.$documento, $documento, $headers);
     }
    
}