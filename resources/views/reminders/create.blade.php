
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Add New Reminder</div>
		<div class="panel-body">
			@include('errors.form_error')

			{!! Form::open(['url'=>'reminders', 'class'=>'form-horizontal']) !!}
				@include('reminders.form', ['submitText'=>'Add Reminder'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection