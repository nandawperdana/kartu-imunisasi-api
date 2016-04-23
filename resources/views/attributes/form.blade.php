{!! csrf_field() !!}
<div class="form-group">
	{!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('name', null, ['value'=>'{{ old("name") }}', 'class'=>'form-control']) !!}		
	</div>
</div>

<div class="form-group">
	{!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('type', null, ['value'=>'{{ old("type") }}', 'class'=>'form-control']) !!}		
	</div>
</div>


<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit($submitText, ['class'=>'btn btn-primary']) !!}
	</div>
</div>