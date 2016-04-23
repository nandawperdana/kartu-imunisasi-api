
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Add New Vaccine History</div>
		<div class="panel-body">
			@include('errors.form_error')

			{!! Form::open(['url'=>'vaccineHistory', 'class'=>'form-horizontal']) !!}
				@include('vaccineHistories.form', ['submitText'=>'Add History'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection