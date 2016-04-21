<?php
namespace App\Acme\Transformers;

class VaccineHistoryTransformer extends Transformer{
	
	public function transform($vaccineHistory){
		return [
			'id' => $vaccineHistory['id'],
			'child_id'=> $vaccineHistory['child_id'],
			'date'=> $vaccineHistory['date'],
			'place'=> $vaccineHistory['place'],
			'vaccine_type'=> $vaccineHistory['vaccine_type']
		];
	}
}