@extends('app')
<style>
#main {
  width:1000px;
  min-height:600px;
  margin-left:auto;
  margin-right:auto;
}

#c{
  width:1000px;
  margin-left:auto;
  margin-right:auto;
  float:left;
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
  width:750px;
  min-height:600px;
  background-color:white;
  float:left;
  margin-top: 15px;
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
        top:3px;
        font-size:14px;
        vertical-align: middle;
        color:white;
}

.font span{
  color:#f58400;
  display:none;
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
     <div  style="width:240px;margin-left:10px">
        <ol class="breadcrumb">
          <li><a href="#">文章中心</a></li>
          <li><a href="#">{{$page->sname}}</a></li>
          <!-- <li class="active">Data</li> -->
        </ol>
     </div>
    <div style="text-align:center;">
      <h3 style="margin-left:auto;margin-right:auto;"> {{$page->title}}</h3>
      <font style="margin-left:auto;margin-right:auto;" color="#CCCCCC">{{$page->created_at}} | </font>
      <font style="margin-left:auto;margin-right:auto;" color="#CCCCCC">作者：{{$page->uname}}</font>
    </div>
    <hr>
    @if($msg != null)
      <div class="alert alert-info" role="alert" >
            {{$msg}}
      </div> 
    @endif
    @if($page->image !=null)
	<img src="{{ $page->image }}" alt="首页图片"><hr>
    @endif
    <div id="content">
    
    </div>
    <script>
        var html = '<?php echo $page->content ; ?>';
        $("#content").html(html);
  </script>
    
    
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
  @if( $page->comment == 1)
  <div  id="c" style="min-height:300px;">

    @if (Auth::guest())
       <h4>登录后可以发表评论哦</h4>   
    @else  
       评论：
      <font id="wrongform" color="red">
      {{ $msg }}</font>
      <form action="{{ URL('/pages/comment') }}" method="POST" onsubmit="return form(this)">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="pid" value="{{ $page->id }}">
          <input type="hidden" name="pname" value="{{ $page->name }}">
          <textarea name="content" class="form-control" id="content2"></textarea>
          <input type="submit" class="btn btn-info" value="评论"  >
      </form>
    @endif
    <hr>
    <h4>别人怎么看：</h4>
    @if(count($cs) == 0)
      <h3>还没有评论哦！快来抢沙发啊</h3>
    @else
      @foreach ($cs as $c)
      <div style="overflow:hidden;word-wrap: break-word;word-break: normal; ">
        <br>{{$c->uname}}:  {{$c->content}}<br>
        <DIV style="BORDER-TOP: #00686b 1px dashed; OVERFLOW: hidden; HEIGHT: 1px;"></DIV>
      </div>
      @endforeach
    @endif
  </div>
  @endif
</div>

<script>
  function form(){
    //alert($("#content2").val());

    if($("#content2").val()==null || $("#content2").val()==""){
      $("#wrongform").html("评论不能为空！");
      return false;
    }
    return true;
  }
</script>

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
