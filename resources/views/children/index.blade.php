
@extends('app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Children Data</div>
			<div class="panel-body">
				<table class="table table-bordered" >
				<th>No.</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Height</th>
				<th>Weight</th>
				<th>Parent</th>
				<th colspan="2" align="center">action</th>
				{{--*/ $var = 1 /*--}}
				@foreach ($children as $child)	
					<tr>
					<td>{{$var++}}</td>
					<td>{{ $child->name }}</td>
					<td> {{ $child->gender }}</td>
					<td> {{ $child->height }} &nbsp;cm</td>
					<td> {{ $child->weight }} &nbsp;kg</td>	
					<td>{{ $child->user->name }} </td>
					<!-- <td align="center"><a class="btn btn-primary" href="{{ url('/children', $child->id) }}" >Show Data</a></td> -->
					<td align="center"><a class="btn btn-primary" href="{{ url('/children/'. $child->id . '/edit') }}" >Edit Data</a></td>
					<td align="center">{!! Form::open(array('url' => 'children/' . $child->id)) !!}
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