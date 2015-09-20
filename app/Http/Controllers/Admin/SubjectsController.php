<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Subject;
use Redirect,Input,Auth;
//use Request;

class SubjectsController extends Controller {

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
		//
		return view("admin/subjects/create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			"name"=>'required|unique:subjects|max:255',
			//"content"=>'required',
			]);
		$subject = new Subject;
		$subject->name=Input::get('name');
		$subject->weight = Input::get('weight');
		#$subject->content=Input::get('content');
		#$page->uid =Auth::user()->id;
		$subject->person=Auth::user()->name;

		//上传文件
		if($request->file('icon') != null){
			if ($request->file('icon')->isValid())
			{
			    //$file = $request->file('icon')->move($destinationPath, $subject->name);
			    $file = $request->file('icon');
			    $file->move("storage/uploads", $subject->name."_".$file->getClientOriginalName());
			    $subject->icon = "/storage/uploads/".(string)$subject->name."_".$file->getClientOriginalName();
			}
		}
		


		if($subject->save()){
			return Redirect::to('admin/subjects/list');
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
		return view('admin.subjects.edit')->withSubject(Subject::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'name' => 'required|max:255',
			//'content' => 'required',
		]);

		$subject = Subject::find($id);
		$subject->name = Input::get('name');
		$subject->weight = Input::get('weight');
		$subject->person = Auth::user()->name;
		//$page->user_id = 1;//Auth::user()->id;

		if ($subject->save()) {
			return Redirect::to('admin/subjects/list');
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
		$subject = Subject::find($id);
		$subject->delete();

		return Redirect::to('admin/subjects/list');
	}

	/**
	* 栏目列表
	*/
	public function listsubjects(){
		$name = Input::get('name');
		if ($name != null || $name != "")
			return view('admin/subjects/subjectslist')->withSubjects(Subject::where('name','like','%'.$name.'%')->paginate(10));
		else
			return view('admin/subjects/subjectslist')->withSubjects(Subject::paginate(10));
	}

}
