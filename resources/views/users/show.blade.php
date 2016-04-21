
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Detail Owner</div>
		<div class="panel-body">
			Nama : {{ $user->name }} <br>
			e-mail : {{ $user->email }} <br>
			Phone Number : {{ $user->phone }}	<br>
			Address : {{ $user->address }} <br>
		</div>
		<div class="panel-body">
		<div class="panel-heading">Trackers</div>
			<table class="table" >
			{{--*/ $var = 1 /*--}}
			@foreach( $user->trackers as $tracker)
				<tr><td><td>{{$var++}}</td></td></tr>
				<tr><td>imei :</td><td> {{ $tracker->imei }}</td></tr>
				<tr><td>tracker number :</td><td> {{ $tracker->trackerPhone }}</td></tr>
				<tr><td>Balance :</td><td> Rp.{{ $tracker->balance }}</td></tr>
			@endforeach
			</table>
		</div>
		<div class="panel-body">
			<table class="table" ><tr>
			<td align="center"><a class="btn btn-primary" href="{{ url('/users/'. $user->id . '/edit') }}" >Edit Data</a></td>
			<td align="center">{!! Form::open(array('url' => 'users/' . $user->id)) !!}
				{!! Form::hidden('_method', 'DELETE') !!}
				{!! Form::submit('Delete Data', array('class' => 'btn btn-warning')) !!}
			{!! Form::close() !!}
			</td>
			</tr></table>
		</div>
	</div>
</div>

@endsection