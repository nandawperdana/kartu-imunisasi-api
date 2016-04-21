<?php 
namespace App\Http\Controllers;
use App\Tracker;
use App\User;
use App\Acme\Transformers\TrackerTransformer;

class TrackersAPIController extends APIController
{
	
	protected $trackerTransformer;
	
	function __construct(TrackerTransformer $trackerTransformer){	
		$this->trackerTransformer = $trackerTransformer;
	}
	
	public function index($id = null)
	{
		$trackers = $id ? User::findOrFail($id)->trackers : tracker::all();
		
		return $this->respond([
			'data' => $this->trackerTransformer->transformCollection($trackers->all())
		]);
		
	}

	public function show($id, $id2 = null)
	{
		
		$tracker = $id2 ? User::findOrFail($id)->trackers()->find($id2) : tracker::find($id);
	
		if( ! $tracker ){
			return $this->respondNotFound('tracker does not exists');
		}
		
		return $this->respond([
			'data'=>$this->trackerTransformer->transform($tracker)
		]);

	}

}
