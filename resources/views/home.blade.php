@extends('app')
<style type='text/css'>
body {
	margin:0px;
	padding:0px;
}

#main {
	width:1000px;
	height:600px;
	margin-left:auto;
	margin-right:auto;
}
#left1 {
	width:690px;
	height:600px;
	/*background-color:#FFF68F;*/
	float:left;
}
div div div.first {
	width:330px;
	height:310px;
	border:0px solid #000;
	float:left;
	margin-left:6.5px;
	margin-right:6.5px;
	margin-top:5px;
	margin-bottom:10px;
	border:1px solid #c6c6c6;
	background-color: #fff;
}

.firsttitle {
	width:100%;
	height:30px;
	background-image:url("{{ asset('/images/slc_23.gif') }}");
	background-position: 0,0;
	background-repeat: no-repeat;
	/*background-color:#D9D9D9;*/
	margin-left:auto;
	margin-right:auto;
	margin-bottom:0px;
	/*background-color: #d66403;*/
	vertical-align:middle;

	/*background: -moz-linear-gradient(top, #FEFEFE 0%, #CECECE 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FEFEFE), color-stop(100%,#CECECE));
    background: -webkit-linear-gradient(top, #FEFEFE 0%,#CECECE 100%);
    background: -o-linear-gradient(top, #FEFEFE 0%,#CECECE 100%);
    background: -ms-linear-gradient(top, #FEFEFE 0%,#CECECE 100%);
    background: linear-gradient(to bottom, #FEFEFE 0%,#ACACAC 100%);*/
}

#second {
	width:677px;
	height:285px;
	border:0px solid #000;
	clear:both;
	margin-left:auto;
	margin-right:auto;	
}
#right1 {
	width:300px;
	height:600px;
	/*background-color:#FFBBFF;*/
	float:left;
	margin-left:10px;
	border:1px solid #c6c6c6;
	background-color: #fff;
}
#layer4 {
	width:1000px;
	height:880px;
	margin-left:auto;
	margin-right:auto;

}
#left2 {
	width:690px;
	height:880px;
	/*background-color:#9AFF9A;*/
	float:left;
	margin-top:10px;
	margin-bottom:10px;
	
}
#right2 {
	width:300px;
	height:870px;
	/*background-color:#F08080;*/
	float:left;
	margin-left:10px;
	margin-top:10px;
	margin-bottom:10px;
	border:1px solid #c6c6c6;
	background-color: #fff;
}
div div div.third {
	width:333px;
	height:280px;
	border:0px solid #fff;
	float:left;
	margin-left:5px;
	margin-right:5px;
	margin-top:6px;
	margin-bottom:5.5px;
	border:1px solid #c6c6c6;
	background-color: #fff;

}

.font{
	position: relative;
	top:3px;
	font-size:14px;
	vertical-align: middle;
	color:#303030;
	font-family:"微软雅黑";
}

.font span{
	color:#f58400;
	/*隐藏图标*/
	display: none;
}

.title{
	width:320px;
	overflow:hidden;
	text-overflow:ellipsis;
	white-space:nowrap; 
	color:#4F4F4F;
	margin-bottom:2px;
	margin-top:2px
}
.title a{
	color:#4F4F4F;
}
.title a:hover{
	color:#f54242;
}

#ad{
	height: 155px;
	position: relative;
	top:0;
	left:0;
}
#ad img{
	max-height: 150px;
	width: 100%;
}
#ad .b{
	background-color: #fff;
	position: absolute;
	top:0;
	right:10;
	display: none
}

#ad .adimage{
	position: absolute;
	top:0;
	left:0;
	background-color: #fff;
	z-index: -1;
	width: 100%;
}
</style>
<script>
	function closead(){
		var $this = $(this);
		//alert($this.attr("value"));
		//alert($(this));
		$(this).parent().slideUp(1000);
		//alert("done");
	}
</script>
@section('content')

<div id="ad">
	<!-- 广告位 -->
	<input type="button" value="X关闭" class="b" onClick="closead();">
	<div class="adimage">
		@if ($ad_head != null)
			<a href="{{ $ad_head->url }}"><img   src="{{ $ad_head->image }}" alt="" style="width:1920;height:150"></a>

			<br><br>
		@else
			<img   src="{{ asset('/images/nyban.jpg') }}" alt="" style="width:1920;height:150">

		<br><br>
		@endif
	</div>
	
</div>



