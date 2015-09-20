<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Request;
use Redirect,Input,Auth;
use App\UserOrder;
use DB;
use App\sysconf;

class AdminHomeController extends Controller {

	/**
	 * 后台首页
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if($request->user()){
			if($request->user()->status == '10')
				$view = view('admin/index');
			else
				$view = view('admin/adminlogin')->withMsg('请使用管理员账号登录');
		}else{
			$view = view('admin/adminlogin')->withMsg('请使用管理员账号登录');
		}
		return $view;
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

	//文章统计信息
	public function statPage(){
		$uname = Input::get("uname");
		$pname = Input::get("pname");
		
		$orderRecord = UserOrder::queryOrdersAdmin($uname,$pname)->select(DB::raw('id,pid,pname,status,sum(readnum) as readnum'))->groupby('pid')->paginate(10);
		
		return view('admin/stat/page')->withOrders($orderRecord);
	}

	//系统设置
	public function sysconfIndex(){
		$conf = sysconf::all()->first();
		if ($conf == null)
			$conf = new sysconf;
		return view('admin/sysconf/index')->with("conf",$conf);
	}

	//新建或更新
	public function addsysconf(Request $request){
		$conf = sysconf::all()->first();
		
		if($conf == null){
			//新增
			$conf = new sysconf;
		}

		//更新或新增
		$conf->webname = Input::get('webname');
		
		//上传图片
		if ($request->file('logo')!=null&&$request->file('logo')->isValid())
		{
		    $file = $request->file('logo');
		    $file->move("storage/sysconf/img", $file->getClientOriginalName());
		    $conf->logo = "/storage/sysconf/img/".$file->getClientOriginalName();
		}
		$conf->aboutus = Input::get('aboutus');
		$conf->law = Input::get('law');
		$conf->otherhrefname = Input::get('otherhrefname');
		$conf->otherhrefpid = Input::get('otherhrefpid');
		$conf->menu = Input::get('menu');
		$conf->menuhref = Input::get('menuhref');
		$conf->icp = Input::get('icp');

		if($conf->save()){
			return Redirect::to('admin/sysconfi/index');
		}else{
			return Redirect::back()->withInput()->withErrors('保存失败');
		}
	}
}
