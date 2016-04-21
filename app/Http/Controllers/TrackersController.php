<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use App\User;
use App\Tracker;
use App\Http\Requests;
use App\Http\Requests\TrackerRequest;

class TrackersController extends Controller
{
    //public function store($id){ 
    // 	    $dataTracker['user_id'] = $id;
    //         $dataTracker['imei'] = '01010101';
    //         $dataTracker['trackerPhone'] = '0888'; 
    //         $dataTracker['balance'] = '999';
    //         $dataTracker['status'] = 'enable';
    //         $dataTracker['user_id'] = $newUser->id;
    //         $newTracker = Tracker::create($dataTracker);
    //     	if($newTracker){
    //             $response = array('success' => 1 );
    //             return Response::json([$response], '201');
    //         }else{
    //             $response = array('trackerSuccess' => 0 );
    //             return Response::json([$response], '401');
    //         }
	
    // }
    public function getSummaryById($id){
	    // create our user data for the authentication
	    $user = User::find($id);
	    if(!is_null($user)){
		    $userdata['name'] = $user->name;
		    $userdata['email'] = $user->email;//Input::get('email');
		    $userdata['address'] = $user->address;//Input::get('password')
		    $userdata['phone'] = $user->phone;

		    
	    	$trackerData = $user->trackers->toArray();
		    if ($trackerData) {
		        // validation successful!
		    	$response['success'][] = '1';
		    	$response['user'][] = $userdata;
		    	$response['tracker'] = $trackerData;// array('success'=>'1','role' => Auth::user()->role);// User::where('email',$userdata['email'])->first()->role );
            	return Response::json($response, '201');
		    } else {        
		        // validation not successful, send back to form 
		        $response = array('success' => '0' );
            	return Response::json($response, '401');
		    }
		//}
    	}else{
    		$response = array('success' => '0' );
            	return Response::json($response, '401');
        }
	}

    public function index()
    {
        $trackers = tracker::all();
        return view('trackers.index', compact('trackers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::lists('name','id');
        return view('trackers.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrackerRequest $request)
    {
        $user = user::find($request['user_id']);
        // $tracker = new tracker($request->all());
        $tracker = $user->trackers()->create($request->all());
        //return $request;
        // tracker::create( $request->all());
        return redirect('trackers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tracker = tracker::findOrFail($id);
        return view('trackers.show', compact('tracker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tracker = tracker::findOrFail($id);    
        // $genre_list = $tracker->genre_list;    
        $users = user::lists('name','id');
        return view('trackers.edit', compact('tracker', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrackerRequest $request, $id)
    {
        $tracker = tracker::findOrFail($id);
        $tracker->update($request->all());
        return redirect('trackers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tracker = tracker::findOrFail($id);
        $tracker->delete();
        return redirect('trackers');
    }
}
