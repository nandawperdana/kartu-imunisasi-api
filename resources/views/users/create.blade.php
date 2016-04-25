
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Add New Owner</div>
		<div class="panel-body">
			@include('errors.form_error')

			{!! Form::open(['url'=>'users', 'class'=>'form-horizontal','files' => true]) !!}
				@include('users.form', ['submitText'=>'Add Parents'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection