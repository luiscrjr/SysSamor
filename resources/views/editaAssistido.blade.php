@extends('app')

@section('content')

<?php
//Buscando SO origem do request

$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");

//Decisão por manter duas versões da view, mobile + desktop
//Mais verbosa e trabalhosa, mais flexível e com menos impactos de manutenção

$isMobile = ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true); 

?>

<!-- View Desktop -->

<!-- <center><h1>Novo assistido</h1></center> -->

<br/>
<div class="row">
    <div class="col-xs-12 col-sm-offset-1 col-sm-10">
        <div class="panel panel-default">
        <div class="panel-heading c-list">
                    <div class="row">
                        <div class="col-sm-10">
                            <span class="title"></span>
                        </div>
                        <div class="col-sm-12">
                            <center><h4>Editar assistido</h4></center>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                    <form action="/assistidos/edita/" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                       
                        <br/><br/>
                        <div class="row">
                            <div class="col-offset-1 col-sm-10">
                                <label>Foto</label>
                                    <div id="my_camera" style="width:290px; height:215px;"></div>
                                    <div id="my_result" style="width:290px; height:215px;"><img src='/img/assistidos/<?= $assistido->id ?>.jpg'></div>
                                    <input id="mydata" type="hidden" name="mydata" value=""/>
                                <br/>
                                <div class="col-sm-6" style="margin-top:-60px; margin-left:1%">
                                    <a href="javascript:void(take_snapshot())" class="btn btn-success btn-circle"><span class="glyphicon glyphicon-ok" data-toggle="tooltip" title="Confirmar"></span></a>
                                    <a href="javascript:void(hideOldImg())" class="btn btn-danger btn-circle"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Excluir"></span></a>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <br/><br/>
                            <div class="col-sm-5">
                                <label>Nome</label>
                                <input name="nome" class="form-control" value="<?= $assistido->nome ?>" required/>
                                <br/>
                            </div>
                            <div class="col-sm-2">
                                <label>Rg</label>
                                <input name="rg" class="form-control" type="Number" value="<?= $assistido->rg ?>" />
                                <br/>
                            </div>
                            <div class="col-sm-2">
                                <label>Cpf</label>
                                <input name="cpf" class="form-control" type="Number" value="<?= $assistido->cpf ?>" />
                                <br/>
                            </div>
                            <div class="col-sm-3">
                                <label>Ctps</label>
                                <input name="ctps" class="form-control" type="Number" value="<?= $assistido->ctps ?>" />
                                <br/>
                            </div>
                            <div class="col-sm-4">
                                <label>Data de Nascimento</label>
                                <input type="date" name="data_nascimento" value="" class="form-control" aria-required="true" aria-invalid="false" placeholder="mm/dd/yyyy">
                                <br/>
                            </div>
                            <div class="col-sm-4">
                                <label>Título de Eleitor</label>
                                <input name="titulo_eleitor" class="form-control" type="Number" value="<?= $assistido->titulo ?>" />
                                <br/>
                            </div>
                            <div class="col-sm-4">
                                <label>Cidade de Nascimento</label>
                                <select name="cidade_nascimento" id="local_nascimento" class="form-control">
                                    @foreach ($cidades as $c)
                                        <?= $cidadeNascSelected = $c->nome == $assistido->cidade_nascimento ? " selected" : ""; ?>
                                        <option <?= $cidadeNascSelected ?> value="<?= $c->nome ?>"><?= $c->nome ?></option>
                                    @endforeach
                                </select>
                                <br/><br/>
                            </div>
                            <div class="col-sm-4">
                                <label>Quem indicou</label>
                                <input name="nome_pessoa_indicou" class="form-control" value="<?= $assistido->nome_pessoa_indicou ?>" />
                                <br/>
                            </div>
                            <div class="col-sm-4">
                                <label>Escolaridade</label>
                                <select name="escolaridade" id="escolaridade" class="form-control">

                                <?php 
                                    $escolaridades = ["Ensino Fundamental", "Ensino Medio", "Ensino Superior", "Ensino Fundamental Incompleto", "Ensino Medio Incompleto", "Ensino Superior Incompleto"]; 
                                ?>
                                @foreach ($escolaridades as $es)
                                    <?= $escolaridadeSelected = $es == $assistido->escolaridade ? " selected" : ""; ?>
                                    <option <?= $escolaridadeSelected ?> value="<?= $es ?>"><?= $es ?></option>
                                @endforeach


                                </select>
                                <br/>
                            </div>
                            <div class="col-sm-4">
                                <label>Estado Civil</label>
                                <select name="estado_civil" id="estado_civil" class="form-control">
                                
                                <?php 
                                    $estadosCivis = ["Solteiro", "Casado", "Separado", "Divorciado", "Viúvo", "Amasiado"]; 
                                ?>
                                @foreach ($estadosCivis as $e)
                                    <?= $estadoCivilSelected = $e == $assistido->estado_civil ? " selected" : ""; ?>
                                    <option <?= $estadoCivilSelected ?> value="<?= $e ?>"><?= $e ?></option>
                                @endforeach
                                    
                                </select>
                                <br/><br/>
                            </div>
                            <div class="col-sm-12">
                                <label>Informações sobre Família</label>
                                <textarea name="familia" class="form-control" value="<?= $assistido->familia ?>" ></textarea>
                                <br/><br/>
                            </div>
                            <div class="col-sm-4">
                                <label>Profissão</label>
                                <select name="profissao" id="profissao" class="form-control">
                                    <option value="">Selecione a Profissão</option>
                                        @foreach ($profissoes as $p)
                                            <?= $profissaoSelected = $p->nome == $assistido->profissao ? " selected" : ""; ?>
                                            <option <?= $profissaoSelected ?> value="<?= $p->nome ?>"><?= $p->nome ?></option>
                                        @endforeach
                                </select>
                                    <br/>
                            </div>
                            <div class="col-sm-8">
                                <label>Detalhamento da profissão</label>
                                <textarea  name="detalhe_profissao" type="text" class="form-control" value="<?= $assistido->detalhe_profissao ?>" ></textarea>
                                <br/><br/>
                            </div>
                            <hr>
                            <center><strong>Endereço atual</strong></center></br></br>
                            <div class="col-sm-4">
                                <label>Logradouro</label>
                                <input name="logradouro" class="form-control" value="<?= $assistido->logradouro ?>" />
                                <br/>
                            </div>
                            <div class="col-sm-3">
                                <label>Bairro</label>
                                <input name="bairro" class="form-control" value="<?= $assistido->bairro ?>" />
                                <br/>
                            </div>
                            <div class="col-sm-4">
                                <label>Cidade</label>
                                <select name="cidade" id="dormitorioCidade" class="form-control">
                                    @foreach ($cidades as $c)
                                        <?= $cidadeSelected = $c->nome == $assistido->cidade ? " selected" : ""; ?>
                                        <option <?= $cidadeSelected ?> value="<?= $c->nome ?>"><?= $c->nome ?></option>
                                    @endforeach
                                </select>
                                <br/>
                            </div>
                            <div class="col-sm-1">
                                <label>Estado</label>
                                <input name="dormitorioEstado" id="dormitorioEstado" class="form-control" readonly="true"/>
                                <br/>
                            </div>
                            <br/><br/><br/><br/><br/>
                            <div class="col-sm-offset-1 col-sm-3">
                                <strong>Mora na rua?</strong>
                                <div class="switch__container">
                                <input id="switch-shadow" class="switch switch--shadow" type="checkbox" name="eh_desabrigado">
                                <label for="switch-shadow"></label>
                                </div>
                                <br/><br/>
                            </div>
                            <div class="col-sm-8 hidden" id="ruaWrapper">
                                <label>Motivo de estar na rua</label>
                                <textarea name="motivo_rua" class="form-control" value="<?= $assistido->motivo_rua ?>" ></textarea>
                                <br/>
                            </div>
                            <div class="col-sm-12">
                                <br/>
                                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                                <br/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/webcam.js"></script>
<script src="/js/jquery3.3.1.js"></script>

<script type="text/javascript">

    $('#switch-shadow').on('change', function(){ // on change of state
        if(this.checked) // if changed state is "CHECKED"
        {
            $('#ruaWrapper').removeClass("hidden");
        }
        else
         {
            $('#ruaWrapper').addClass("hidden");
         }
     })

    $("#dormitorioCidade").change(function(){

        $.ajax({
            type: "GET",
            url: "/assistidos/getEstadoPorId/"+$('option:selected',this).attr('valId'),
            dataType: "json", 
            data: {},
            contentType:"application/json; charset=utf-8",
            async: true,
        success: function(response) {
            var uf = response;                
            $("#dormitorioEstado").val(uf);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
        }
        });	

    })
</script>

<input type="file" accept="image/*" capture="camera" class="btn btn-success btn-circle btn-lg">

@stop