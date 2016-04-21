
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Add New Tracker</div>
		<div class="panel-body">
			@include('errors.form_error')

			{!! Form::open(['url'=>'trackers', 'class'=>'form-horizontal']) !!}
				@include('trackers.form', ['submitText'=>'Add Tracker'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection