<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Ad;
use Redirect,Input,Auth;

class AdsController extends Controller {

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
		
		return view("admin/ads/create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			"title"=>'required|unique:ads|max:255',
			"image"=>'required',
			"enddate"=>'required',
			]);
		$ad = new Ad;
		$ad->title=Input::get('title');
		$ad->url=Input::get('url');
		//上传图片
		if ($request->file('image')->isValid())
		{
		    $file = $request->file('image');
		    $file->move("storage/ads_image/", $ad->title."_".$file->getClientOriginalName());
		    $ad->image = "/storage/ads_image/".(string)$ad->title."_".$file->getClientOriginalName();
		}
		$ad->type=Input::get('type');
		$ad->enddate=Input::get('enddate');
		$ad->sendperson=Input::get('sendperson');
		$ad->memo=Input::get('memo');
		
		
		if($ad->save()){
			return Redirect::to('admin/ads/list');
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
		return view('admin/ads/edit')->withAd(Ad::find($id));
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
			"title"=>'required',
			"enddate"=>'required',
			]);
		
		$ad = Ad::find($id);
		//$ad = new Ad;
		$ad->title=Input::get('title');
		$ad->url=Input::get('url');
		//上传图片
		if($request->file('image') != null){
			if ($request->file('image')->isValid())
			{
			    $file = $request->file('image');
			    $file->move("storage/ads_image/", $ad->title."_".$file->getClientOriginalName());
			    $ad->image = "/storage/ads_image/".(string)$ad->title."_".$file->getClientOriginalName();
			}
		}
			
		$ad->type=Input::get('type');
		$ad->enddate=Input::get('enddate');
		$ad->sendperson=Input::get('sendperson');
		$ad->memo=Input::get('memo');

		if ($ad->save()) {
			return Redirect::to('admin/ads/list');
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
		$ad = Ad::find($id);
		$ad->delete();

		return Redirect::to('admin/ads/list');
	}

	public function listads(){
		return view('admin/ads/adlists')->withAds(Ad::paginate(10));
	}
}
