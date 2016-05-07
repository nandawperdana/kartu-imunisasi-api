<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use App\User;
use App\Child;
use App\Http\Requests;
use App\Http\Requests\ChildRequest;

class ChildrenController extends Controller
{
    
    public function getSummaryById($id){
	    // create our user data for the authentication
	    $user = User::find($id);
	    if(!is_null($user)){
		    $userdata['name'] = $user->name;
		    $userdata['email'] = $user->email;//Input::get('email');
		    $userdata['address'] = $user->address;//Input::get('password')
		    $userdata['phone'] = $user->phone;

		    
	    	$childData = $user->children->toArray();
		    if ($childData) {
		        // validation successful!
		    	$response['success'][] = '1';
		    	$response['user'][] = $userdata;
		    	$response['child'] = $childData;// array('success'=>'1','role' => Auth::user()->role);// User::where('email',$userdata['email'])->first()->role );
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
        $children = child::all();
        return view('children.index', compact('children'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = user::lists('name','id');
        return view('children.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildRequest $request)
    {
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
        
        $user = user::find($request['user_id']);
        // $child = new child($request->all());
        $child = $user->children()->create($request->all());
        //return $request;
        // child::create( $request->all());
        return redirect('children');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $child = child::findOrFail($id);
        return view('children.show', compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $child = child::findOrFail($id);    
        // $genre_list = $child->genre_list;    
        $users = user::lists('name','id');
        return view('children.edit', compact('child', 'users'));
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
        return redirect('children');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $child = child::findOrFail($id);
        $child->delete();
        return redirect('children');
    }
}
