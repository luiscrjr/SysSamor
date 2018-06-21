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
                                <label>Foto</label><br><br><br>
                                <div class="col-sm-3" style="width:290px; height:215px;" id="assistidoFoto">
                                    <img src="/img/assistidos/<?= $assistido->id ?>.jpg"></img>
                                    <div style="margin-top:-35px; margin-left:10px;">
                                        <a href="javascript:void(hideOldImg())" id="deletarFoto" class="btn btn-danger btn-circle" style="top:-200px"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Excluir"></span></a>
                                    </div>
                                </div>
                                <div class="col-sm-3" id="divNovaFoto" style="visibility:hidden">
                                    <div id="my_camera" style="width:290px; height:215px;"></div>
                                    <div id="my_result" class="hidden"></div>
                                    <input id="foto" type="hidden" name="foto" value="<?= $assistido->foto ?>"/>
                                    <div style="margin-top:-35px; margin-left:10px;">
                                        <a href="javascript:void(take_snapshot())" id="obterFotoNova" class="btn btn-success btn-circle"><span class="glyphicon glyphicon-ok" data-toggle="tooltip" title="Confirmar"></span></a>
                                        <a href="javascript:void(hideOldImg())" id="deletarFotoNova" class="btn btn-danger btn-circle"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Excluir"></span></a>
                                    </div>
                                    <br/>
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

                                    <?= $firstOption = empty($assistido->cidade_nascimento)?"<option value=''>Selecione a cidade de nascimento</option>":""; ?>
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

                                    <?= $firstOption = empty($assistido->escolaridade)?"<option value=''>Selecione a escolaridade</option>":""; ?>
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
                                
                                    <?= $firstOption = empty($assistido->estado_civil)?"<option value=''>Selecione o estado civil</option>":""; ?>
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

                                    <?= $firstOption = empty($assistido->profissao)?"<option value=''>Selecione a profissao</option>":""; ?>
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
                                    
                                    <?= $firstOption = empty($assistido->cidade)?"<option value=''>Selecione a cidade</option>":""; ?>
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
    $('#deletarFoto').on('click', function(){ 
        $("#exampleModalLabel").replaceWith("<center><h4 class='modal-title' id='exampleModalLabel'>Confirmação</h4></center>");
            $("#modalContent").replaceWith("<div class='modal-body' id='modalContent'><br><center>Deseja realmente excluir a foto atual?</center></div>");            
            $("#modalButtons").replaceWith("<label id='modalButtons'><button type='button' id='modalConfirmar' class='btn btn-primary' data-dismiss='modal'>Confirmar</button><button type='button' id='modalCancelar' class='btn btn-danger' data-dismiss='modal'>Fechar</button></div>");
            $('#exampleModal').modal('toggle');                        
    });

    $('#modalCancelar').on('click', function(){ 
        $("#modalButtons").replaceWith("<label id='modalButtons'><button type='button' id='modalCancelar' class='btn btn-danger' data-dismiss='modal'>Fechar</button></div>");
    });

    $(document).on("click","#modalConfirmar",function() {
        $("#modalButtons").replaceWith("<label id='modalButtons'><button type='button' id='modalCancelar' class='btn btn-danger' data-dismiss='modal'>Fechar</button></div>");
        $("#assistidoFoto").addClass("hidden");
        $("#divNovaFoto").css("visibility","visible");
        webCamFacade();
    });


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