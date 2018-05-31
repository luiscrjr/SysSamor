@extends('app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-4">
                            <span class="title"><h4 id="title"></h4></span>
                        </div>
                        <div class="col-sm-1 col-sm-offset-1  form-inline">
                            <a href="/entrevista/nova/<?= $assistido ?>" data-toggle="tooltip" data-placement="top" title="Adicionar entrevista"><i class="glyphicon glyphicon-comment"  style = "font-size: 20px"></i></a>
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
                    @foreach ($entrevistas as $e)
                        <li class="list-group-item">
                            <div class="col-xs-12 col-sm-12">
                                <br>
                                <span><h4><strong>Estado de saúde</strong></h4></span><br>
                                <span><?= $e->estado_saude ?></span><br><br><br>
                                <span><h4><strong>Observações gerais</strong></h4></span><br>
                                <span><h5><?= $e->observacao ?></h5></span><br>
                                <div class="col-sm-offset-9 col-sm-4">
                                    <span class="text-muted" style="text-align:right">Incluído por: <?= $e->usuario ?> em: <?= $e->data_entrevista ?></span><br>
                                </div>

                            </div>
                            <div class="clearfix"><br/></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
	</div>

    <script type="text/javascript">
       $( document ).ready(function() {
            $("#title").replaceWith("<h4 id='title'>Histórico de entrevistas de <strong><?= $e->assistido ?></strong></h4>");
        });
    </script>
@stop

