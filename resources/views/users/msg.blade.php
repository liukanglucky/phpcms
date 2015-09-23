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
		  <a href="/user/edit/{{$user->id}}" class="list-group-item">修改信息</a>
		  <a href="/user/wealthdetail/{{$user->id}}" class="list-group-item">金币详情</a>
		  <a href="/user/wealthadd/{{$user->id}}" class="list-group-item">金币充值</a>
		  <a href="/user/history/{{$user->id}}" class="list-group-item">浏览历史</a>
      <a href="/user/msglist/{{$user->id}}" class="list-group-item">消息中心</a>
		</div>
  	</div>
    
    <div id="left3"> 
      <div class="list-group">
        <a href="#" class="list-group-item active">
          系统消息
        </a>
        @foreach ($sysMsg as $um)
          <a href="/user/msgdetail/{{$um->id}}" class="list-group-item">{{$um->title}}
          <font style="float:right">
            {{$um->updated_at}}
          </font>
        </a>
        @endforeach

      </div>

      <div class="list-group">
        <a href="#" class="list-group-item active">
          用户组消息
        </a>
        @foreach ($ugMsg as $um)
          <a href="/user/msgdetail/{{$um->id}}" class="list-group-item">{{$um->title}}
          <font style="float:right">
            {{$um->updated_at}}
          </font>
        </a>
        @endforeach

      </div>

      <div class="list-group">
        <a href="#" class="list-group-item active">
          用户消息
        </a>
        <a href="#" class="list-group-item" style="background-color:#EFF4FA">
          未读
        </a>
        @foreach ($userMsg as $um)
          <a href="/user/msgdetail/{{$um->id}}" class="list-group-item">{{$um->title}}
          <font style="float:right">
            {{$um->updated_at}}
          </font>
        </a>
        @endforeach

        <a href="#" class="list-group-item" style="background-color:#EFF4FA">
          已读
        </a>
        @foreach ($userMsg2 as $um)
          <a href="/user/msgdetail/{{$um->id}}" class="list-group-item">{{$um->title}}
          <font style="float:right">
            {{$um->updated_at}}
          </font>
        </a>
        @endforeach
      </div>

    </div>
  </div>

  <!-- <div id='right1'>
    <div class="firsttitle"></div>
  </div> -->
</div>
@endsection