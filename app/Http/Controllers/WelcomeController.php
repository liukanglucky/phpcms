<?php namespace App\Http\Controllers;
use App\Subject;
use App\pages;
use DB;
use App\Services\AdServ;
use App\sysconf;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $subjectArray = Subject::all();
		// $subjectName = array();
		// foreach ($subjectArray as $subject){
		// 	array_push($subjectName, $subject->name);
		// 	$name = "page_".($subject->id);
		// 	$name = DB::table('pages')->where('sid',"=",$subject->id)->orderBy('created_at','desc')->take(2)->get();
		// }
		//图文资讯
		$twzx = pages::where('sid',6)->orderBy('created_at','desc')->take(3)->get();
		if(count($twzx)>0){
			$index = $twzx[0];
			unset($twzx[0]);
		}else{
			$index = null;
		}
		//站内公告
		$zngg = pages::where('sid',7)->orderBy('created_at','desc')->take(15)->get();
		//会员专区
		$hyzq = pages::where('sid',13)->orderBy('created_at','desc')->take(9)->get();
		//下载专区14
		$xzzq = pages::where('sid',14)->orderBy('created_at','desc')->take(9)->get();
		//免费专区15
		$mfzq = pages::where('sid',15)->orderBy('created_at','desc')->take(8)->get();
		//付费专区16
		$ffzq = pages::where('sid',16)->orderBy('created_at','desc')->take(8)->get();
		//资讯8
		$zx = pages::where('sid',8)->orderBy('created_at','desc')->take(8)->get();
		//政策9
		$zc = pages::where('sid',9)->orderBy('created_at','desc')->take(8)->get();
		//药品10
		$yp = pages::where('sid',10)->orderBy('created_at','desc')->take(8)->get();
		//器械11
		$qx = pages::where('sid',11)->orderBy('created_at','desc')->take(8)->get();
		//营销12
		$yx = pages::where('sid',12)->orderBy('created_at','desc')->take(8)->get();
		//首页顶部
		$ad_head = AdServ::genAd(0);
		//首页底部
		$ad_foot = AdServ::genAd(1);
		//首页右侧
		$ad_right = AdServ::genAd(3);
		//var_dump($ad);
		//return view('home')->with("zngg",$zngg);
		return view('home')->with("zngg",$zngg)->with('hyzq',$hyzq)->with('xzzq',$xzzq)
			->with('mfzq',$mfzq)->with('ffzq',$ffzq)->with('zx',$zx)->with('zc',$zc)
			->with('yp',$yp)->with('qx',$qx)->with('yx',$yx)->with("twzx",$twzx)->with("index",$index)
			->with("ad_head",$ad_head)->with("ad_foot",$ad_foot)->with("ad_right",$ad_right);
	}

	public function law(){
		return view('law');
	}
	public function lawframe(){
		
		return view('law2');
	}

	//appconf，返回json
	public function appconf(){
		$conf = sysconf::all()->first();
		if ($conf == null)
			$conf = new sysconf;
		$result = json_decode($conf,true);
		return json_encode($result,JSON_UNESCAPED_UNICODE);
	}
	
}
