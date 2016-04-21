
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Edit Owner</div>
		<div class="panel-body">
			@include('errors.form_error')
			{!! Form::model($user, ['method'=>'PATCH','action'=> ['UsersController@update', $user->id], 'class'=>'form-horizontal']) !!}
				@include('users.form', ['submitText'=>'Update Owner'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection