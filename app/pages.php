<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class pages extends Model {

	protected $table = 'pages';


	public function scopequeryPages($query,$sid = null, $title = null ,$content = null, $sname =null,$uname = null,$create_at_begin = null,$create_at_end= null){
		if ($sid != "" && $sid != null)
			$query = $query->where('sid',$sid);
		if ($sname != "")
			$query = $query->where('sname','like',"%".$sname."%");
		if ($title != "")
			$query = $query->where('title',"like","%".$title."%");
		if ($content != "")
			$query = $query->where('content',"like","%".$content."%");

		if($create_at_begin != "" && $create_at_end != "")
			$query = $query->where('created_at','>',$create_at_begin)->where('created_at','<',$create_at_end);


		return $query;
	}


	public function scopequeryPagesIndex($query,$querytype,$keyword){
		// <option value="0">搜索全部</option>
		// <option value="1">栏目名</option>
		// <option value="2">题目</option>
		// <option value="3">作者</option>
		// <option value="4">内容</option>
		if($querytype == "1")
			$query = $query->where('sname','like','%'.$keyword.'%');
		if($querytype == "2")
			$query = $query->where('title','like','%'.$keyword.'%');
		if($querytype == "3")
			$query = $query->where('uname','like','%'.$keyword.'%');
		if($querytype == "4")
			$query = $query->where('content','like','%'.$keyword.'%');


		if($querytype == "0")
			$query = $query->where('sname','like','%'.$keyword.'%')->orWhere('title','like','%'.$keyword.'%')->orWhere('uname','like','%'.$keyword.'%')->orWhere('content','like','%'.$keyword.'%');

		return $query;
	}


}
