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
		$childrens = $id ? User::findOrFail($id)->childrens : children::all();
		
		return $this->respond([
			'data' => $this->childrenTransformer->transformCollection($childrens->all())
		]);
		
	}

	public function show($id, $id2 = null)
	{
		
		$children = $id2 ? User::findOrFail($id)->childrens()->find($id2) : children::find($id);
	
		if( ! $children ){
			return $this->respondNotFound('children does not exists');
		}
		
		return $this->respond([
			'data'=>$this->childrenTransformer->transform($children)
		]);

	}

}
