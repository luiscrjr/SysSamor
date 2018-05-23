@extends('app')

@section('content')
    <center><h1>Nova Entrevista</h1></center>
    <div class="row">
    
        <div class="col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <div class="row">
                        <div class="col-sm-10">
                            <span class="title"></span>
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
                                        <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens" class="img-responsive img-circle" />
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
                                    <a href="/entrevista/nova/<?= $a->id ?>" data-toggle="tooltip" data-placement="top" title="Acessar documentos"><i class="glyphicon glyphicon-folder-open" aria-hidden="true" style = "font-size: 20px"></i></a>
                                    <br><br>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Adicionar novo documento"><i class="glyphicon glyphicon-paperclip" style = "font-size: 20px" data-toggle="tooltip" title="Adicionar novo documento"></i></a>
                                    <br><br>
                                    </div>
                                    <div class="clearfix"><br/></div>
                                </li>
                            @endforeach
                        </ul>
                </div>
                <div class="row">
                <form action="/entrevista/adiciona/<?= $a->id ?>" method="post">
                    <div class="col-sm-offset-1 col-sm-10">
                        <br>   
                        <label>Estado de saúde</label>
                        <textarea name="estadoSaude" style="height:90px" class="form-control"/></textarea>
                        <br/>
                    </div>
                    <div class="col-sm-offset-1  col-sm-10">
                        <br>
                        <label>Anotações Gerais</label>
                        <textarea name="anotacoes"  style="height:90px" class="form-control"/></textarea>
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
@stop