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
          说明：您选择的文章为收费文章，阅读将扣除积分！<br>
          阅读该文章前确认您已登录，并且有足够积分
      </div> 
    @else
        <div class="alert alert-info" role="alert" >
            说明：<br>
            阅读此文章将消耗,{{$pagecoin}}金币。<br>
            文章购买一次后将可永久阅读<br>
            您拥有：{{ Auth::user()->gold }}  金币<br>
            @if ( $pagecoin > Auth::user()->gold )
              金币不足，请充值！<br><br>
              <button type="button" class="btn btn-warning" >
                去充值
                <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
              </button>
            @else
              <br>
              <button type="button" class="btn btn-info" onClick="return readyPayAndRead('{{$pageid}}')">
                阅读文章<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </button>

            @endif 
        </div> 

      <iframe style="margin:auto,auto,auto,auto;min-height:500px" frameborder="no" width="90%" src="{{ url('lawframe') }}" scrolling="yes"></iframe>
        
        <div style="position:relative;left:20%">
         

          <div class="checkbox" style="margin:auto,auto,auto,auto;">
            <label>
              <input type="checkbox" name="allow"> 同意协议
            </label>
          </div>
        
            
         
            
        </div>

    @endif
    
  <input type="hidden" id="id" value="{{$pageid}}">
  <input type="hidden" id="coin" value="{{$pagecoin}}">
  
</div>
<script>
  function readyPayAndRead(id){
      if(!$("input[type='checkbox']").is(":checked")){
            alert("充值前请先阅读，并同意网站协议");
            return false;
          }
      window.location.href="/pages/readyPayAndRead/"+id;
      
  }
</script>


@endsection