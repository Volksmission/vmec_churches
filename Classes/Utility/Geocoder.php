<?php 

namespace VMeC\VmecChurches\Utility;

class Geocoder{
	static private $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=";

	public function getLocation($address){
		$url = self::$url.urlencode($address);
           
		$resp_json = file_get_contents($url);
		$resp = json_decode($resp_json, true);

		if($resp['status']='OK'){
			return $resp['results'][0]['geometry']['location'];
        }else{
                return false;
        }
    }
}