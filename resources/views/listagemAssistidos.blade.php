@extends('app')

@section('content')
    <div class="row">
    
    @if(old('nome'))
    <script "text/javascript">
        $( document ).ready(function() {
            startToast("Assistido "+ '{{old('nome')}}' + " adicionado com sucesso!");
        })
    </script>
    @endif

     <script "text/javascript">
        $( document ).ready(function() {
            <?= $msg = !empty(session('entrevistaOk'))?"startToast('" . session('entrevistaOk') . "');":""; ?>;
        })
    </script>

        <div class="col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-4">
                            <span class="title"><h3>Lista de Assistidos</h3></span>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1 form-inline" style="padding-top:10px;">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pesquisar Assistido"><i class="glyphicon glyphicon-search" ></i></a>
                            <input type="text" id="assistidoSearch" class="form-control" placeholder="Insira o nome">
                        </div>
                        <div class="col-sm-1" style="padding-top:15px;">
                            <a href="/assistidos/novo" data-toggle="tooltip" data-placement="top" title="Adicionar Assistido"><i class="glyphicon glyphicon-plus"></i></a>
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
                        <li class="list-group-item" id="<?= $a->id ?>">
                            <div class="col-xs-12 col-sm-3">
                                <br/>
                                <img style="width: 85%; height: auto; border-radius: 10px" src="/img/assistidos/<?= $a->id ?>.jpg"/>
                            </div>
                            <div class="col-xs-12 col-sm-7">
                            <br>
                                <span class="assistidoName"><h4><strong><?= $a->nome ?></strong></h4></span>
                                <div style="margin:7px">
                                    <span class="glyphicon glyphicon-heart" data-toggle="tooltip" title="Estado Civil" style="color:red; font-size:19px"></span>
                                    <span><?= $a->estado_civil ?></span>                           
                                </div>
                                <div style="margin:7px">
                                    <span class="glyphicon glyphicon-wrench" data-toggle="tooltip" title="Profissão"  style="color:brown; font-size:19px"></span>
                                    <span><?= $a->profissao ?></span>
                                </div>
                                <div style="margin:7px">
                                    <span class="glyphicon glyphicon-calendar" data-toggle="tooltip" title="Nascimento"  style="color:purple; font-size:19px"></span>
                                    <span><?= $a->data_nascimento ?></span>
                                </div>
                                <div style="margin:7px">
                                    <span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" title="Local dormitório"  style="color:green; font-size:19px"></span>
                                    <span><?= $a->logradouro . ", " . $a->bairro . ", " . $a->cidade ?> </span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-2">
                            <br><br>

                            <?=
                            $userLevel?
                                        ($link = $a->qtd_entrevistas > 0 ? "<a href='/entrevista/listaPorAssistido/" . $a->id ."' data-toggle='tooltip' data-placement='top' title='Visualizar entrevistas'><i class='glyphicon glyphicon-list-alt' style = 'font-size: 20px' data-toggle='tooltip' title='Visualizar entrevistas'></i></a>":
                                        "<a href='/entrevista/nova/" . $a->id ."' data-toggle='tooltip' data-placement='top' title='Adicionar entrevista'><i class='glyphicon glyphicon-comment' style = 'font-size: 20px' data-toggle='tooltip' title='Adicionar entrevista'></i></a>") : "";   
                             ?>
                             
                            <br><br>
                            <a href="#" data-toggle="tooltip" data-placement="top" ><i class="glyphicon glyphicon-pencil" style = "font-size: 20px" data-toggle="tooltip" title="Editar cadastro"></i></a>
                            <br><br>
                            </div>
                            <div class="clearfix"><br/></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
	</div>
    <script type="text/javascript">
        $( "#assistidoSearch" ).keyup(function() {
            var actualInput = $( "#assistidoSearch" ).val();

            $(".assistidoName").each(function(){
                var actualName = $(this).text();
                
                if(actualName.indexOf(actualInput) != -1){
                    $(this).parent().parent().css("display", "block");
                }else{
                    $(this).parent().parent().css("display", "none");
                }
            })
        });
    </script>
    
@stop

