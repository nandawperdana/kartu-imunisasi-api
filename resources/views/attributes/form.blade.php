{!! csrf_field() !!}
<div class="form-group">
	{!! Form::label('imei', 'Imei', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('imei', null, ['value'=>'{{ old("imei") }}', 'class'=>'form-control']) !!}		
	</div>
</div>

<div class="form-group">
	{!! Form::label('trackerPhone', 'Phone Number', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('trackerPhone', null, ['value'=>'{{ old("trackerPhone") }}', 'class'=>'form-control']) !!}		
	</div>
</div>

<div class="form-group">
	{!! Form::label('balance', 'Balance', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::number('balance', null, ['value'=>'{{ old("balance") }}', 'class'=>'form-control']) !!}		
	</div>
</div>

<div class="form-group">
	{!! Form::label('user_id', 'User', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('user_id', $users, Input::old('user_id'), ['class'=>'form-control']) !!}
	</div>
</div>



<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit($submitText, ['class'=>'btn btn-primary']) !!}
	</div>
</div>