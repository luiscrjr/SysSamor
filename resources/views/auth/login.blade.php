@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
						
			<div class="panel panel-default">
				<div class="panel-heading"><center><h3>Login no SysSamor</h3></center></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Opa!</strong> Existem alguns problemas com os dados fornecidos.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="/auth/login">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						
						<center><img src="/img/logos/login.png" style="max-width:250px; width: auto;"></img></center>
						<br/><br/>

						<div class="form-group">
							<label class="col-md-3 control-label">E-Mail</label>
							<div class="col-md-7">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Senha</label>
							<div class="col-md-7">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<!-- <div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div> -->
						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button type="submit" class="btn btn-primary btn-block" style="margin-right: 15px;">
									Entrar
								</button>

							<!--	<a href="/password/email">Esqueceu sua senha?</a> -->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
