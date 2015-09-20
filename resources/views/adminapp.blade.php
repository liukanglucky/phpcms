<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台</title>

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
		#logo {
			width:100%;
			height:70px;
			margin-left:auto;
			margin-right:auto;
			/*background-color:#3992d0;*/
			border-bottom:2px solid #3992d0;;
			margin-top:0;
			margin-bottom:0px;	
			/*float:left;*/
		}

	</style>

	<script>
		$(function(){

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
		        } ,
		        error : function(msg){
		          alert("ajax error!");
		        },
		      });
		});
	</script>
</head>
<body>

	<!-- <div id='head'> 

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
	</div> -->

	<div id='logo'>
		<div style="position:relative;left:10px;top:10px;float:left" id="logoimage">
			<!-- <img src=" {{asset('/images/logo.png') }}"  height="68px"> -->
		</div>
		<div style="position:absolute;right:150px;top:20px">
			<ul class="" style="height:30px">
			@if (Auth::guest())
				<li style="display:inline;vertical-align:middle;margin:5px"><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;登录&nbsp;&nbsp;</a></li>
				<li style="display:inline;vertical-align:middle;margin:5px"><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;注册&nbsp;&nbsp;</a></li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><font color="blue">{{ Auth::user()->name }}</font> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/auth/logout') }}">注销</a></li>
					</ul>
				</li>

			@endif
			</ul>
		</div>
	</div>
	<div>
		<div style="float:left;width:200px;">
			@include('left')
		</div>
		<div style="min-width:1100px;float:left;position:relative;left:200px;min-height:1000px;margin-top:30px;min-width:900px">
			@yield('content')
		</div>
	</div>

	<div id='bottom'>
		<hr>


		<div class="boot">关于我们| 产品服务| 友情链接| 法律声明| 人才招聘| 意见反馈| 联系我们</div>

		

	</div>
	
</body>
</html>
