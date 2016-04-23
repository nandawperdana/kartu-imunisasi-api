<?php
namespace App\Acme\Transformers;

class UserTransformer extends Transformer{
	
	public function transform($user){
		return [
			'name' => $user['name'],
			'email' => $user['email'],
			'gender' => $user['gender'],
			'avatarUrl' => $user['avatarUrl'],
			'country' => $user['country'],
			'state' => $user['state'],
			'address' => $user['address'],
			'phone' => $user['phone'],
			'statusInfo' => $user['statusInfo'],
			'profession' => $user['profession'],
			'tempatLahir' => $user['tempatLahir'],
			'tglLahir' => $user['tglLahir'],
			'educLevId' => $user['educLevId'],
			'imgUsrFileName' => $user['imgUsrFileName'],
			'imgUsrFilePath' => $user['imgUsrFilePath'],
			'lastStudy' => $user['lastStudy'],
			'statusInfoUpAt' => $user['statusInfoUpAt']
		];
	}
}