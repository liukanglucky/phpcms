<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model {

	protected $table = 'user_orders';


	public function scopequeryOrders($query,$uid = null){
		if ($uid != "" && $uid != null)
			$query = $query->where('uid',$uid);
		return $query;
	}

	public function scopequeryOrdersAdmin($query,$uname = null,$pname = null){
		if ($uname != "" && $uname != null)
			$query = $query->where('uname','like',"%".$uname."%");
		if ($pname != "" && $pname != null)
			$query = $query->where('pname','like',"%".$pname."%");
		return $query;
	}

}
