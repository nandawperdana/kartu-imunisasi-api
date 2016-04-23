
@extends('app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Parent Data</div>
			<div class="panel-body">
				<table class="table table-bordered" >
				<th>No.</th>
				<th>Name</th>
				<th>e-mail</th>
				<th>Phone Number</th>
				<th>Address</th>
				<th colspan="3" align="center">action</th>
				{{--*/ $var = 1 /*--}}
				@foreach ($users as $user)	
					<tr>
					<td>{{$var++}}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->phone }}</td>
					<td>{{ $user->address }}</td>
					<td align="center"><a class="btn btn-primary" href="{{ url('/users', $user->id) }}" >Detail</a></td>
					<td align="center"><a class="btn btn-primary" href="{{ url('/users/'. $user->id . '/edit') }}" >Edit</a></td>
					<td align="center">{!! Form::open(array('url' => 'users/' . $user->id)) !!}
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