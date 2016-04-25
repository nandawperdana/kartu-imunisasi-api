
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Edit Child</div>
		<div class="panel-body">
			@include('errors.form_error')
			{!! Form::model($child, ['method'=>'PATCH','action'=> ['ChildrenController@update', $child->id], 'class'=>'form-horizontal','files' => true]) !!}
				@include('children.form', ['submitText'=>'Update'])
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection