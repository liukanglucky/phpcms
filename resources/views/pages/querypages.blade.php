@extends('app')
<style>
#main {
  width:1100px;
  min-height:1100px;
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
  left:80px;
}
#left1 {
  min-width:800px;
  width:800px;
 /* position:relative;*/
  left:100px;
  /*height:600px;*/
  /*background-color:#FFF68F;*/
  float:left;
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
  color:#303030;
  font-family:"微软雅黑";
}

.font span{
  color:#f58400;
  display: none;
}
</style>
@section('content')
<div id="main">
<div class="container" id="left1">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">

        <div class="panel-body">

          <form method="post" action="{{ url('pages/list')}}" style="width:300px;margin:auto auto auto auto">
            <h3>高级搜索</h3>
            <!-- <form method="post" action=""> -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            文章题目：
            <input class="form-control" name="title"  placeholder="题目" type="text">
            栏目名称：
            <input class="form-control" name="sname"  placeholder="栏目名称" type="text">
            文章内容：
            <input class="form-control" name="content"  placeholder="文章内容" type="text">
            发布日期：
            <input class="form-control" name="create_at_begin"  placeholder="开始时间" type="date">
            <input class="form-control" name="create_at_end"  placeholder="结束时间" type="date">
            <input class="btn btn-success" type="submit" name="submit" value="搜索">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div id='right1'>
  <div class="firsttitle">
  <strong><font class="font" color="white" >&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>&nbsp;&nbsp;站内广告</font></strong>
  </div>
</div>
</div>
@endsection