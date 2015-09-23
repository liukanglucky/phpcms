<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::post('/appconf', 'WelcomeController@appconf');
Route::get('/appconf', 'WelcomeController@appconf');

Route::get('law', 'WelcomeController@law');

Route::get('lawframe', 'WelcomeController@lawframe');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'user', 'namespace' => 'User','middleware'=>'user'], function()
{
  Route::get('/', 'UserController@index');
  Route::post('/', 'UserController@index');
  Route::get('/edit/{id}', 'UserController@edit');
  Route::post('/edit/{id}', 'UserController@edit');
  Route::get('/update/{id}', 'UserController@update');
  Route::post('/update/{id}', 'UserController@update');
  Route::get('/history/{id}', 'UserController@history');
  Route::post('/history/{id}', 'UserController@history');

  Route::get('/wealthadd/{id}', 'UserController@wealthadd');
  Route::post('/wealthadd/{id}', 'UserController@wealthadd');

  Route::get('/dowealthadd/{id}', 'UserController@dowealthadd');
  Route::post('/dowealthadd/{id}', 'UserController@dowealthadd');

  Route::get('/wealthdetail/{id}', 'UserController@wealthdetail');
  Route::post('/wealthdetail/{id}', 'UserController@wealthdetail');

  Route::get('law', 'UserController@law');

  Route::get('lawframe', 'UserController@lawframe');

  //msgcount
  Route::get('/msgcount/{id}', 'UserController@msgCount');
  Route::post('/msgcount/{id}', 'UserController@msgCount');
  //msgList
  Route::get('/msglist/{id}', 'UserController@msgList');
  Route::post('/msglist/{id}', 'UserController@msgList');
  //msgList
  Route::get('/msgdetail/{id}', 'UserController@msgDetail');
  Route::post('/msgdetail/{id}', 'UserController@msgDetail');

});



Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'admin'], function()
{
  Route::get('/', 'AdminHomeController@index');
  //Admin文章管理
  Route::get('/pages/list','PagesController@listpages');
  Route::post('/pages/list','PagesController@listpages');
  Route::resource('/pages', 'PagesController');
  //评论管理
  Route::get('/comments/listcomments','PagesController@listcomments');
  Route::post('/comments/listcomments','PagesController@listcomments');
  Route::get('/comments/delete/{id}','PagesController@delcomments');
  Route::post('/comments/delete/{id}','PagesController@delcomments');
  Route::get('/comments/pass/{id}/{para}','PagesController@pass');
  Route::post('/comments/pass/{id}/{para}','PagesController@pass');
  //用户管理
  Route::get('users/list','UserController@listusers');
  Route::post('users/list','UserController@listusers');
  Route::resource('/users', 'UserController');

  //用户组管理
  Route::get('ugs/list','UserGroupController@listugs');
  Route::post('ugs/list','UserGroupController@listugs');
  Route::resource('/ugs', 'UserGroupController');

  //Admin栏目管理
  Route::get('/subjects/list','SubjectsController@listsubjects');
  Route::post('/subjects/list','SubjectsController@listsubjects');
  Route::resource('/subjects', 'SubjectsController');

  //广告管理
  Route::get('/ads/list','AdsController@listads');
  Route::post('/ads/list','AdsController@listads');
  Route::resource('/ads', 'AdsController');
  
  //统计
  Route::get('/stat/page', 'AdminHomeController@statPage');
  Route::post('/stat/page', 'AdminHomeController@statPage');

  //系统配置
  Route::get('/sysconfi/index', 'AdminHomeController@sysconfIndex');
  Route::post('/sysconf/addsysconf', 'AdminHomeController@addsysconf');

  //msg
  Route::get('/msg/send', 'AdminHomeController@msgsend');
  Route::post('/msg/send', 'AdminHomeController@msgsend');
  Route::get('/msg/dosend', 'AdminHomeController@msgdosend');
  Route::post('/msg/dosend', 'AdminHomeController@msgdosend');
  Route::get('/msg/list', 'AdminHomeController@listmsg');
  Route::post('/msg/list', 'AdminHomeController@listmsg');
  Route::get('/msg/delete/{id}', 'AdminHomeController@delmsg');
  Route::post('/msg/delete/{id}', 'AdminHomeController@delmsg');
});

// Route::get('loginadmin', 'AdminHomeController@index',['middleware' => 'admin', function()
// {
//     //
// }]);



//按栏目id搜索
Route::get('/pages/list/{sid?}','UserPagesController@listpages');
//go高级搜索
Route::get('/pages/goquery','UserPagesController@goquery');
//高级搜索
Route::post('/pages/list','UserPagesController@listpages');
Route::get('/pages/list','UserPagesController@listpages');

//首页搜索
Route::post('/pages/listindex','UserPagesController@listpagesIndex');
Route::get('/pages/listindex','UserPagesController@listpagesIndex');

//按ID查看文章
Route::get('/pages/page/{id}','UserPagesController@page');
Route::post('/pages/page/{id}','UserPagesController@page');
Route::get('/pages/readyPayAndRead/{id}','UserPagesController@readyPayAndRead');
Route::post('/pages/readyPayAndRead/{id}','UserPagesController@readyPayAndRead');

//评论
Route::get('/pages/comment/','UserPagesController@writeComment');
Route::post('/pages/comment/','UserPagesController@writeComment');

//生成浏览折线图
Route::post('/pages/stat/{pid}','UserPagesController@statbypid');
Route::get('/pages/stat/{pid}','UserPagesController@statbypid');


