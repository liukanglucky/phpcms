<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	//
	protected $table = 'messages';


	public function scopequeryMsg($query,$stat,$title){
		if ($stat != "" && $stat != null)
			$query = $query->where('msgtype',$stat);
		if ($title != "" && $title != null)
			$query = $query->where('title',$title);

		return $query;
	}
}
