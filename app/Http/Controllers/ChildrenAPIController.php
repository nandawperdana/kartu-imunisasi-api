<?php 
namespace App\Http\Controllers;
use App\Child;
use App\User;
use App\Acme\Transformers\ChildTransformer;

class ChildrenAPIController extends APIController
{
	
	protected $childrenTransformer;
	
	function __construct(ChildTransformer $childrenTransformer){	
		$this->childrenTransformer = $childrenTransformer;
	}
	
	public function index($id = null)
	{
		$children = $id ? User::findOrFail($id)->children : Child::all();
		return $this->respond([
			'data' => $this->childrenTransformer->transformCollection($children->all())
		]);
		
	}

	public function show($id, $id2 = null)
	{
		
		$children = $id2 ? User::findOrFail($id)->child()->find($id2) : Child::find($id);
	
		if( ! $children ){
			return $this->respondNotFound('children does not exists');
		}
		
		return $this->respond([
			'data'=>$this->childrenTransformer->transform($children)
		]);

	}

}
