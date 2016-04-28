<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Child;
use App\User;
use App\Acme\Transformers\ChildTransformer;
use App\Http\Requests\ChildRequest;
use Response;

class ChildrenAPIController extends APIController
{
	
	protected $childrenTransformer;
	
	function __construct(ChildTransformer $childrenTransformer){	
		$this->childrenTransformer = $childrenTransformer;
	}
	
	public function index($id = null)
	{
		if($id){
			$children = User::find($id);
			if( ! $children ){
				return $this->respondNotFound('children does not exists');
			}else{
				$children = $children->children;
			}

		}else{
			$children = Child::all();
		}
		

		return Response::json(
			$this->childrenTransformer->transformCollection($children->all())
		, 200);		
	}

	public function upload(Request $request,$id){
		$FileNameFoto = null;
        $PathFoto = null;
        $child = child::find($id);
        if( ! $child ){
			return $this->respondNotFound('Child does not exists');
		}
        if($request->hasFile('FileNameFoto')){
            $FileNameFoto = time().'.'.$request->file('FileNameFoto')->getClientOriginalExtension();
            $PathFoto = '/images/children/' .$FileNameFoto;
            $request->file('FileNameFoto')->move(
                base_path() . '/public/images/children/', $FileNameFoto
            );
            $request['FileNameFoto'] = $FileNameFoto;
            $request['PathFoto'] = $PathFoto;
            $child->update($request->all());
	        return $this->respondCreated('Photo sucessfully uploaded.');
        }else{
        	return $this->respondCreated('Doesnt provide an image.');
        }
        
        
	}
	

	public function show($id, $id2 = null)
	{
		
		$children = $id2 ? User::findOrFail($id)->children->find($id2) : Child::find($id);
	
		if( ! $children ){
			return $this->respondNotFound('children does not exists');
		}
		
		return $this->respond([
			$this->childrenTransformer->transform($children)
		]);

	}

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChildRequest $request, $id)
    {
        $child = child::find($id);
        
        if( ! $child ){
			return $this->respondNotFound('Child does not exists');
		}else{
        	$child->update($request->all());
        	return $this->respondCreated('Child sucessfully updated.');
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $child = child::find($id);
        
        if( ! $child ){
			return $this->respondNotFound('Child does not exists');
		}else{
        	$child->delete();
        	return $this->respondCreated('Child sucessfully deleted.');
    	}
    }

}
