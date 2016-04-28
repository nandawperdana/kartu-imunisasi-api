<?php 
namespace App\Http\Controllers;
use App\VaccineHistory;
use App\Child;
use App\Acme\Transformers\VaccineHistoryTransformer;
use App\Http\Requests\VaccineHistoryRequest;
class VaccineHistoriesAPIController extends APIController
{
	
	protected $vaccineHistoryTransformer;
	
	function __construct(VaccineHistoryTransformer $vaccineHistoryTransformer){	
		$this->vaccineHistoryTransformer = $vaccineHistoryTransformer;
	}
	
	public function index($id = null)
	{
		if($id){
			$vaccineHistory = Child::find($id);
			if( ! $vaccineHistory ){
				return $this->respondNotFound('History does not exists');
			}else{
				$vaccineHistory = $vaccineHistory->vaccineHistory;
			}

		}else{
			$vaccineHistory = VaccineHistory::all();
		}

		return $this->respond(
			$this->vaccineHistoryTransformer->transformCollection($vaccineHistory->all())
		);
		
	}

	public function show($id, $id2 = null)
	{
		
		$vaccineHistory = $id2 ? Child::findOrFail($id)->child()->find($id2) : VaccineHistory::find($id);
	
		if( ! $vaccineHistory ){
			return $this->respondNotFound('vaccineHistory does not exists');
		}
		
		return $this->respond([
			'data'=>$this->vaccineHistoryTransformer->transform($vaccineHistory)
		]);

	}

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VaccineHistoryRequest $request, $id)
    {
        $vaccineHistory = VaccineHistory::find($id);
        
        if( ! $vaccineHistory ){
			return $this->respondNotFound('History does not exists');
		}else{
        	$vaccineHistory->update($request->all());
        	return $this->respondCreated('History sucessfully updated.');
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
        $vaccineHistory = VaccineHistory::find($id);
        
        if( ! $vaccineHistory ){
			return $this->respondNotFound('History does not exists');
		}else{
        	$vaccineHistory->delete();
        	return $this->respondCreated('History sucessfully deleted.');
    	}
    }

}
