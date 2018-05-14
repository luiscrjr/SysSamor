@extends('principal')

@section('conteudo')
    <center><h1>Lista de assistidos</h1></center>
    <div class="row">
        <div class="col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <div class="row">
                        <div class="col-sm-10">
                            <span class="title"></span>
                        </div>
                        <div class="col-sm-1 col-sm-offset-1">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Adicionar Assistido"><i class="glyphicon glyphicon-plus"></i></a>
                        </div>
                    </div>
                </div>                
                <div class="row" style="display: none;">
                    <div class="col-xs-12">
                        <div class="input-group c-search">
                            <input type="text" class="form-control" id="contact-list-search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search text-muted"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
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
                            <a href="/assistidos/listaPorId?id=<?= $a->id ?>" data-toggle="tooltip" data-placement="top" title="Adicionar Assistido"><i class="glyphicon glyphicon-eye-open" style = "font-size: 20px" data-toggle="tooltip" title="Editar"></i></a>
                            <br><br>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Adicionar Assistido"><i class="glyphicon glyphicon-pencil" style = "font-size: 20px" data-toggle="tooltip" title="Editar"></i></a>
                            <br><br>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Adicionar Assistido"><i class="glyphicon glyphicon-trash" style = "font-size: 20px" data-toggle="tooltip" title="Editar"></i></a>
                            </div>
                            <div class="clearfix"><br/></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
	</div>
@stop