<div id='main'>
	

	<div id='left1'>
		<div id='second' style="border:1px solid #c6c6c6;">
			<div class="carousel slide" id="carousel-850019">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-850019">
					</li>
					<li data-slide-to="1" data-target="#carousel-850019">
					</li>
					<li data-slide-to="2" data-target="#carousel-850019">
					</li>
				</ol>
				<div class="carousel-inner">
					@if($index != null)
					<div class="item active">
						<img src="{{ $index->image }}" alt="首页图片" style="height:280px;width:677px">
						<div class="carousel-caption">
							
							<p>
								<a href="pages/page/{{$index->id}}">{{$index->title}}</a>
							</p>
						</div>
					</div>
					@else
					<div class="item active">
						<img src="" alt="首页图片" style="height:280px;width:677px">
						<div class="carousel-caption">
							
							<p>
								暂无图文资讯
							</p>
						</div>
					</div>
					@endif

			    @foreach($twzx as $p)
			    <div class="item">
			      <img src="{{ $p->image }}" alt="首页图片" style="height:280px;width:677px">
			      <div class="carousel-caption">
			        <p>
			        	<a href="pages/page/{{$p->id}}">{{$p->title}}</a>
			        </p>
			      </div>
			    </div>
			    @endforeach
				</div> <a data-slide="prev" href="#carousel-850019" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-850019" class="right carousel-control">›</a>
			</div>
			


		</div>
		<div class='first'>
			<div class="firsttitle">
				<strong><font color="white" class="font">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;会员专区</font></strong>
				<a href="{{ url('/pages/list/13') }}"><img  style="position:relative;float:right;right:10px;top:5px" src="{{ asset('/images/more.gif') }}" alt="更多"></a>
			</div>
			@foreach ($hyzq as $p)
			<div class="title" style="position:relative;width: 90%; height: 30px ;left:15px">
				<font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
				<a href="pages/page/{{$p->id}}">{{$p->title}}
<!--<font style="float:right">{{$p->created_at}}</font>--></a></div>
			@endforeach
		</div>
		<div class='first'>
			<div class="firsttitle">
				<strong><font color="white" class="font">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-save" aria-hidden="true"></span>&nbsp;&nbsp;下载专区</font></strong>
				<a href="{{ url('/pages/list/14') }}"><img  style="position:relative;float:right;right:10px;top:5px" src="{{ asset('/images/more.gif') }}" alt="更多"></a>
			</div>
			@foreach ($xzzq as $p)
			<div class="title" style="position:relative;width: 90%; height: 30px ;left:15px">
				<font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
				<a href="pages/page/{{$p->id}}">{{$p->title}}
<!--<font style="float:right">{{$p->created_at}}</font>--></a></div>
			@endforeach
		</div>	
	</div>
	<div id='right1'>
		<div class="firsttitle">
			<strong><font color="white" class="font">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp;站内公告</font></strong>
			<a href="{{ url('/pages/list/13') }}"><img  style="position:relative;float:right;right:10px;top:5px" src="{{ asset('/images/more.gif') }}" alt="更多"></a>
		</div>
		<div id="Marquee" class="Marquee">
			@foreach ($zngg as $gg)
			<div class="title" style="position:relative;width: 90%; height: 30px ;left:15px">
				<font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
				<a href="pages/page/{{$gg->id}}">{{$gg->title}}
<!--<font style="float:right">{{$gg->created_at}}</font>--></a></div>
			@endforeach
		</div>
		
		<script>
		function up(x){
		var Mar = document.getElementById(x);
		var child_div=Mar.getElementsByTagName("div")
		var picH = 60;//移动高度
		var scrollstep=3;//移动步幅,越大越快
		var scrolltime=20;//移动频度(毫秒)越大越慢
		var stoptime=3000;//间断时间(毫秒)
		var tmpH = 0;
		//Mar.innerHTML += Mar.innerHTML;
		function start(){
		if(tmpH < picH){
		tmpH += scrollstep;
		if(tmpH > picH )tmpH = picH ;
		Mar.scrollTop = tmpH;
		setTimeout(start,scrolltime);
		}else{
		tmpH = 0;
		Mar.appendChild(child_div[0]);
		Mar.scrollTop = 0;
		setTimeout(start,stoptime);
		}
		}
		setTimeout(start,stoptime);
		}
		up("Marquee")
		
		</script>

	</div>
</div>
<div id='layer4'>
	<div id='left2'>
		<div class='third'>
			<div class="firsttitle">
				<strong><font color="white" class="font" >&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-gift" aria-hidden="true"></span>&nbsp;&nbsp;招商专区</font></strong>
				<a href="{{ url('/pages/list/15') }}"><img  style="position:relative;float:right;right:10px;top:5px" src="{{ asset('/images/more.gif') }}" alt="更多"></a>
			</div>
			@foreach ($mfzq as $p)
			<div class="title" style="position:relative;width: 90%; height: 30px ;left:15px">
				<font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
				<a href="pages/page/{{$p->id}}">{{$p->title}}
<!--<font style="float:right">{{$p->created_at}}</font>--></a></div>
			@endforeach
		</div>
		<div class='third'>
			<div class="firsttitle">
				<strong><font color="white" class="font">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>&nbsp;&nbsp;付费专区</font></strong>
				<a href="{{ url('/pages/list/16') }}"><img  style="position:relative;float:right;right:10px;top:5px" src="{{ asset('/images/more.gif') }}" alt="更多"></a>
			</div>
			@foreach ($ffzq as $p)
			<div class="title" style="position:relative;width: 90%; height: 30px ;left:15px">
				<font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
				<a href="pages/page/{{$p->id}}">{{$p->title}}
<!--<font style="float:right">{{$p->created_at}}</font>--></a></div>
			@endforeach
		</div>
		<div class='third'>
			<div class="firsttitle">
				<strong><font color="white" class="font">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;&nbsp;资讯</font></strong>
				<a href="{{ url('/pages/list/8') }}"><img  style="position:relative;float:right;right:10px;top:5px" src="{{ asset('/images/more.gif') }}" alt="更多"></a>
			</div>
			@foreach ($zx as $p)
			<div class="title" style="position:relative;width: 90%; height: 30px ;left:15px">
				<font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
				<a href="pages/page/{{$p->id}}">{{$p->title}}
<!--<font style="float:right">{{$p->created_at}}</font>--></a></div>
			@endforeach
		</div>
		<div class='third'>
			<div class="firsttitle">
				<strong><font color="white" class="font">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>&nbsp;&nbsp;政策</font></strong>
				<a href="{{ url('/pages/list/9') }}"><img  style="position:relative;float:right;right:10px;top:5px" src="{{ asset('/images/more.gif') }}" alt="更多"></a>
			</div>
			@foreach ($zc as $p)
			<div class="title" style="position:relative;width: 90%; height: 30px ;left:15px">
				<font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
				<a href="pages/page/{{$p->id}}">{{$p->title}}<!--<font style="float:right">{{$p->created_at}}</font>--></a></div>
			@endforeach
		</div>
		<div class='third'>
			<div class="firsttitle">
				<strong><font color="white" class="font">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>&nbsp;&nbsp;药品</font></strong>
				<a href="{{ url('/pages/list/10') }}"><img  style="position:relative;float:right;right:10px;top:5px" src="{{ asset('/images/more.gif') }}" alt="更多"></a>
			</div>
			@foreach ($yp as $p)
			<div class="title" style="position:relative;width: 90%; height: 30px ;left:15px">
				<font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
				<a href="pages/page/{{$p->id}}">{{$p->title}}<!--<font style="float:right">{{$p->created_at}}</font>--></a></div>
			@endforeach
		</div>
		<div class='third'>
			<div class="firsttitle">
				<strong><font color="white" class="font">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>&nbsp;&nbsp;器械</font></strong>
				<a href="{{ url('/pages/list/11') }}"><img  style="position:relative;float:right;right:10px;top:5px" src="{{ asset('/images/more.gif') }}" alt="更多"></a>
			</div>
			@foreach ($qx as $p)
			<div class="title" style="position:relative;width: 90%; height: 30px ;left:15px">
				<font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
				<a href="pages/page/{{$p->id}}">{{$p->title}}<!--<font style="float:right">{{$p->created_at}}</font>--></a></div>
			@endforeach
		</div>
	</div>
	<div id='right2'>
		<div class="firsttitle">
			<strong><font color="white" class="font">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>&nbsp;&nbsp;站内广告</font></strong>
		
			@if ($ad_right != null)
				<a href="{{ $ad_right ->url }}"><img   src="{{ $ad_right ->image }}" alt=""></a>
			@endif
		</div>
	</div>
</div>


<div id="ad">
	<!-- 广告位 -->
	<input type="button" value="X关闭" class="b" onClick="closead();">
	<div class="adimage">
@if ($ad_foot != null)
	<a href="{{ $ad_foot->url }}"><img   src="{{ $ad_foot->image }}" alt=""></a>

	<br><br>
@else
	<img   src="{{ asset('/images/nyban.jpg') }}" alt="" style="width:1920;height:150">
<br><br>
@endif
	</div>
</div>
@endsection
