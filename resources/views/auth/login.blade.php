@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@include('errors.form_error')

					{!! Form::open(['url'=>'/auth/login', 'class'=>'form-horizontal']) !!}
						@include('auth.form', ['submitText'=>'Login'])
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection