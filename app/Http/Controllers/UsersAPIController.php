<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use App\Http\Requests\UserRequest;
use App\User;
//use App\Book;
use Response;
use App\Acme\Transformers\UserTransformer;
use Input;

class UsersAPIController extends APIController
{
	
	protected $userTransformer;
	
	function __construct(UserTransformer $userTransformer){
		$this->middleware('jwt.auth',['only' => 'store']);		
		$this->userTransformer = $userTransformer;
	}
	
	public function index()
	{
		$users = User::all();
		return Response::json([
			'data' => $this->userTransformer->transformCollection($users->all())
		], 200);
		
	}
/*
    public function create()
    {
    }*/

    public function store(){
		if( ! Input::get('name') or ! Input::get('gender')){
			return $this->setStatusCode(422)
						->respondWithError('Parameters failed validation for an User.');
		}
		
		User::create(Input::all());
		
		return $this->respondCreated('User sucessfully created.');
		/*return $this->setStatusCode(201)->respond([
			'message' => 'User sucessfully created.',
		]);*/
	}

	public function show($id)
	{
		$user = User::find($id);

		if( ! $user ){
			return $this->respondNotFound('User does not exists');
		}
		
		return $this->respond([
			'data'=>$this->userTransformer->transform($user)
		]);
		//return Response::json([
			//'data' => $user->toArray()
			//'data' => $this->transform($user->toArray())
			//'data'=>$this->userTransformer->transform($user)
		//], 200);
	}
/*
    public function edit($id)
    {
    }

    public function update(UserRequest $request, $id)
    {
    }

    public function destroy($id)
    {
    }*/
	/*
	private function transformCollection($users){
		return array_map([$this,'transform'], $users->toArray());
	}
	
	private function transform($user){
		return[
			'name' => $user['name'],
			'gender' => $user['gender']
		];
	}*/
}
