@extends('app')
<style>
#main {
  width:1000px;
  height:600px;
  margin-left:auto;
  margin-right:auto;
}
#right1 {
  width:240px;
  height:600px;
  /*background-color:#FFBBFF;*/
  float:left;
  margin-left:10px;
}
#left1 {
  width:750px;
  /*height:600px;*/
  /*background-color:#FFF68F;*/
  float:left;
}

#left2 {
  width:200px;
  /*height:600px;*/
  /*background-color:#FFF68F;*/
  float:left;
}

#left3 {
  width:500px;
  /*height:600px;*/
  /*background-color:#FFF68F;*/
  margin-right: auto;
  margin-left: 20px;
  float:left;
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
</style>

@section('content')

<div id="main">
  <div class="container" id="left1">
  <div id='left2'>
      <div class="list-group">
      <a href="#" class="list-group-item active">
        个人中心
      </a>
      <a href="/user/edit/{{$u->id}}" class="list-group-item">修改信息</a>
      <a href="/user/wealthdetail/{{$u->id}}" class="list-group-item">金币详情</a>
      <a href="/user/wealthadd/{{$u->id}}" class="list-group-item">金币充值</a>
      <a href="/user/history/{{$u->id}}" class="list-group-item">浏览历史</a>
      <a href="/user/msglist/{{$u->id}}" class="list-group-item">消息中心</a>
    </div>
    </div>
    
    <div id="left3"> 
      <div class="panel-heading">修改信息</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('user/update/'.$u->id) }}" method="POST"  enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            EMail：
            <input type="text" name="email" class="form-control" required="required" style="width:200px" value="{{ $u->email }}">
            <hr>
            姓名：
            <input type="text" name="name" class="form-control" required="required" style="width:200px" value="{{ $u->name }}">
            <hr>
            昵称：
            <input type="text" name="nickname" class="form-control" required="required" style="width:200px" value="{{ $u->nickname }}">
            <hr>
            用户身份：
            <input type="text" readonly name="ugid" value="{{$u->ugname}}"> 
            <hr>
            
            <button class="btn btn-lg btn-info">编辑</button>
          </form>

        </div>
    </div>
  </div>

  <!-- <div id='right1'>
    <div class="firsttitle"></div>
  </div> -->
</div>
@endsection