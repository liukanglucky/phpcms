<? header("Access-Control-Allow-Origin:*"); //允许任何访问(包括ajax跨域)  ?>
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
	<!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="{{ asset('/js/prefixfree.min.js') }}"></script>
	<script type="text/javascript"  src="{{ asset('/js/jquery-1.8.3.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/js/bootstrap.js')}}"></script>
	<script type="text/javascript"  src="{{ asset('/js/jquery.floatDiv.js')}}"></script>
	
	
	<style>
		body {
		margin:0px;
		padding:0px;
		/*background-color:#f1f1f1;*/
		background-color:#fff;
		}
		#head {
			width:100%;
			height:30px;
			min-width: 1100px;
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
			min-width: 1100px;
			margin-left:auto;
			margin-right:auto;
			/*background-color:#F1F1F1;*/
			background-color:#fff;
			margin-bottom:5px;	
			/*float:left;*/
		}
		#amenu {
			width:100%;
			height:50px;
			min-width: 1100px;
			margin-left:auto;
			margin-right:auto;
			margin-bottom:5px;	
			/*background-color: #015579;*/
			/*background-color:#F54343;*/
			background-color:#086ACD;
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
			/*background:#015579;*/
			/*background: #F54343;*/
			background-color:#086ACD;
			float:left;
			position:relative;
			transform:skewX(25deg);
		}
		.menu a{
			display:block;
			text-align:center;
			color:#fff;
			/*color:#000;*/
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
			/*background-color:#F1F1F1;*/
			background-color:#fff;
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
		.search{border:2px solid #f58400;height:35px;margin:20px auto auto auto;width:424px;min-width:424px;}
		.search select{display:none;}
		.search .select_box{font-size:12px;color:#999999;width:100px;line-height:35px;float:left;position:relative;}
		.search .select_showbox{height:35px;background:url({{asset('/images/search_ico.png') }}) no-repeat 80px center;text-indent:1.5em;}
		.search .select_showbox.active{background:url({{asset('/images/search_ico_hover.png') }}) no-repeat 80px center;}
		.search .select_option{border:2px solid #f58400;border-top:none;display:none;left:-2px;top:35px;position:absolute;z-index:99;background:#fff;}
		.search .select_option li{text-indent:1.5em;width:90px;cursor:pointer;}
		.search .select_option li.selected{background-color:#F3F3F3;color:#999;}
		.search .select_option li.hover{background:#BEBEBE;color:#fff;}

		.search input.inp_srh,.search input.btn_srh{border:none;background:none;height:33px;line-height:35px;float:left;margin:0;padding:0;}
		.search input.inp_srh{outline:none;width:265px;}
		.search input.btn_srh{background:#f58400;color:#FFF;font-family:"微软雅黑";font-size:15px;width:55px;}

		#searchbtn:hover{
			color:#f54242;
		}
		#searchbtn{
			color:#4F4F4F;
		}

		/*#rt-div{width:26px; height:338px; background:url( "{{asset('/images/r3.gif') }}") no-repeat;}*/

	</style>
	<script>
		function searchbtn(){
			html = '\
				<form  class="form-inline" id="searchform" method="post" action=\'{{ url("pages/listindex") }}\'>\
				<input type="hidden" name="_token" value="{{ csrf_token() }}">\
				<div class="input-append">\
				<select class="form-control" name="querytype" style="width:80px;height:30px;position:relative;top:0px">\
					<option value="0"></option>\
					<option value="1">栏目名</option>\
					<option value="2">题目</option>\
					<option value="3">作者</option>\
					<option value="4">内容</option>\
				</select> \
			    <input  name="keyword"  class="form-control" placeholder="请输入您要搜索的内容" style="width:150px;height:30px;position:relative;top:0px">\
				<button class="btn" style="width:35px;height:30px;position:relative;top:0px" onclick="document.getElementById(\'searchform\').submit();return false" ><span class="glyphicon glyphicon-search" aria-hidden="true"></button>\
			  	<input type="button" class="btn" onClick="searchbtndel();" value="X">\
			  </div></form>';
			$("#searchdiv").html(html);
		}
		function searchbtndel(){
			$("#searchdiv").html('<a id="searchbtn" href="javascript:void(0)" onClick="searchbtn();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>查找</a>');
		}

		$(function(){
			$("#rt-div").floatdiv({right:"0",top:"300px"});//设置浮动层靠右距离为0，靠上距离50px 根据需求调整

			//读取配置文件
			url = "{{URL('/appconf')}}";
		    //alert(url);
		    $.ajax({  
		        type: "post",  
		        url: url,  
		        dataType: "text", 
		        data:{"_token":"{{ csrf_token() }}"},  
		        success: function(data){
		        
					data = eval('(' + data + ')');

					html = '<img src="'+data['logo']+'"  height="68px">' ;

					$("#logoimage").html(html);

					//底部导航
					otherhrefname = data['otherhrefname'].split(",");
					otherhrefpid = data['otherhrefpid'].split(",");
					if(otherhrefname.length == otherhrefpid.length ){
					  for( n in otherhrefname){
						html = '|<a href="pages/page/'+otherhrefpid[n]+'" >'+otherhrefname[n]+'</a>';
						$("#bottomhref").append(html);
					  }
					}

					//菜单栏
					menu = data['menu'].split(",");
					menuhref = data['menuhref'].split(",");
					if(menu.length == menuhref.length ){
					  for( n in menu){
						html = '<li><a href="/pages/list/'+menuhref[n]+'">'+menu[n]+'</a></li>';
						$("#menufind").before(html);
					  }
					}

					//icp
					$("#icp").html(data['icp']);
		        } ,
		        error : function(msg){
		          alert("ajax error!");
		        },
		      });
		});
	</script>
</head>
<body>

	<!-- <div id="rt-div"></div> -->


	<div id='head'> 

		<div style="position:absolute;right:100px;padding:5px">
			<!-- JiaThis Button BEGIN -->
			<div class="jiathis_style" style="float:left">
				<span class="jiathis_txt">分享到：</span>
				<a class="jiathis_button_tools_1"></a>
				<a class="jiathis_button_tools_2"></a>
				<a class="jiathis_button_tools_3"></a>
				<a class="jiathis_button_tools_4"></a>
				<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
				<a class="jiathis_counter_style"></a>
			</div>
			<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
			<!-- JiaThis Button END -->

			<ul class="" style="float:left">
			@if (Auth::guest())
				<li style="display:inline;vertical-align:middle;margin:5px"><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;登录&nbsp;&nbsp;</a></li>
				<li style="display:inline;vertical-align:middle;margin:5px"><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;注册&nbsp;&nbsp;</a></li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu" style="width:50px">
						<li ><a href="{{ url('/user/') }}">个人主页</a></li>
						<li><a href="{{ url('/auth/logout') }}">退出</a></li>
						@if ( Auth::user()->status == 10)
							<li><a href="{{ url('/admin') }}">后台管理</a></li>
						@endif
					</ul>
				</li>

			@endif
			</ul>
		</div>
	</div>
	<div id='logo' >
		<div style="position:relative;left:10px;top:10px;float:left" id="logoimage">
			<!-- <img src=" {{asset('/images/logo.png') }}"  height="68px"> -->
		</div>
		<div style="float:right;position:relative;top:30px;right:150px" id="searchdiv">
			<a id="searchbtn" href="javascript:void(0)" onClick="searchbtn();">
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span>查找
			</a>
		</div>
		
		<!-- <div class="search">
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
		</div> -->
		<!-- <div style="float:left"><a href="{{ url('pages/goquery') }}">高级搜索</a></div> -->
		<script type="text/javascript" src="{{ asset('/js/jquery.select.js')}}"></script>
	</div>
	<div id='amenu'>
		<ul class="menu cf">
			<li id="menuindex"><a href="{{ url('/') }}">首页</a></li>
			<!-- <li>
				<a href="/pages/list/8">资讯</a>
			</li>
			<li><a href="/pages/list/9">政策</a></li>
			<li>
				<a href="/pages/list/10">药品</a>
			</li>
			<li><a href="/pages/list/11">器械</a></li>
			<li><a href="{{ url('/pages/list/12') }}">营销</a></li> -->
			<li id="menufind"><a href="{{ url('pages/goquery') }}">高级搜索</a></li>
		</ul>
	</div>
	
	
	@yield('content')

	

	<div id='bottom' style="color:#000">
		<hr>


		<div class="boot" id="bottomhref"><!-- 关于我们 | <a href="{{ url('law') }}">法律声明</a> | 联系我们 | --> <a href="{{ url('/pages/list/17') }}">社会招聘</a> </div>

		<div class="boot" id="icp"></div>

		<div class="boot"></div>

	</div>
	
</body>
</html>
