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
<div style="position:relative;width:60%;left:20%;">
  
    @if (Auth::guest())
      <div class="alert alert-danger" role="alert" >
          您还没有登录！<br>
          说明：充值前确保您拥有会员账号，并且登录！<br>
          
      </div> 
    @else
        <div class="alert alert-info" role="alert" >
            说明：<br>
            购买金币只在本网站内使用，可用于阅读收费文章，下载收费资源<br>
            10金币/元<br>
            您拥有：{{ Auth::user()->gold }}  金币<br>
            支付方式：支付宝
        </div> 
        
        <div class="alert alert-warning" role="alert" >
            线上支付即将上线。充值请联系网站管理员刘先生:18603607456
        </div>
        <iframe style="margin:auto,auto,auto,auto;min-height:500px" frameborder="no" width="90%" src="{{ url('lawframe') }}" scrolling="yes"></iframe>
        
        <div style="position:relative;left:20%">
          <form action="{{ URL('admin/aa') }}" method="POST" onSubmit="return check();" enctype="multipart/form-data">

          <div class="checkbox" style="margin:auto,auto,auto,auto;">
            <label>
              <input type="checkbox" name="allow"> 同意协议
            </label>
          </div>
        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- 购买金币数量：<input type="text" name="name" class="form-control" required="required" style="width:200px"> -->
             
            <!-- <button class="btn btn-lg btn-info">充值</button> -->

          </form>
            
        </div>

    @endif
    <script>
        function check(){
          if(!$("input[type='checkbox']").is(":checked")){
            alert("充值前请先阅读，并同意网站协议");
            return false;
          }
          return true;
        }
    </script>
  
</div>


@endsection