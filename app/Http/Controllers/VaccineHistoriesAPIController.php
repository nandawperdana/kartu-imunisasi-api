<?php 
namespace App\Http\Controllers;
use App\VaccineHistory;
use App\Child;
use App\Acme\Transformers\VaccineHistoryTransformer;

class VaccineHistoriesAPIController extends APIController
{
	
	protected $vaccineHistoryTransformer;
	
	function __construct(VaccineHistoryTransformer $vaccineHistoryTransformer){	
		$this->vaccineHistoryTransformer = $vaccineHistoryTransformer;
	}
	
	public function index($id = null)
	{
		$vaccineHistory = $id ? Child::findOrFail($id)->vaccineHistory : VaccineHistory::all();
		return $this->respond([
			'data' => $this->vaccineHistoryTransformer->transformCollection($vaccineHistory->all())
		]);
		
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

}
