
@extends('app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Reminders Data</div>
			<div class="panel-body">
				<table class="table table-bordered" >
				<th>No.</th>
				<th>Message</th>
				<th>Age (Month)</th>
				<th>Vaccine</th>
				<th colspan="2" align="center">action</th>
				{{--*/ $var = 1 /*--}}
				@foreach ($reminders as $reminder)	
					<tr>
					<td>{{$var++}}</td>
					<td>{{ $reminder->message }}</td>
					<td> {{ $reminder->month }}</td>
					<td>{{ $reminder->attribute->name }} </td>
					<td align="center"><a class="btn btn-primary" href="{{ url('/reminders/'. $reminder->id . '/edit') }}" >Edit</a></td>
					<td align="center">{!! Form::open(array('url' => 'reminders/' . $reminder->id)) !!}
	                    {!! Form::hidden('_method', 'DELETE') !!}
	                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
	                {!! Form::close() !!}
	                </td></tr>
				@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection