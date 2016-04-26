
@extends('app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Detail Profile</div>
		<div class="panel-body">
			<div class="row">
	            <div class="col-md-1"></div>
	            <div class="col-md-3">{{ Html::image($user->imgUsrFilePath,null,['class' => 'img-circle']) }}</div>
	            <div class="col-md-8">
	            	Nama : {{ $user->name }} <br>
					e-mail : {{ $user->email }} <br>
					Phone Number : {{ $user->phone }}	<br>
					Address : {{ $user->address }} <br>
					Gender : {{ $user->gender }} <br>
					State : {{ $user->state }} <br>
					Country : {{ $user->country }} <br>
					Birth Day : {{ $user->tglLahir }} <br>
					Birth Place : {{ $user->tempatLahir }} <br>
	            </div>

	        </div> 
			
		</div>
		<div class="panel-body">
		<div class="panel-heading">Children</div>
			<table class="table" >
			{{--*/ $var = 1 /*--}}
			@foreach( $user->children as $child)
					<tr>
						<td rowspan='5'>{{ Html::image($child->PathFoto,null,['class' => 'img-circle']) }}</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>{{ $child->name }}</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>{{ $child->gender }}</td>
					</tr>
					<tr>
						<td>Height</td>
						<td>{{ $child->height }} &nbsp;cm</td>
					</tr>
					<tr>
						<td>Weight</td>
						<td>{{ $child->weight }} &nbsp;kg</td>
					</tr>
			@endforeach
			</table>
		</div>
		<div class="panel-body">
			<table class="table" ><tr>
			<td align="center"><a class="btn btn-primary" href="{{ url('/users/'. $user->id . '/edit') }}" >Edit Profile</a></td>
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