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
		$children = $id ? User::find($id) : Child::all();
		if( ! $children ){
			return $this->respondNotFound('children does not exists');
		}else{
			$children = $children->children;
		}

		return $this->respond([
			'data' => $this->childrenTransformer->transformCollection($children->all())
		]);
		
	}

	public function upload($id){
		$FileNameFoto = null;
        $PathFoto = null;
        if($request->hasFile('FileNameFoto')){
            $FileNameFoto = time().'.'.$request->file('FileNameFoto')->getClientOriginalExtension();
            $PathFoto = '/images/children/' .$FileNameFoto;
            $request->file('FileNameFoto')->move(
                base_path() . '/public/images/children/', $FileNameFoto
            );
            $request['FileNameFoto'] = $FileNameFoto;
            $request['PathFoto'] = $PathFoto;
        }
        $child = child::findOrFail($id);
        $child->update($request->all());
        return $this->respondCreated('Photo sucessfully uploaded.');
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
