<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\User;
use App\Tracker;
use Auth;
class LoginController extends Controller{
    

    public function register(){
    		$data['name'] = 'Sausa';
    		$data['password']= bcrypt('jodypati');
    		$data['phone']= '085647141907';
    		$data['email'] = 'jody@gmail.com';
    		$data['address'] = 'bojongsoang';
    		$data['role'] = 'admin';
    		$data['status'] = 'enable'; 
    	
		$newUser = User::create($data);

        if($newUser){
            $dataTracker['user_id'] = $newUser->id;
            $dataTracker['imei'] = '01010101';
            $dataTracker['trackerPhone'] = '0888'; 
            $dataTracker['balance'] = '999';
            $dataTracker['status'] = 'enable';
            $dataTracker['user_id'] = $newUser->id;
            $newTracker = Tracker::create($dataTracker);
        	if($newTracker){
                $response = array('success' => 1 );
                return Response::json([$response], '201');
            }else{
                $response = array('trackerSuccess' => 0 );
                return Response::json([$response], '401');
            }
        }else{
        	$response = array('success' => 0 );
            return Response::json([$response], '401');
        }
	
    }
    public function doLogin(){
	    // create our user data for the authentication
	    $userdata = array(
	        'email'     => 'jodypati@gmail.com',//Input::get('email'),
	        'password'  => 'jodypati'//Input::get('password')
	    );
	    	$email = 'jodypati@gmail.com';
	    	$password = 'jodypati';


		    // attempt to do the login
            $userLogin = Auth::attempt(['email' => $email, 'password' => $password]); 
		    if ($userLogin) {
		        // validation successful!
		    	$response = array('success'=>'1','role' => Auth::user()->role);// User::where('email',$userdata['email'])->first()->role );
            	return Response::json($response, '201');
		    } else {        
		        // validation not successful, send back to form 
		        $response = array('role' => '' );
            	return Response::json($response, '401');
		    }
		//}
    }
    public function doLogOut(){
    	if(Auth::check()){
  			Auth::logout();
		}
    }
}
