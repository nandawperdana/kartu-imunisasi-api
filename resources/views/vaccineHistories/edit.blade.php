
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Edit Vaccine History</div>
		<div class="panel-body">
			@include('errors.form_error')
			{!! Form::model($vaccineHistory, ['method'=>'PATCH','action'=> ['VaccineHistoryController@update', $vaccineHistory->id], 'class'=>'form-horizontal']) !!}
				@include('vaccineHistories.form', ['submitText'=>'Update'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection