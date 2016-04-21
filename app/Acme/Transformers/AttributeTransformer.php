<?php
namespace App\Acme\Transformers;

class AtrributeTransformer extends Transformer{
	
	public function transform($attribute){
		return [
			
			'id' => $attribute['id'],
			'type'=> $attribute['type'],
			'name'=> $attribute['name']
		];
	}
}