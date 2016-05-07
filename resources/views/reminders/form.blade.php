{!! csrf_field() !!}
<div class="form-group">
	{!! Form::label('message', 'Message', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('message', null, ['value'=>'{{ old("message") }}', 'class'=>'form-control']) !!}		
	</div>
</div>

<div class="form-group">
	{!! Form::label('month', 'Month', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('month', null, ['value'=>'{{ old("month") }}', 'class'=>'form-control']) !!}		
	</div>
</div>



<div class="form-group">
	{!! Form::label('attribute_id', 'Vaccine', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('attribute_id', $attributes, Input::old('attribute_id'), ['class'=>'form-control']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit($submitText, ['class'=>'btn btn-primary']) !!}
	</div>
</div>