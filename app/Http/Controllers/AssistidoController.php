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
        
        //TODO(lr): Criar a DAO apropriada
        $assistidos = DB::select("SELECT 
                                    id,
                                    nome,
                                    foto,
                                    documentos,
                                    escolaridade,
                                    profissao,
                                    detalhe_profissao,
                                    estado_civil,
                                    rg,
                                    cpf,
                                    ctps,
                                    titulo_eleitor,
                                    cidade_nascimento,
                                    local_dormitorio,
                                    familia,
                                    motivo_rua,
                                    nome_pessoa_indicou, 
                                    data_nascimento, 
                                    eh_desabrigado, 
                                    data_eh_desabrigado, 
                                    logradouro, bairro, 
                                    cidade,
                                    count(e.id_entrevistador) qtd_entrevistas
                                FROM
                                    assistidos a
                                        LEFT JOIN
                                    entrevistas e ON e.id_assistido = a.id
                                    GROUP BY a.id
                                ORDER BY a.nome");

        $userLevel = \Auth::user()->level;

        return view('listagemAssistidos')->with('assistidos', $assistidos)->with('userLevel', $userLevel);
    }

    public function verPorId(){
        
        $id = Request::route('id');
        $assistido = Assistidos::find($id);
        $cidades = Cidades::all();
        $profissoes = Profissoes::all();

        return view('editaAssistido')->with('assistido', $assistido)->with('cidades', $cidades)->with('profissoes', $profissoes);
    }

    public function novo(){
        
        $cidades = Cidades::all();
        $profissoes = Profissoes::all();

        return view('novoAssistido')->with('cidades', $cidades)->with('profissoes', $profissoes);
    }

    public function altera(){
        
        $params = Request::all();
        $assistido = new Assistidos($params);
        $assistido->save();

        return redirect('/assistidos')->with('status', 'Assistido alterado com sucesso!');
    }

    public function adiciona(){
        
        $params = Request::all();
        $assistido = new Assistidos($params);
        $assistido->save();

        //TODO(lr): Mover para a camada de serviços apropriada
        $assistidoId = DB::select('select LAST_INSERT_ID() lastId')[0]->lastId;

        $binary_photo = base64_decode(Request::input('mydata'));
        $result = file_put_contents( 'img/assistidos/'.$assistidoId.'.jpg', $binary_photo );

        return redirect('/assistidos')->withInput();
    }

    public function listaDocumentos(){

        $id = Request::route('id');

        //TODO(lr): Criar a DAO apropriada
        $documentos = DB::select('select documentos from assistidos where id = ?', [$id]);
    
        $caminhoRelativo = $documentos[0]->documentos != "" ? $documentos[0]->documentos . "\\" : "vazio\\";
        
        //TODO(lr): Criar a camada de serviços apropriada
        $files = File::allFiles(env("DOC_STORAGE").$caminhoRelativo);
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
        
        $pasta = date("Ymdhmsu") . "-" . $id;
        
        //TODO(lr): Separar métodos de gravação
        $caminhoRelativo = DB::select('select documentos from assistidos where id = ?', [$id])[0]->documentos;

        if(empty($caminhoRelativo)){
            DB::update('update assistidos set documentos = ? where id = ?', [$pasta, $id]);
            mkdir(env("DOC_STORAGE") . $pasta);
            $caminhoRelativo = $pasta;
        }

        $file = \Input::file('docUpload'); 

        //TODO(lr): Tratar caracteres em branco
        $fileType = Request::input('tipoDoc');

        if (empty($file)) {
            return redirect('/entrevista/nova/'.$id)->with("Erro", "Erro ao adicionar arquivo");
        }
        else{

            $caminhoRelativo .= "\\";

            $fileExtension = $file->guessExtension();

            $fileName = $fileType . "-" . $pasta . "." . $fileExtension;

            $file->move(env("DOC_STORAGE").$caminhoRelativo, $fileName);

            return redirect('/entrevista/nova/'.$id)->with('status', 'Documento adicionado com sucesso!');
        }
    }

    public function baixaDocumento(){

        $id = Request::route('id');
        $documento = Request::route('documento');

        $caminhoRelativo = DB::select('select documentos from assistidos where id = ?', [$id])[0]->documentos . "\\";

        $caminhoFisico = env("DOC_STORAGE");
    
        $headers = [
            'Content-Type' => '',
        ];
    
        return response()->download($caminhoFisico.$caminhoRelativo.$documento, $documento, $headers);
     }

    public function getEstadoPorId(){
        
        $id = Request::route('id');

        $uf = DB::select('select uf from estados e inner join cidades c on e.id = c.estado where c.id = ?', [$id])[0]->uf;

        return \Response::json($uf);
    }
    
}