
@extends('app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Vaccine History Data</div>
			<div class="panel-body">
				<table class="table table-bordered" >
				<th>No.</th>
				<th>Name</th>
				<th>Vaccine</th>
				<th>Date</th>
				<th>Place</th>
				<th colspan="2" align="center">action</th>
				{{--*/ $var = 1 /*--}}
				@foreach ($vaccineHistories as $history)	
					
					<tr>
					<td>{{$var++}}</td>
					<td>{{ $history->child->name }} </td>
					<td>{{ $history->attribute->name }} </td>
					<td>{{ $history->date }}</td>
					<td>{{ $history->place }}</td>
					<!-- <td align="center"><a class="btn btn-primary" href="{{ url('/vaccineHistory', $history->id) }}" >Show Data</a></td> -->
					<td align="center"><a class="btn btn-primary" href="{{ url('/vaccineHistory/'. $history->id . '/edit') }}" >Edit Data</a></td>
					<td align="center">{!! Form::open(array('url' => 'vaccineHistory/' . $history->id)) !!}
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