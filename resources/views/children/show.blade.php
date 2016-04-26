
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Detail Profile</div>
		<div class="panel-body">
			<div class="row">
	            <div class="col-md-1"></div>
	            <div class="col-md-3">{{ Html::image($child->PathFoto,null,['class' => 'img-circle']) }}</div>
	            <div class="col-md-8">
					Name :{{ $child->name }} <br>
					Height :{{ $child->height }} <br>
					Weight :{{ $child->weight }} <br>
					Gender :{{ $child->gender }} <br>
					Birthday :{{ $child->birthday }} <br>
					Birth Place :{{ $child->birthplace }} <br>
	            </div>

	        </div> 
			
		</div>
		<div class="panel-body">
		<div class="panel-heading">Vaccine History</div>
			<table class="table" >
			{{--*/ $var = 1 /*--}}
			@foreach( $child->vaccineHistory as $history)
					<tr>
						<td rowspan='4'>{{ $var++ }}</td>
					</tr>
					<tr>
						<td>Vaccine</td>
						<td> {{ $history->attribute->name }} </td>
					</tr>
					<tr>
						<td>Date</td>
						<td> {{ $history->date }} </td>
					</tr>
					<tr>
						<td>Place</td>
						<td> {{ $history->place }} </td>
					</tr>
			@endforeach
			</table>
		</div>
		<div class="panel-body">
			<table class="table" ><tr>
			<td align="center"><a class="btn btn-primary" href="{{ url('/children/'. $child->id . '/edit') }}" >Edit Profile</a></td>
			<td align="center">{!! Form::open(array('url' => 'children/' . $child->id)) !!}
				{!! Form::hidden('_method', 'DELETE') !!}
				{!! Form::submit('Delete Data', array('class' => 'btn btn-warning')) !!}
			{!! Form::close() !!}
			</td>
			</tr></table>
		</div>
	</div>
</div>

@endsection