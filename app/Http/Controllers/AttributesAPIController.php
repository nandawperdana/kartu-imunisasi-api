<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use App\Http\Requests\AttributeRequest;
use App\Attribute;
//use App\Book;
use Response;
use App\Acme\Transformers\AttributeTransformer;
use Input;

class AttributesAPIController extends APIController
{
	
	protected $attributeTransformer;
	
	function __construct(AttributeTransformer $attributeTransformer){
		$this->middleware('jwt.auth',['only' => 'store']);		
		$this->attributeTransformer = $attributeTransformer;
	}
	
	public function index()
	{
		$attributes = Attribute::all();
		return Response::json([
			'data' => $this->attributeTransformer->transformCollection($attributes->all())
		], 200);
		
	}
/*
    public function create()
    {
    }*/

    public function store(){
		if( ! Input::get('name') or ! Input::get('gender')){
			return $this->setStatusCode(422)
						->respondWithError('Parameters failed validation for an Attribute.');
		}
		
		Attribute::create(Input::all());
		
		return $this->respondCreated('Attribute sucessfully created.');
		/*return $this->setStatusCode(201)->respond([
			'message' => 'Attribute sucessfully created.',
		]);*/
	}

	public function show($id)
	{
		$attribute = Attribute::find($id);

		if( ! $attribute ){
			return $this->respondNotFound('Attribute does not exists');
		}
		
		return $this->respond([
			'data'=>$this->attributeTransformer->transform($attribute)
		]);
		//return Response::json([
			//'data' => $attribute->toArray()
			//'data' => $this->transform($attribute->toArray())
			//'data'=>$this->attributeTransformer->transform($attribute)
		//], 200);
	}
/*
    public function edit($id)
    {
    }

    public function update(AttributeRequest $request, $id)
    {
    }

    public function destroy($id)
    {
    }*/
	/*
	private function transformCollection($attributes){
		return array_map([$this,'transform'], $attributes->toArray());
	}
	
	private function transform($attribute){
		return[
			'name' => $attribute['name'],
			'gender' => $attribute['gender']
		];
	}*/
}
