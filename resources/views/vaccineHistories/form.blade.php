{!! csrf_field() !!}

<div class="form-group">
	{!! Form::label('child_id', 'Child', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('child_id', $children, Input::old('child_id'), ['class'=>'form-control']) !!}
	</div>
</div>

<div class="form-group">
		{!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('date', null, ['value'=>'{{ old("date") }}', 'class'=>'form-control tglLahir','data-date-format'=>'yyyy-mm-dd']) !!}		
		</div>
	</div>

<div class="form-group">
	{!! Form::label('place', 'Place', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('place', null, ['value'=>'{{ old("place") }}', 'class'=>'form-control']) !!}		
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