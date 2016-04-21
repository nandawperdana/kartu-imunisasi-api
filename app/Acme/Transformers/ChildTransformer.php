<?php
namespace App\Acme\Transformers;

class ChildTransformer extends Transformer{
	
	public function transform($child){
		return [
			
			'id' => $child['id'],
			'user_id'=> $child['user_id'],
			'birthplace'=> $child['birthplace'],
			'birthday'=> $child['birthday'],
			'weight'=> $child['weight'],
			'height'=> $child['height'],
			'FileNameFoto'=> $child['FileNameFoto'],
			'PathFoto'=> $child['PathFoto'],
			'gender' => $child['gender']	
		];
	}
}