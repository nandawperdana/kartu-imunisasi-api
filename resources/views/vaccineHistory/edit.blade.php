
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Edit Tracker</div>
		<div class="panel-body">
			@include('errors.form_error')
			{!! Form::model($tracker, ['method'=>'PATCH','action'=> ['TrackersController@update', $tracker->id], 'class'=>'form-horizontal']) !!}
				@include('trackers.form', ['submitText'=>'Update Tracker'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection