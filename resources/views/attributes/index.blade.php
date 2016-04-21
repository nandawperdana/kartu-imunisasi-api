
@extends('app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Tracker Data</div>
			<div class="panel-body">
				<table class="table table-bordered" >
				<th>No.</th>
				<th>imei</th>
				<th>phone number</th>
				<th>balance</th>
				<th>User</th>
				<th colspan="2" align="center">action</th>
				{{--*/ $var = 1 /*--}}
				@foreach ($trackers as $tracker)	
					<tr>
					<td>{{$var++}}</td>
					<td>{{ $tracker->imei }}</td>
					<td> {{ $tracker->trackerPhone }}</td>
					<td> {{ $tracker->balance }}</td>
					<td>{{ $tracker->user->name }} </td>
					<!-- <td align="center"><a class="btn btn-primary" href="{{ url('/trackers', $tracker->id) }}" >Show Data</a></td> -->
					<td align="center"><a class="btn btn-primary" href="{{ url('/trackers/'. $tracker->id . '/edit') }}" >Edit Data</a></td>
					<td align="center">{!! Form::open(array('url' => 'trackers/' . $tracker->id)) !!}
	                    {!! Form::hidden('_method', 'DELETE') !!}
	                    {!! Form::submit('Delete Data', array('class' => 'btn btn-warning')) !!}
	                {!! Form::close() !!}
	                </td></tr>
				@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection