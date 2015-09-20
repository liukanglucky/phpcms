<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model {

	protected $table = 'comments';


	public function scopequeryComments($query,$pname,$uname,$state){
		if($pname != null and $pname != "")
			$query = $query->where("pname","like","%".$pname."%");
		if($pname != null and $uname != "")
			$query = $query->where("uname","like","%".$uname."%");
		if($state != null and $state != "")
			$query = $query->where("state",$state);

		return $query;
	}

}
