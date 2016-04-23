
@extends('app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Attributes Data</div>
			<div class="panel-body">
				<table class="table table-bordered" >
				<th>No.</th>
				<th>Name</th>
				<th>Type</th>
				<th colspan="2" align="center">action</th>
				{{--*/ $var = 1 /*--}}
				@foreach ($attributes as $attribute)	
					<tr>
					<td>{{$var++}}</td>
					<td>{{ $attribute->name }}</td>
					<td> {{ $attribute->type }}</td>
					<!-- <td align="center"><a class="btn btn-primary" href="{{ url('/attributes', $attribute->id) }}" >Show Data</a></td> -->
					<td align="center"><a class="btn btn-primary" href="{{ url('/attributes/'. $attribute->id . '/edit') }}" >Edit Data</a></td>
					<td align="center">{!! Form::open(array('url' => 'attributes/' . $attribute->id)) !!}
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