<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect,Input,Auth;
//use Request;
use App\User;
use App\UserOrder;
use App\OrderRecord;
use DB;
use Log;
use App\UserGroup;
use App\Message;
use App\MsgUsr;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 * 个人中心主页
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		if($user!=null){
			$user = $this->UserUpgrade($user);
			$user->save();
			return view('users/userself')->withUser($user);
		}
		else
			return view('msg')->withMsg("登录后才能访问个人主页");
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
	* 更新前查找
	*/
	public function edit($id){
		if($id == Auth::user()->id){
			$user = User::find($id);
			if($user!=null)
				return view('users/edit')->withU($user);
			else
				return view('msg')->withMsg("查询的用户不存在！");
		}else{
				return view('msg')->withMsg("您还没登录，或者你在试图修改其他用户的信息!");
		}	
	}
	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		if($id == Auth::user()->id){
			$this->validate($request,[
				"email"=>'required|max:255',
				"name"=>'required',
				]);
			
			$u = User::find($id);
			$u->email=Input::get('email');
			$u->name=Input::get('name');
			$u->nickname=Input::get('nickname');

			if ($u->save()) {
				return Redirect::to('user/');
			} else {
				return Redirect::back()->withInput()->withErrors('更新失败！');
			}
		}else{
			return view('msg')->withMsg("您还没登录，或者你在试图修改其他用户的信息!");
		}
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

	/**
	* 浏览历史
	*/
	public function history($id){
		if($id == Auth::user()->id){
			$orderRecord = UserOrder::where("uid",$id)->paginate(10);
			//$orderRecord = DB::table('user_orders')->where('uid', $id)->get();
			//return view('users/history')->withOrders(UserOrder::queryOrders($id)->paginate(2))->withUser(Auth::user());
			//var_dump($orderRecord);
			//exit;
			return view('users/history')->withOrders($orderRecord)->withUser(Auth::user());
		}else{
			return view('msg')->withMsg("您还没登录，或者你在试图查看其他用户的浏览历史!");
		}	
	}

	/**
	* 金币充值
	**/
	public function wealthadd($id){
		if($id == Auth::user()->id ){
			return view('users/pay');
		}else{
			return view('msg')->withMsg("您还没登录，或者你在试图充值其他用户!");
		}
	}

	public function dowealthadd(){
		$n = 10 ;   //人民币和金币兑换比

		$user = Auth::user();
		if($user!=null){
			$gold = (int)Input::get('gold');
			$money = (int)Input::get('money');

			//记录日志，数据库错误时数据可回滚
			Log::info("wealthadd_".$userid."_"."money_".$money."gold_".$money*$n);

			//更新user表，orderrecord插入流水
			$user->gold = $user->gold + $money*$n;
			
			$or = new OrderRecord;
			$or->userid = $user->id;
			$or->money = $money;
			$or->gold = $money*$n;
			$or->consumeorin = "in";

			
			if ( $user->save() && $or->save() ) {
				return Redirect::to('user/');
			} else {
				return Redirect::back()->withInput()->withErrors('更新失败!');
			}
		}else{
			return view('msg')->withMsg("您还没登录!");
		}
	}
	/**
	* 金币使用详情
	**/
	public function wealthdetail($id){
		if($id == Auth::user()->id ){
			$or = OrderRecord::where('userid',$id)->paginate(10);
			return view('users/wealthdetail')->withOrs($or)->withUser(Auth::user());
		}else{
			return view('msg')->withMsg("您还没登录，或者你在试图访问其他用户金币详情!");
		}	
	}

	//升级
	private function UserUpgrade($user){
		$ugs = UserGroup::orderBy('point')->get();
		foreach( $ugs as $ug ){
			if($user->point >= $ug->point){
				$user->ugid = $ug->id;
				$user->ugname = $ug->name;
			}else{
				break;
			}
		}
		return $user;
	}

	public function law(){
		return view('law');
	}
	public function lawframe(){
		echo "aa";
		exit();
		return view('law2');
	}

	//返回未读消息数
	public function msgCount($id){
		//user msg
		$usrMsg = MsgUsr::where('receiverid',$id)->where('stat',0)->count();
		//usergroup msg
		//$ugMsg = MsgUsr::where('ugid',Auth::user()->ugid)->where('stat',0)->count();
		$ugMsg  = 0;
		//system msg
		//$sysMsg = Message::where();
		echo $usrMsg+$ugMsg;
	}

	//返回未读消息
	public function msgList($id){
		//user msg
		$usrMsg = MsgUsr::where('receiverid',$id)->where('stat',0)->get();
		$msg_user = array();
		foreach ($usrMsg as $um){
			$msg_user[] = Message::find($um->msgid);
		}

		$usrMsg2 = MsgUsr::where('receiverid',$id)->where('stat',1)->get();
		$msg_user2 = array();
		foreach ($usrMsg2 as $um){
			$msg_user2[] = Message::find($um->msgid);
		}

		//usergroup msg
		$ugMsg = MsgUsr::where('ugid',Auth::user()->ugid)->take(10)->get();
		//var_dump($ugMsg);
		$msg_ug = array();
		foreach ($ugMsg as $um){
			$msg_ug[] = Message::find($um->msgid);
		}
		// var_dump($msg_ug);
		// exit;
		//system msg
		$sysMsg = Message::where('msgtype',0)->orderBy('updated_at','desc')->take(10)->get();
		
		return view('/users/msg')->with('userMsg',$msg_user)->with('userMsg2',$msg_user2)->with('ugMsg',$msg_ug)
		->with('sysMsg',$sysMsg)->withUser(Auth::user());
	}

	public function msgDetail($id){
		$user= Auth::user();
		$msg = Message::find($id);
		if($msg!=null){
			$usrMsg = MsgUsr::where('receiverid',$user->id)->where('msgid',$id)->get();
			if($usrMsg != null){
				foreach($usrMsg as $temp){
					$temp->stat =1;
					$temp->save();
				}
				return view('/users/msgdetail')->with('msg',$msg)->withUser(Auth::user());
			}else{
				return view('msg')->with('msg','这条消息并未推送给你！不能查看');
			}
		}else{
			return view('msg')->with('msg','无此消息！');
		}

	}
}
