<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Controllers\Controller;
use App\Http\Requests\ReminderRequest;
use App\Http\Requests\UploadRequest;
use App\Reminder;
//use App\Book;
use Response;
use App\Acme\Transformers\ReminderTransformer;
use Input;

class RemindersAPIController extends APIController
{
	
	protected $reminderTransformer;
	
	function __construct(ReminderTransformer $reminderTransformer){
		$this->middleware('jwt.auth',['only' => ['store','update','destroy','show']]);		
		$this->reminderTransformer = $reminderTransformer;
		//$this->middleware('jwt.refresh');

	}
	
	public function index()
	{
		$reminders = Reminder::all();
		return Response::json(
			$this->reminderTransformer->transformCollection($reminders->all())
		, 200);
		
	}
/*
    public function create()
    {
    }*/

    public function store(ReminderRequest $request){
		if( ! Input::get('name') or ! Input::get('gender')){
			return $this->setStatusCode(422)
						->respondWithError('Parameters failed validation for an Reminder.');
		}
		$reminder = reminder::create($request->all());
		return $this->respondCreated('Reminder sucessfully created.');
		/*return $this->setStatusCode(201)->respond([
			'message' => 'Reminder sucessfully created.',
		]);*/
	}

	public function show($id)
	{
		$reminder = Reminder::find($id);

		if( ! $reminder ){
			return $this->respondNotFound('Reminder does not exists');
		}
		
		return $this->respond([
			$this->reminderTransformer->transform($reminder)
		]);
		//return Response::json([
			//'data' => $reminder->toArray()
			//'data' => $this->transform($reminder->toArray())
			//'data'=>$this->reminderTransformer->transform($reminder)
		//], 200);
	}

	
/*
    public function edit($id)
    {
    }
*/

    public function update(ReminderRequest $request, $id)
    {
    	$reminder = reminder::find($id);
        if( ! $reminder ){
			return $this->respondNotFound('Reminder does not exists');
		}else{
        	$reminder->update($request->all());
        	return $this->respondCreated('Reminder sucessfully updated.');
    	}
    }

    public function destroy($id)
    {
    	$reminder = reminder::find($id);
        if( ! $reminder ){
			return $this->respondNotFound('Reminder does not exists');
		}else{
    		$reminder = reminder::findOrFail($id);
        	$reminder->delete();
        	return $this->respondCreated('Reminder sucessfully deleted.');
    	}
    }
    /*
	private function transformCollection($reminders){
		return array_map([$this,'transform'], $reminders->toArray());
	}
	
	private function transform($reminder){
		return[
			'name' => $reminder['name'],
			'gender' => $reminder['gender']
		];
	}*/
}
