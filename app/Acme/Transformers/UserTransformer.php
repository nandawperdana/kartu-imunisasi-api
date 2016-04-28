<?php
namespace App\Acme\Transformers;

class UserTransformer extends Transformer{
	
	public function transform($user){
		return [
			'id' => $user['id'],
			'name' => $user['name'],
			'email' => $user['email'],
			'gender' => $user['gender'],
			'country' => $user['country'],
			'state' => $user['state'],
			'address' => $user['address'],
			'phone' => $user['phone'],
			'tempatLahir' => $user['tempatLahir'],
			'tglLahir' => $user['tglLahir'],
			'imgUsrFileName' => $user['imgUsrFileName'],
			'imgUsrFilePath' => $user['imgUsrFilePath']
		];
	}
}