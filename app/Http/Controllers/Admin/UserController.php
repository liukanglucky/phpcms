<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\UserGroup;
use Redirect,Input,Auth;

class UserController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		//return view('admin/adminlogin');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view("admin/users/create")->withUgs(UserGroup::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			"email"=>'required|unique:users|max:255',
			"point"=>'required',
			]);
		$u = new User;
		$u->email=Input::get('email');
		$u->name=Input::get('name');
		$u->point=Input::get('point');
		$u->gold=Input::get('gold');
		$u->status=Input::get('status');
		$ugidandname=explode(":",Input::get('ugid'));
		$u->ugid=$ugidandname[0];
		$u->ugname=$ugidandname[1];
		$u->nickname=Input::get('nickname');
		
		if($u->save()){
			return Redirect::to('admin/users/list');
		}else{
			return Redirect::back()->withInput()->withErrors('保存失败');
		}
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
		return view('admin/users/edit')->withU(User::find($id))->withUgs(UserGroup::all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request,[
			"email"=>'required|max:255',
			"point"=>'required',
			]);
		
		$u = User::find($id);
		$u->email=Input::get('email');
		$u->name=Input::get('name');
		$u->point=Input::get('point');
		$u->gold=Input::get('gold');
		$u->status=Input::get('status');
		$ugidandname=explode(":",Input::get('ugid'));
		$u->ugid=$ugidandname[0];
		$u->ugname=$ugidandname[1];
		$u->ugname=Input::get('ugname');
		$u->nickname=Input::get('nickname');

		if ($u->save()) {
			return Redirect::to('admin/users/list');
		} else {
			return Redirect::back()->withInput()->withErrors('更新失败！');
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
		$u = User::find($id);
		$u->delete();

		return Redirect::to('admin/users/list');
	}

	public function listusers(){
		$id = Input::get('id');
		$name = Input::get('name');
		$ugname = Input::get('ugname');
		return view('admin/users/listusers')->withUsers(User::queryUsers($id,$name,$ugname)->paginate(10))->withUgs(UserGroup::all());
	}


	
}
