<?php
namespace App\Acme\Transformers;

class TrackerTransformer extends Transformer{
	
	public function transform($tracker){
		return [
			'id' => $tracker['id'],
			'imei' => $tracker['imei'],			
			'name' => $tracker['name'],			
			'trackerPhone' => $tracker['trackerPhone'],			
			'balance' => $tracker['balance'],			
		];
	}
}