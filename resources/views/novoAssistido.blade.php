@extends('principal')

@section('conteudo')
<center><h1>Novo assistido</h1></center>
<div class="row">
    <div class="col-xs-12 col-sm-offset-1 col-sm-10">
        <div class="panel panel-default">
            <div class="row">
            <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                <form action="/produtos/adiciona">
                <div class="form-group">
                    <label>Nome</label>
                    <input name="nome" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Descricao</label>
                    <input name="descricao" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Valor</label>
                    <input name="valor" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade" class="form-control"/>
                </div>
                <button type="submit" 
                    class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop