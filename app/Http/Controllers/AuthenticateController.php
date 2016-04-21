<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;
//use Auth;
use Illuminate\Http\Response as StatusCode;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller{	
	public function authenticate(Request $request){
		$credentials = $request->only('email', 'password');
		try {
			if (! $token = JWTAuth::attempt($credentials)) {
				return response()->json(['error' => 'invalid_credentials'], 401);
			}
		} catch (JWTException $e) {
			return response()->json(['error' => 'could_not_create_token'], 500);
		}		
		return response()->json(compact('token'));
	}

	protected $statusCode = 200;
	
	public function getStatusCode(){
		return $this->statusCode;
	}
	
	public function setStatusCode($statusCode){
		$this->statusCode = $statusCode;
		return $this;
	}
		
	public function respond($data, $headers = []){
		return Response::json($data, $this->getStatusCode(), $headers);
	}
	
	public function respondWithError($message){
		return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]
		]);
	}
	
	public function respondNotFound($message = 'Not Found!'){
		return $this->setStatusCode(StatusCode::HTTP_NOT_FOUND)->respondWithError($message);
	}
	
	public function respondNotCreated($message = 'Failed to Create!'){
		return $this->setStatusCode(422)->respondWithError($message);
	}
	
	public function respondCreated($message){
		return $this->setStatusCode(201)->respond([
			'message' => $message,
		]);
	}
	
	protected function respondWithPagination(Paginator $authors, $data){
		$data = array_merge($data, [
			'paginator'	=> [
				'total_count'	=> $authors->total(),
				'total_pages'	=> ceil($authors->total() / $authors->perPage()),
				'current_pages'	=> $authors->currentPage(),
				'limit'			=> $authors->perPage(),
			]
		]);
		return $this->respond($data);
	}
}