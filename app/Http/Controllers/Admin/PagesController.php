<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\pages;
use Redirect,Input,Auth;
use App\Subject;

use App\comment;

class PagesController extends Controller {

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
		
		return view("admin/pages/create")->withSubjects(Subject::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			"title"=>'required|unique:pages|max:255',
			"content"=>'required',
			]);
		$page = new pages;
		$sidAndsname = Input::get('sidsname');
		$page->sid = explode(",", $sidAndsname)[0];
		$page->sname = explode(",", $sidAndsname)[1];
		$page->title=Input::get('title');
		$page->content=Input::get('content');
		$page->isCharge = Input::get('isCharge');
		$page->coin = Input::get('coin');
		$page->uid =Auth::user()->id;
		$page->uname=Auth::user()->name;

		$page->comment=Input::get('comment');

		//上传图片

		if ($request->file('image')!=null&&$request->file('image')->isValid())
		{
		    $file = $request->file('image');
		    $file->move("storage/PageUploads/img", $page->title."_".$file->getClientOriginalName());
		    $page->image = "/storage/PageUploads/img/".(string)$page->title."_".$file->getClientOriginalName();
		}

		//附件
		if ($request->file('file')&&$request->file('file')->isValid())
		{
		    $file = $request->file('file');
		    $file->move("storage/PageUploads/file", $page->title."_".$file->getClientOriginalName());
		    $page->file = "/storage/PageUploads/file/".(string)$page->title."_".$file->getClientOriginalName();
		}

		if($page->save()){
			return Redirect::to('admin/pages/list');
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
		return view('admin.pages.edit')->withPage(pages::find($id))->withSubjects(Subject::all());
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
			'title' => 'required|unique:pages,title,'.$id.'|max:255',
			'content' => 'required',
		]);

		$page = pages::find($id);
		$page->title = Input::get('title');
		$page->content = Input::get('content');
		$page->isCharge = Input::get('isCharge');
		$page->coin = Input::get('coin');
		$page->comment=Input::get('comment');
		//$page->user_id = 1;//Auth::user()->id;
		// var_dump($page);
		// exit;
		
		if ($page->save()) {
			return Redirect::to('admin/pages/list');
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
		$page = pages::find($id);
		$page->delete();

		return Redirect::to('admin/pages/list');
	}

	public function listpages($sid=null){
		$title = Input::get('title'); 
		$content = Input::get('content');
		$sname =Input::get('sname');
		$uname = Input::get('uname');
		$create_at_begin = Input::get('create_at_begin');
		$create_at_end= Input::get('create_at_end');

		return view('admin/pages/listpages')->withSubjects(Subject::all())
		->withPages(pages::queryPages($sid , $title ,$content , $sname ,$uname ,$create_at_begin ,$create_at_end)->paginate(10));
	}

	public function listcomments(){

		$pname = Input::get('pname');
		$uname = Input::get('uname');
		$state = Input::get('state');
		//$result = comment::all();

		return view("admin/pages/listcomment")->withComments(comment::queryComments($pname,$uname,$state)->paginate(10));
	}

	public function delcomments($id)
	{
		$comment = comment::find($id);
		$comment->delete();

		return Redirect::to('admin/comments/listcomments');
	}

	public function pass($id,$para)
	{
		$comment = comment::find($id);

		if($para == '1')
			$comment->state = '1';
		if($para == '2')
			$comment->state = '-1';


		if ($comment->save()) {
			return Redirect::to('admin/comments/listcomments');
		} else {
			return Redirect::back()->withInput()->withErrors('更新失败！');
		}
	}
}
