<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CMS</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/js/bootstrap.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="{{ asset('/js/prefixfree.min.js') }}"></script>
	<script type="text/javascript"  src="{{ asset('/js/jquery-1.8.3.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/js/bootstrap.js')}}"></script>
	
	<style>
		body {
		margin:0px;
		padding:0px;
		background-color:#F2F2F2;
		}
		#head {
			width:100%;
			height:30px;
			/*background-color:#D9D9D9;*/
			margin-left:auto;
			margin-right:auto;
			margin-bottom:0px;

			background: -moz-linear-gradient(top, #FEFEFE 0%, #CECECE 100%);
		    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FEFEFE), color-stop(100%,#CECECE));
		    background: -webkit-linear-gradient(top, #FEFEFE 0%,#CECECE 100%);
		    background: -o-linear-gradient(top, #FEFEFE 0%,#CECECE 100%);
		    background: -ms-linear-gradient(top, #FEFEFE 0%,#CECECE 100%);
		    background: linear-gradient(to bottom, #FEFEFE 0%,#CECECE 100%);
		}
		#logo {
			width:100%;
			height:70px;
			margin-left:auto;
			margin-right:auto;
			background-color:#F2F2F2;
			margin-bottom:5px;	
			/*float:left;*/
		}
		#amenu {
			width:100%;
			height:50px;
			margin-left:auto;
			margin-right:auto;
			margin-bottom:5px;	
			background-color: #015579;
		}
		*{margin:0;padding:0;list-style-type:none;}
		a,img{border:0;}
		/* Clearing floats */
		.cf:before,.cf:after{content:" ";display:table;}
		.cf:after{clear:both;}
		.cf{*zoom:1;}
		/* Main level */
		.menu{
			margin:5px auto;
			width:100%;
			width:-moz-fit-content;
			width:-webkit-fit-content;
			width:fit-content;
			z-index:1;
		}
		.menu > li{
			background:#015579;
			float:left;
			position:relative;
			transform:skewX(25deg);
		}
		.menu a{
			display:block;
			text-align:center;
			color:#fff;
			text-transform:uppercase;
			text-decoration:none;
			font-family:Arial, Helvetica;
			font-size:14px;
		}
		.menu li:hover{
			background:#e74c3c;
		}
		.menu > li > a{
			transform:skewX(-25deg);
			padding:1em 2em;
		}
		/* Dropdown */
		.submenu{
			position:absolute;
			width:200px;
			left:50%;
			margin-left:-100px;
			transform:skewX(-25deg);
			transform-origin:left top;
		}
		.submenu li{
			background-color:#34495e;
			position:relative;
			overflow:hidden;
		}
		.submenu > li > a{
			padding:1em 2em;
		}
		.submenu > li::after{
			content:'';
			position:absolute;
			top:-125%;
			height:100%;
			width:100%;
			box-shadow:0 0 50px rgba(0, 0, 0, .9);
		}
		/* Odd stuff */
		.submenu > li:nth-child(odd){
			transform:skewX(-25deg) translateX(0);
		}
		.submenu > li:nth-child(odd) > a{
			transform:skewX(25deg);
		}
		.submenu > li:nth-child(odd)::after{
			right:-50%;
			transform:skewX(-25deg) rotate(3deg);
		}
		/* Even stuff */
		.submenu > li:nth-child(even){
			transform:skewX(25deg) translateX(0);
		}
		.submenu > li:nth-child(even) > a{
			transform:skewX(-25deg);
		}
		.submenu > li:nth-child(even)::after{
			left:-50%;
			transform:skewX(25deg) rotate(3deg);
		}
		/* Show dropdown */
		.submenu,  .submenu li{
			opacity:0;
			visibility:hidden;
		}
		.submenu li{
			transition:.2s ease transform;
		}
		.menu > li:hover .submenu,  .menu > li:hover .submenu li{
			opacity:1;
			visibility:visible;
		}
		.menu > li:hover .submenu li:nth-child(even){
			transform:skewX(25deg) translateX(15px);
		}
		.menu > li:hover .submenu li:nth-child(odd){
			transform:skewX(-25deg) translateX(-15px);
		}
		#bottom {
			width:100%;
			height:200px;
			background-color:#F2F2F2;
			margin-left:auto;
			margin-right:auto;
			clear:both;
			margin-top:10px;
		}
		div.boot{
			margin-left:auto;
			margin-right:auto;
			clear:both;
			margin-top:10px;
			text-align:center;
		}

		/* search */
		.search{border:2px solid #f58400;height:35px;margin:20px auto auto auto;width:424px;}
		.search select{display:none;}
		.search .select_box{font-size:12px;color:#999999;width:100px;line-height:35px;float:left;position:relative;}
		.search .select_showbox{height:35px;background:url(images/search_ico.png) no-repeat 80px center;text-indent:1.5em;}
		.search .select_showbox.active{background:url(images/search_ico_hover.png) no-repeat 80px center;}
		.search .select_option{border:2px solid #f58400;border-top:none;display:none;left:-2px;top:35px;position:absolute;z-index:99;background:#fff;}
		.search .select_option li{text-indent:1.5em;width:90px;cursor:pointer;}
		.search .select_option li.selected{background-color:#F3F3F3;color:#999;}
		.search .select_option li.hover{background:#BEBEBE;color:#fff;}

		.search input.inp_srh,.search input.btn_srh{border:none;background:none;height:33px;line-height:35px;float:left;margin:0;padding:0;}
		.search input.inp_srh{outline:none;width:265px;}
		.search input.btn_srh{background:#f58400;color:#FFF;font-family:"微软雅黑";font-size:15px;width:55px;}

	</style>
</head>
<body>

	<div id='head'> 

		<div style="position:absolute;right:150px">
			<ul class="" style="height:30px">
			@if (Auth::guest())
				<li style="display:inline;vertical-align:middle;margin:5px"><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;登录&nbsp;&nbsp;</a></li>
				<li style="display:inline;vertical-align:middle;margin:5px"><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;注册&nbsp;&nbsp;</a></li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/auth/logout') }}">注销</a></li>
					</ul>
				</li>

			@endif
			</ul>
		</div>
	</div>
	<div id='logo'>
		<div style="float:left;"><img src=" {{asset('/images/logo.png') }}" width="300px"></div>
		
		
		<div class="search">
			<form name="searchform" method="post" action="{{ url('pages/listindex') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<select name="querytype" id="choose">
					<option value="0">搜索全部</option>
					<option value="1">栏目名</option>
					<option value="2">题目</option>
					<option value="3">作者</option>
					<option value="4">内容</option>
				</select> 
				<input class="inp_srh" name="keyword"  placeholder="请输入您要搜索的内容" >
				<input class="btn_srh" type="submit" name="submit" value="搜索">
			</form>
		</div>
		<!-- <div style="float:left"><a href="{{ url('pages/goquery') }}">高级搜索</a></div> -->
		<script type="text/javascript" src="{{ asset('/js/jquery.select.js')}}"></script>
	</div>
	<div id='amenu'>
		<ul class="menu cf">
			<li><a href="{{ url('/') }}">网站首页</a></li>
			<li>
				<a href="http://www.17sucai.com">关于我们</a>
				<!-- <ul class="submenu">
					<li><a href="http://www.17sucai.com">公司介绍</a></li>
					<li><a href="http://www.17sucai.com">企业资质</a></li>
					<li><a href="http://www.17sucai.com">荣誉证书</a></li>
					<li><a href="http://www.17sucai.com">联系我们</a></li>
				</ul> -->
			</li>
			<li><a href="http://www.17sucai.com">产品中心</a></li>
			<li>
				<a href="http://www.17sucai.com">成功案例</a>
				<!-- <ul class="submenu">
					<li><a href="http://www.17sucai.com">公司介绍</a></li>
					<li><a href="http://www.17sucai.com">企业资质</a></li>
					<li><a href="http://www.17sucai.com">荣誉证书</a></li>
					<li><a href="http://www.17sucai.com">联系我们</a></li>
				</ul> -->
			</li>
			<li><a href="http://www.17sucai.com">客户留言</a></li>
			<li><a href="{{ url('pages/goquery') }}">高级搜索</a></li>
		</ul>
	</div>

	

	@yield('content')


	<div id='bottom'>
		<hr>


		<div class="boot">关于我们| 产品服务| 友情链接| 法律声明| 人才招聘| 意见反馈| 联系我们</div>

		<div class="boot">粤ICP备11074819号-1 ICP：粤B2-20120227 国家药监局（粤）-经营性-2011-0009 版权所有：广州标点医药信息有限公司<br></div>

		<div class="boot">Copyright 2009 - 2015 MENET.com.cn All Rights Reserved</div>

	</div>
	
</body>
</html>
