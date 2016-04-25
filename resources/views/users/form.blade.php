{!! csrf_field() !!}
<div class="form-group">
	{!! Form::label('name', 'Full Name', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('name', null, ['value'=>'{{ old("name") }}', 'class'=>'form-control']) !!}		
	</div>
</div>

<div class="form-group">
		{!! Form::label('email', 'e-mail', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('email', null, ['value'=>'{{ old("email") }}', 'class'=>'form-control']) !!}		
		</div>
</div>

@if(Request::is('users/create'))
	<div class="form-group">
		{!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
	</div>
@endif

	<div class="form-group">
		{!! Form::label('phone', 'Phone Number', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('phone', null, ['value'=>'{{ old("phone") }}', 'class'=>'form-control']) !!}		
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::select('gender', array('L' => 'Men', 'P' => 'Women'),null,['value'=>'{{ old("gender") }}', 'class'=>'form-control']) !!}

		</div>
	</div>


	<div class="form-group">
		{!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('address', null, ['value'=>'{{ old("address") }}', 'class'=>'form-control']) !!}		
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('state', 'State', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('state', null, ['value'=>'{{ old("state") }}', 'class'=>'form-control']) !!}		
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('country', 'Country', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('country', null, ['value'=>'{{ old("country") }}', 'class'=>'form-control']) !!}		
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('tglLahir', 'Birthday', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('tglLahir', null, ['value'=>'{{ old("tglLahir") }}', 'class'=>'form-control dp1','data-date-viewmode' => 'years','data-date-format'=>'yyyy-mm-dd']) !!}		
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('tempatLahir', 'Birth place', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('tempatLahir', null, ['value'=>'{{ old("tempatLahir") }}', 'class'=>'form-control']) !!}		
		</div>
	</div>

	<div class="form-group">
    {!! Form::label('imgUsrFileName', 'Picture', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    <span class="btn btn-default">
    {!! Form::file('imgUsrFileName', ['value'=>'{{ old("imgUsrFileName") }}']) !!}
    </span>
    </div>
</div>



<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit($submitText, ['class'=>'btn btn-primary']) !!}
	</div>
</div>