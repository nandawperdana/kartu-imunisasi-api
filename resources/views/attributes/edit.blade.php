
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Edit Attribute</div>
		<div class="panel-body">
			@include('errors.form_error')
			{!! Form::model($attribute, ['method'=>'PATCH','action'=> ['AttributesController@update', $attribute->id], 'class'=>'form-horizontal']) !!}
				@include('attributes.form', ['submitText'=>'Update'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection