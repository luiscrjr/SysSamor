<?php namespace samor\Http\Controllers;

use Illuminate\Support\Facades\DB;
use samor\Assistido;
use Request;
use samor\Assistidos;
use samor\Cidades;
use samor\Profissoes;
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
        
        $cidades = Cidades::all();
        $profissoes = Profissoes::all();

        return view('novoAssistido')->with('cidades', $cidades)->with('profissoes', $profissoes);
    }

    public function adiciona(){
        
        $params = Request::all();
        $assistido = new Assistidos($params);
        $assistido->save();

        return redirect('/assistidos')->withInput();
    }

    public function listaDocumentos(){

        $id = Request::route('id');

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

    public function enviaDocumento(){
        
        $id = Request::route('id');
        
        //TODO(lr): Criar a BLL apropriada 
        $pasta = date("Ymdhmsu") . "-" . $id;

        //TODO(lr): Verificar se já existe diretório criado antes de criar
        //TODO(lr): Separar métodos de gravação
        //DB::update('update assistidos set documentos = ? where id = ?', [$pasta, $id]);
        //mkdir("c:\\temp\\" . $pasta);

        $file = \Input::file('docUpload'); 

        //TODO(lr): Tratar caracteres em branco
        $fileType = Request::input('tipoDoc');

        if (empty($file)) {
            return redirect('/entrevista/nova/'.$id)->with("Erro", "Erro ao adicionar arquivo");
        }
        else{
            //TODO(lr):Buscar o caminho relativo pelo banco
            $caminhoRelativo = "20180524060556000000-1"."\\";

            $caminhoFisico = "C:\\Users\\luis.ribeiro\\samor\\storage\\app\\";

            $fileExtension = $file->guessExtension();

            $fileName = $fileType . "-" . $pasta . "." . $fileExtension;

            $file->move($caminhoFisico.$caminhoRelativo, $fileName);

            return redirect('/entrevista/nova/'.$id)->with("Sucesso", "Arquivo adicionado com sucesso");
        }
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

    public function getEstadoPorId(){
        
        $id = Request::route('id');
        $estados = DB::select('select uf from estados e inner join cidades c on e.id = c.estado where c.id = ?', [$id]);

        $uf = "";

        foreach ($estados as $estado) {
            
            $uf = $estado->uf;
        }

        return \Response::json($uf);
    }


    
}