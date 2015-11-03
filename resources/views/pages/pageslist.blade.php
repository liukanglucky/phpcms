@extends('app')
<style>
#main {
  width:1100px;
  min-height:600px;
  margin-left:auto;
  margin-right:auto;
}

#right1 {
  width:240px;
  height:600px;
  background-color:#fff;
  float:left;
  margin-left:10px;
  border:1px solid #c6c6c6;
  position:relative;
  margin-top: 15px;
  /*left:80px;*/
}
#left1 {
  min-width:800px;
  width:800px;
  margin-top: 15px;
 /* position:relative;*/
  /*left:100px;*/
  /*height:600px;*/
  /*background-color:#FFF68F;*/
  float:left;
}

.page{
  margin-bottom: 5px;
  margin-left: 5px;
}

.firsttitle {
  position: relative;
  width:100%;
  height:30px;
  background-image:url("{{ asset('/images/right_title_bg.gif') }}");
  background-position: 0,0;
  top:-17px;
  background-size:100% 100%;
  background-repeat: no-repeat;
  /*background-color:#D9D9D9;*/
  margin-left:auto;
  margin-right:auto;
  margin-bottom:0px;
  /*background-color: #d66403;*/
  vertical-align:middle;

 /* background: -moz-linear-gradient(top, #FEFEFE 0%, #ACACAC 90%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FEFEFE), color-stop(90%,#ACACAC));
    background: -webkit-linear-gradient(top, #FEFEFE 0%,#ACACAC 90%);
    background: -o-linear-gradient(top, #FEFEFE 0%,#ACACAC 90%);
    background: -ms-linear-gradient(top, #FEFEFE 0%,#ACACAC 90%);
    background: linear-gradient(to bottom, #FEFEFE 0%,#ACACAC 90%);*/
}

.font{
  position: relative;
  top:6px;
  left:10px;
  font-size:14px;
  vertical-align: middle;
  color:white;
  font-family:"微软雅黑";
}

.font span{
  color:#f58400;
  display: none;
}

.ad{
  width:1000px;
  height: 155px;
  margin-left:auto;
  margin-right:auto;
}
</style>
@section('content')
<!-- 广告位 -->
<div class="ad">
@if ($ad_head != null)
  <a href="{{ $ad_head->url }}"><img   src="{{ $ad_head->image }}" alt=""></a>

  <br><br>
@else
  <embed   src="{{ asset('/images/index.swf') }}" alt="" style="width:1000;height:150"></embed>

<br><br>
@endif
</div>

<div id="main">
<div class="container" id="left1">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">

        <div class="panel-body" style="min-height:600px">
          @if ($subject != null)
            
            <div  style="width:240px;margin-left:10px">
              <ol class="breadcrumb">
                <li><a href="#">文章中心</a></li>
                <li><a href="#">{{$subject->name}}</a></li>
                <!-- <li class="active">Data</li> -->
              </ol>
           </div>
          @endif
          @foreach ($pages as $page)
            <div class="page">
              <p style="margin-bottom:5px;margin-top:5px;color:#4F4F4F;width:600px;overflow:hidden;text-overflow:ellipsis;">
                <font > &nbsp;&nbsp;>&nbsp;&nbsp; </font>
                <a style="color:#4F4F4F" href="{{ url('/pages/page/')."/".$page->id }}">{{ $page->title }}</a>
                <font style="float:right">{{$page->created_at}}</font>
              </p>
              <DIV style="BORDER-TOP: #00686b 1px dashed; OVERFLOW: hidden; HEIGHT: 1px;"></DIV>
              <!-- <div class="content">
                <p>
                  {{ $page->content }}
                </p>
              </div> -->
            </div>
          @endforeach



        </div>
        <?php echo $pages->render(); ?>
      </div>
    </div>
  </div>
</div>

<div id='right1'>
  <div class="firsttitle">
	<strong><font class="font" color="white" >&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>&nbsp;&nbsp;站内广告</font></strong>
  <br><br>
  @if ($ad_right != null)
  <a href="{{ $ad_right->url }}"><img   src="{{ $ad_right->image }}" alt=""></a>
  @else
        <img src="{{asset('/images/adzs.gif') }}" alt="" style="width:100%">
  @endif
  </div>
</div>
</div>

<br><br>
<!-- 广告位 -->
<div class="ad">
@if ($ad_foot != null)
  <a href="{{ $ad_foot->url }}"><img   src="{{ $ad_foot->image }}" alt=""></a>

  <br><br>
@else
  <embed   src="{{ asset('/images/index.swf') }}" alt="" style="width:1000;height:150"></embed>

<br><br>
@endif
</div>
@endsection
