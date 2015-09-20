<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\UserGroup;
use Redirect,Input,Auth;
use App\Subject;

class UserGroupController extends Controller {

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
		
		return view("admin/users/ugcreate")->with("subjects",Subject::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			"name"=>'required|unique:user_groups|max:255',
			"point"=>'required',
			]);
		$ug = new UserGroup;
		
		$ug->name=Input::get('name');
		$ug->point=Input::get('point');
		$ug->memo=Input::get('memo');
		$ug->freesubject = implode(",", Input::get('freesubject'));
		if($ug->save()){
			return Redirect::to('admin/ugs/list');
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
		$ug = UserGroup::find($id);
		$freesubject = explode(",", $ug->freesubject);
		return view('admin/users/ugedit')->withUg($ug)->with("subjects",Subject::all())->with("fs",$freesubject);
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
			"name"=>'required',
			"point"=>'required',
			]);
		//$ug = new UserGroup;
		$ug = UserGroup::find($id);
		$ug->name=Input::get('name');
		$ug->point=Input::get('point');
		$ug->memo=Input::get('memo');
		$ug->freesubject = implode(",", Input::get('freesubject'));
		if ($ug->save()) {
			return Redirect::to('admin/ugs/list');
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
		$ug = UserGroup::find($id);
		$ug->delete();

		return Redirect::to('admin/ugs/list');
	}


	public function listugs(){
		return view('admin/users/uglist')->withUgs(UserGroup::paginate(10));
	}

}	
