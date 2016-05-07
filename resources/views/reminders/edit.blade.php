
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Edit Reminder</div>
		<div class="panel-body">
			@include('errors.form_error')
			{!! Form::model($reminder, ['method'=>'PATCH','action'=> ['RemindersController@update', $reminder->id], 'class'=>'form-horizontal']) !!}
				@include('reminders.form', ['submitText'=>'Update'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection