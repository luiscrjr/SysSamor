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
        
        $files = File::allFiles($_ENV["DOC_STORAGE"].$caminhoRelativo);
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
            //TODO(lr):update em documentos caso o caminho seja vazio
            $caminhoRelativo = DB::select('select documentos from assistidos where id = ?', [$id])[0]->documentos . "\\";

            $caminhoFisico = $_ENV["DOC_STORAGE"];

            $fileExtension = $file->guessExtension();

            $fileName = $fileType . "-" . $pasta . "." . $fileExtension;

            $file->move($caminhoFisico.$caminhoRelativo, $fileName);

            return redirect('/entrevista/nova/'.$id)->with("Sucesso", "Arquivo adicionado com sucesso");
        }
    }

    public function baixaDocumento(){

        $id = Request::route('id');
        $documento = Request::route('documento');

        $caminhoRelativo = DB::select('select documentos from assistidos where id = ?', [$id])[0]->documentos . "\\";

        $caminhoFisico = $_ENV["DOC_STORAGE"];
    
        $headers = [
            'Content-Type' => '',
        ];
    
        return response()->download($caminhoFisico.$caminhoRelativo.$documento, $documento, $headers);
     }

    public function getEstadoPorId(){
        
        $id = Request::route('id');
        //TODO(lr): refatorar buscando o uf direto do objeto DB
        $estados = DB::select('select uf from estados e inner join cidades c on e.id = c.estado where c.id = ?', [$id]);

        $uf = "";

        foreach ($estados as $estado) {
            
            $uf = $estado->uf;
        }

        return \Response::json($uf);
    }
    
}