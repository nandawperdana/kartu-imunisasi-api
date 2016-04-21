@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Change Password</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@include('errors.form_error')

					{!! Form::open(['url'=>'/users/password/changes', 'class'=>'form-horizontal']) !!}
						@include('auth.form', ['submitText'=>'Change Password'])
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
