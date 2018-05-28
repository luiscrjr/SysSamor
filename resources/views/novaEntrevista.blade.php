@extends('app')

@section('content')
    <div class="row">
    
        <div class="col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <div class="row">
                        <div class="col-sm-10">
                            <span class="title">
                                <center><h4>Nova Entrevista</h4></center></span>
                        </div>
                        <div class="col-sm-1 col-sm-offset-1">
                            
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list-group" id="contact-list">
                            @foreach ($assistidos as $a)
                                <li class="list-group-item">
                                    <div class="col-xs-12 col-sm-3">
                                        <br/>
                                        <img src="/img/default.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
                                    </div>
                                    <div class="col-xs-12 col-sm-7">
                                        <span class="name"><h3><?= $a->nome ?></h3></span>
                                        <div style="margin:7px">
                                            <span class="glyphicon glyphicon-heart" data-toggle="tooltip" title="Estado Civil"></span>
                                            <span><?= $a->estado_civil ?></span>                           
                                        </div>
                                        <div style="margin:7px">
                                            <span class="glyphicon glyphicon-wrench" data-toggle="tooltip" title="Profissão"></span>
                                            <span><?= $a->profissao ?></span>
                                        </div>
                                        <div style="margin:7px">
                                            <span class="glyphicon glyphicon-calendar" data-toggle="tooltip" title="Nascimento"></span>
                                            <span><?= $a->data_nascimento ?></span>
                                        </div>
                                        <div style="margin:7px">
                                            <span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" title="Local dormitório"></span>
                                            <span>Avenida rio Branco, 156 - Centro / Rio de Janeiro </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2">
                                    <br><br>
                                    <!-- <a href="/assistidos/listadocumentos/<?= $a->id ?>" data-toggle="tooltip" data-placement="top" title="Acessar documentos" id="listaDocs"><i class="glyphicon glyphicon-folder-open" aria-hidden="true" style = "font-size: 20px"></i></a> -->
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Acessar documentos" id="listaDocs"><i class="glyphicon glyphicon-folder-open" aria-hidden="true" style = "font-size: 20px"></i></a>
                                    <br><br>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-target="#squarespaceModal" data-placement="top" title="Adicionar novo documento"><i class="glyphicon glyphicon-paperclip" style = "font-size: 20px" data-toggle="tooltip" title="Adicionar novo documento"></i></a>
                                    <br><br>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-target="#squarespaceModal" data-placement="top" title="Visualizar entrevistas"><i class="glyphicon glyphicon-list-alt" style = "font-size: 20px" data-toggle="tooltip" title="Adicionar novo documento"></i></a>
                                    <br><br>   
                                    </div>
                                    <div class="clearfix"><br/></div>
                                </li>
                            @endforeach
                        </ul>
                </div>
                <div class="row">
                <form action="/entrevista/adiciona/<?= $a->id ?>" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">     
                    <div class="col-sm-offset-1 col-sm-10">
                        <br>   
                        <label>Estado de saúde</label>
                        <textarea name="estado_saude" style="height:90px" class="form-control"></textarea>
                        <br/>
                    </div>
                    <div class="col-sm-offset-1  col-sm-10">
                        <br>
                        <label>Anotações Gerais</label>
                        <textarea name="observacao"  style="height:90px" class="form-control" required></textarea>
                        <br/>
                    </div>
                    <div class="col-sm-offset-1  col-sm-10">
                        </br>
                        <button type="submit" class="btn btn-primary btn-block">Salvar entrevista</button>
                        <br/>
                    </div>
                </form>
                </div>
            </div>
        </div>
	</div>

    <script type="text/javascript">

        $("#listaDocs").click(function(){

            $.ajax({
                type: "GET",
                url: "/assistidos/listadocumentos/<?= $a->id ?>",
                dataType: "json", 
                data: {},
                contentType:"application/json; charset=utf-8",
                async: true,
            beforeSend: function(){
                $("#loaderBack").removeClass("hidden");
                $("#loaderBack").addClass("menu");
            },
            success: function(response) {

                var links = "";
                
                if(response.length > 0){
        
                    for(var i=0; i<response.length; i++){
                        links += "<a href='/assistidos/baixadocumento/<?= $a->id ?>/"+response[i]+"'>"+response[i]+"</a><br/>";
                    }
                }
                else{

                    links = "<span class='text-muted'>Opa! Não temos documentos cadastrados para esse assistido ainda.</span>";
                }
                
                $("#loaderBack").removeClass("menu");
                $("#loaderBack").addClass("hidden");
                $("#exampleModalLabel").replaceWith("<center><h4 class='modal-title' id='exampleModalLabel'>Lista de documentos</h5></center>");
                $("#modalContent").replaceWith("<div class='modal-body' id='modalContent'>"+links+"</div>");
                $('#exampleModal').modal('toggle');

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
            }
            });	
            
        })
    </script>

@stop