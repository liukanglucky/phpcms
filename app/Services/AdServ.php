<?php namespace App\Services;

use App\User;
use App\Ad;

class AdServ {

	/**
	* 随机选取广告，并更新展示次数
	**/
	public static function genAd($n){

		$AdList = Ad::where("type",$n)->where("enddate",">",date('y-m-d h:i:s',time()))->get();
		// date('y-m-d h:i:s',time());
		// $AdList = Ad::where("type",$n)->get();
		$Adarray = array();
		
		if($AdList->count()>0){
			foreach($AdList as $ad){
				$Adarray[] = $ad;
			}
		}

		if(is_array($Adarray) && count($Adarray)>0){
			$len = count($Adarray);
			$n = rand(0,$len-1);
			$ad = new Ad;
			$ad = $Adarray[$n];
			$ad->num += 1;
			$ad->save();
			return $ad;
		}else{
			return null;
		}
		
	}

}
