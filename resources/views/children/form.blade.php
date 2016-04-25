{!! csrf_field() !!}
<div class="form-group">
	{!! Form::label('name', 'Full Name', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('name', null, ['value'=>'{{ old("name") }}', 'class'=>'form-control']) !!}		
	</div>
</div>

<div class="form-group">
	{!! Form::label('height', 'Height (cm)', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('height', null, ['value'=>'{{ old("height") }}', 'class'=>'form-control']) !!}		
	</div>
</div>

<div class="form-group">
	{!! Form::label('weight', 'Weight (kg)', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('weight', null, ['value'=>'{{ old("weight") }}', 'class'=>'form-control']) !!}		
	</div>
</div>

	<div class="form-group">
		{!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('gender', array('L' => 'Men', 'P' => 'Women'),null,['value'=>'{{ old("gender") }}', 'class'=>'form-control']) !!}

		</div>
	</div>


	<div class="form-group">
		{!! Form::label('birthday', 'Birthday', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('birthday', null, ['value'=>'{{ old("birthday") }}', 'class'=>'form-control dp1','data-date-viewmode' => 'years','data-date-format'=>'yyyy-mm-dd']) !!}		
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('birthplace', 'Birth place', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('birthplace', null, ['value'=>'{{ old("birthplace") }}', 'class'=>'form-control']) !!}		
		</div>
	</div>

<div class="form-group">
	{!! Form::label('user_id', 'User', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::select('user_id', $users, Input::old('user_id'), ['class'=>'form-control']) !!}
	</div>
</div>

<div class="form-group">
    {!! Form::label('FileNameFoto', 'Picture', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    <span class="btn btn-default">
    {!! Form::file('FileNameFoto', ['value'=>'{{ old("FileNameFoto") }}']) !!}
    </span>
    </div>
</div>


<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit($submitText, ['class'=>'btn btn-primary']) !!}
	</div>
</div>