<?php namespace App\Http\Controllers;
header("Content-type: text/html; charset=utf-8");
use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\pages;
use Redirect,Input,Auth;
use Request;
use App\UserOrder;
use DB;
use App\OrderRecord;
use Log;
use App\Subject;
use App\Services\AdServ;
use App\comment;
use App\UserGroup;

class UserPagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function goquery(){
		return view('pages/querypages');
	}
	/**
	*	文章列表，高级搜索
	*/
	public function listpages($sid = null){

		$title = Request::input('title'); 
		$content = Request::input('content');
		$sname =Request::input('sname');
		$uname = Request::input('uname');
		$create_at_begin = Request::input('create_at_begin');
		$create_at_end= Request::input('create_at_end');
		

		//顶部
		$ad_head = AdServ::genAd(5);
		//底部
		$ad_foot = AdServ::genAd(6);
		//右侧
		$ad_right = AdServ::genAd(4);

		if($sid != null){
			$subject = Subject::find($sid);
		}else{
			$subject = null;
		}
		return view('pages/pageslist')->with("subject",$subject)->withPages(pages::queryPages($sid , $title ,$content , $sname ,$uname ,$create_at_begin ,$create_at_end)->paginate(10))->with("ad_head",$ad_head)->with("ad_foot",$ad_foot)->with("ad_right",$ad_right);
	}

	/**
	*	文章列表，首页搜索
	*/
	public function listpagesIndex(){
		$querytype = Request::input('querytype'); 
		$keyword = Request::input('keyword'); 
		//顶部
		$ad_head = AdServ::genAd(5);
		//底部
		$ad_foot = AdServ::genAd(6);
		//右侧
		$ad_right = AdServ::genAd(4);
		return view('pages/pageslist')->with("subject",null)->withPages(pages::queryPagesIndex($querytype,$keyword)->paginate(10))
		->with("ad_head",$ad_head)->with("ad_foot",$ad_foot)->with("ad_right",$ad_right);
	}

	/**
	*	阅读文章
	*/
	public function page($id){
		$page = pages::find($id);
		$user = Auth::user();

		//顶部
		$ad_head = AdServ::genAd(8);
		//底部
		$ad_foot = AdServ::genAd(9);
		//右侧
		$ad_right = AdServ::genAd(7);

		if(!isset($page)){
			return view('msg')->with("msg","无此文章");
		}
		//评论
		$c = comment::where('pid',$id)->get();
		//如果未登录
		if(!isset($user)){
			return $this->updateUserOrder($page)->with("ad_head",$ad_head)->with("ad_foot",$ad_foot)->with("ad_right",$ad_right)
			->with("cs",$c)->with("msg","您还未登录，以游客身份阅读此文章。登录后，可购买或阅读更多文章，在个人中心查看浏览历史记录。");
		}

		//已经登陆的用户写入其历史纪录
		if(isset($page) && isset($user)){
			//文章允许的用户组
			$userGroup = UserGroup::all()->find($user->ugid);
			if($userGroup != null ){
				$freesubject = explode(",", $userGroup->freesubject);

				if(in_array($page->sid, $freesubject)){
					$msg = "您是'".$userGroup->name."'等级用户，可免费阅读此栏目";

					return $this->updateUserOrder($page,$user->id,$user->name,true)->with("ad_head",$ad_head)->with("ad_foot",$ad_foot)
					->with("ad_right",$ad_right)->with("cs",$c)->with("msg",$msg);
				}

			}


			return $this->updateUserOrder($page,$user->id,$user->name)->with("ad_head",$ad_head)->with("ad_foot",$ad_foot)->with("ad_right",$ad_right)
			->with("cs",$c)->with("msg","");	
		}
	}

	/**
	* 更新用户浏览历史
	* type用来判定是不是会员等级设置免费阅读，或文章免费阅读白名单
	**/
	private function updateUserOrder($page,$uid="",$uname="visitor",$type = false){
			if($type)
				$page->coin = 0;
			$orderRecord = UserOrder::where("uid",$uid)->where("pid",$page->id)->where("status",2)->first();
			if(count($orderRecord) >0 ){
				if($uid!=""||$page->coin==0){
					$orderRecord->readnum++;
					$orderRecord->save();
					return view('pages/page')->with("page",$page);
				}else{
					return view('pages/pay')->with("pageid",$page->id)->with("pagecoin",$page->coin);
				}
			}else{
				$userOrder = UserOrder::where("uid",$uid)->where("pid",$page->id)->first();
				
				if($userOrder == null){
					$userOrder = new UserOrder;
					$userOrder->pid = $page->id;
					$userOrder->pname = $page->title;
					$userOrder->uid =$uid;
					$userOrder->uname=$uname;
					$userOrder->gold = $page->coin;
				}
				
				if($page->coin > 0){
					$userOrder->status = 1;
					$userOrder->readnum = 0;
					$userOrder->save();
					return view('pages/pay')->with("pageid",$page->id)->with("pagecoin",$page->coin);
				}else{
					$userOrder->status = 2;
					$userOrder->readnum = 1;
					$userOrder->save();
					return view('pages/page')->with("page",$page);
				}	
			}
			
	}

	/**
	*	确认支付，并阅读
	*/
	public function readyPayAndRead($id){
		$user = Auth::user() ;
		if($user !=null){
			//顶部
			$ad_head = AdServ::genAd(8);
			//底部
			$ad_foot = AdServ::genAd(9);
			//右侧
			$ad_right = AdServ::genAd(7);
			//评论
			$c = comment::where('pid',$id)->get();

			$page = pages::where('id',$id)->firstOrFail();
			$orderRecord = UserOrder::where("uid",$user->id)->where("pid",$page->id)->where("status",2)->first();
			//已经购买或金币为0直接跳到文章页面
			if($page->coin == 0 || $orderRecord != null){
				return Redirect::to('/pages/page/'.$page->id);
				//return view('pages/page')->with("page",$page); 
			}

			//购买流程。数据库事务处理，错误回滚
			if($page->coin > $user->gold){
				return view('msg')->withMsg("对不起，您的金币不足!");
			}else{
				//log
				Log::info("wealthconsume_".$user->id."_"."money_"." "."gold_".$page->coin);
				//order_record流水 update user ,insert user_order
				$or = new OrderRecord;
				$or->userid = $user->id;
				$or->money = 0;
				$or->gold = $page->coin;
				$or->consumeorin = "out";
				
				//$or->save();
				$user->gold = $user->gold - $page->coin;
				$user->point = $user->point + $page->coin;

				//$user->save();
				
				//查出浏览历史中是否有该文章未付款状态的
				$orderRecord = UserOrder::where("uid",$user->id)->where("pid",$page->id)->first();
				if($orderRecord != null ){
					$orderRecord->status = 2;
					$orderRecord->readnum += 1;
					//$orderRecord->save();
					DB::transaction(function()use($or,$user,$orderRecord)
					{
					 //    DB::insert("insert into order_records (userid,money,gold,consumeorin) values(?,?,?,?)",array(
						// 	'userid'=>$or->userid,
						// 	'money'=>$or->money,
						// 	'gold'=>$or->gold,
						// 	'consumeorin'=>$or->consumeorin
						// ));

					 //    DB::table('users')->update(['gold' => $user->gold]);

					 //    DB::table('user_orders')->update(['status' => $orderRecord->status]);
						$or->save();
						$user->save();
						$orderRecord->save();
					});
					
				}else{
					$userOrder = new UserOrder;
					$userOrder->pid = $page->id;
					$userOrder->pname = $page->title;
					$userOrder->uid =$user->id;
					$userOrder->uname=$user->name;
					$userOrder->gold = $page->coin;
					$userOrder->status = 2;
					$userOrder->readnum = 1;
					//$userOrder->save();
					

					DB::transaction(function() use ($or,$user,$userOrder)
					{

					 //    DB::insert("insert into order_records (userid,money,gold,consumeorin) values(?,?,?,?)",array(
						// 	'userid'=>$or->userid,
						// 	'money'=>$or->money,
						// 	'gold'=>$or->gold,
						// 	'consumeorin'=>$or->consumeorin
						// ));

					 //    DB::table('users')->update(['gold' => $user->gold]);

					 //    DB::insert("insert into user_orders (pid,pname,uid,uname,gold,status,readnum)values(?,?,?,?,?,?,?)",
						// array(
						// 	"pid"=>$userOrder->pid,
						// 	"pname"=>$userOrder->pname,
						// 	"uid"=>$userOrder->uid ,
						// 	"uname"=>$userOrder->uname,
						// 	"gold"=>$userOrder->gold ,
						// 	"status"=>$userOrder->status,
						// 	"readnum"=>1
						// ));
						$or->save();
						$user->save();
						$userOrder->save();
					});

					
				}

				return view('pages/page')->with("page",$page)->with("ad_head",$ad_head)->with("ad_foot",$ad_foot)
				->with("ad_right",$ad_right)->with("cs",$c)->with("msg","");
			}

		}else{
			return view('msg')->withMsg("您还没登录!");
		}
	}

	public function writeComment(){

	//	$this->validate($request, [
	//		'content' => 'required',
	//	]);

		$user = Auth::user() ;
		if($user == null){
			return redirect()->back()->withInput()->with("msg","登录后才能发表评论");
		}

		$c = new comment;
		$c->uid = $user->id;
		$c->uname = $user->name;
		$c->pid = Input::get('pid');
		$c->pname = Input::get('pname'); 
		$c->content = Input::get('content');
		$c->state = 0;
		if ($c->save()) {
			return Redirect::to('/pages/page/'.$c->pid);
		} else {
			return Redirect::back()->withInput()->with("msg",'更新失败！');
		}
	}


	//生成用户柱状统计图,ajax调用，返回json
	public function statbypid($pid){
		$userOrder = UserOrder::where("pid",$pid)->get();
		$result  = array();
		foreach($userOrder as $o){
			$o = json_decode($o,true);
			//echo $o['uname'];
			$result[$o['uname']] = $o['readnum'];
			// $yearandmonth = substr($o['updated_at'], 0,7);
			// if(array_key_exists($yearandmonth , $result)){
			// 	$result[$yearandmonth] += $o['readnum'];
			// }else{
			// 	$result[$yearandmonth] = $o['readnum'];
			// }
		}
		return json_encode($result,JSON_UNESCAPED_UNICODE);
	}


}
