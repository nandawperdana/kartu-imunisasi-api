
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Add New Child</div>
		<div class="panel-body">
			@include('errors.form_error')

			{!! Form::open(['url'=>'children', 'class'=>'form-horizontal']) !!}
				@include('children.form', ['submitText'=>'Add Child'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection