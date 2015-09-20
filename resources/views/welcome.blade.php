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
	height:290px;
	border:0px solid #000;
	float:left;
	margin-left:6.5px;
	margin-right:6.5px;
	margin-top:5px;
	margin-bottom:10px;
}

.firsttitle {
	width:100%;
	height:30px;
	/*background-color:#D9D9D9;*/
	margin-left:auto;
	margin-right:auto;
	margin-bottom:0px;
	background-color: #d66403;
	 /*background: -moz-linear-gradient(top, #FEFEFE 0%, #00CCFF 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FEFEFE), color-stop(100%,#00CCFF));
    background: -webkit-linear-gradient(top, #FEFEFE 0%,#00CCFF 100%);
    background: -o-linear-gradient(top, #FEFEFE 0%,#00CCFF 100%);
    background: -ms-linear-gradient(top, #FEFEFE 0%,#00CCFF 100%);
    background: linear-gradient(to bottom, #FEFEFE 0%,#00CCFF 100%);*/
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
	height:880px;
	/*background-color:#F08080;*/
	float:left;
	margin-left:10px;
	margin-top:10px;
	margin-bottom:10px;
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

}



</style>
@section('content')


</div>



<div id='main'>
	<div id='left1'>
		<div id='second'>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin:0">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="{{ asset('/images/02.jpg') }}"alt="...">
			      <div class="carousel-caption">
			        ...
			      </div>
			    </div>
			    <div class="item">
			      <img src="{{ asset('/images/02.jpg') }}" alt="...">
			      <div class="carousel-caption">
			        ...
			      </div>
			    </div>
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>


		</div>
		<div class='first'>
			<div class="firsttitle"></div>
		</div>
		<div class='first'>
			<div class="firsttitle"></div>
		</div>	
	</div>
	<div id='right1'>
		<div class="firsttitle">网站公告</div>
	</div>
</div>
<div id='layer4'>
	<div id='left2'>
		<div class='third'>
			<div class="firsttitle"></div>
		</div>
		<div class='third'>
			<div class="firsttitle"></div>
		</div>
		<div class='third'>
			<div class="firsttitle"></div>
		</div>
		<div class='third'>
			<div class="firsttitle"></div>
		</div>
		<div class='third'>
			<div class="firsttitle"></div>
		</div>
		<div class='third'>
			<div class="firsttitle"></div>
		</div>
	</div>
	<div id='right2'>
		<div class="firsttitle"></div>
	</div>
</div>



@endsection