
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Add New Attribute</div>
		<div class="panel-body">
			@include('errors.form_error')

			{!! Form::open(['url'=>'attributes', 'class'=>'form-horizontal']) !!}
				@include('attributes.form', ['submitText'=>'Add Attributes'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection