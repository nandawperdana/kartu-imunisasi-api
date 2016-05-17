{!! csrf_field() !!}
@if(Request::is('auth/register'))
	<div class="form-group">
		{!! Form::label('name', 'Full Name', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('name', null, ['value'=>'{{ old("name") }}', 'class'=>'form-control']) !!}		
		</div>
	</div>
@endif

<div class="form-group">
	{!! Form::label('email', 'E-Mail', ['class' => 'col-md-4 control-label']) !!}
	<div class="col-md-6">
		{!! Form::text('email', null, ['value'=>'{{ old("email") }}', 'class'=>'form-control']) !!}
	</div>
</div>

@if(!Request::is('password/email'))
	<div class="form-group">
		{!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
	</div>
@endif

@if(Request::is('auth/register') || Request::is('password/reset'))
	<div class="form-group">
		{!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
		</div>
	</div>
@endif
<!-- @if(Request::is('auth/register'))
	<div class="form-group">
		{!! Form::label('phone', 'Phone Number', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('phone', null, ['value'=>'{{ old("phone") }}', 'class'=>'form-control']) !!}		
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
		<div class="col-md-6">
			{!! Form::text('address', null, ['value'=>'{{ old("address") }}', 'class'=>'form-control']) !!}		
		</div>
	</div>
@endif -->

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		{!! Form::submit($submitText, ['class'=>'btn btn-primary']) !!}
		<a href="{{$login_url}}" class="btn btn-primary">Login with Facebook</a>
	</div>
</div>