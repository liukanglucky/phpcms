@extends('adminapp')

@section('content')
<div class="container" >

  <div style="background-color:#fff" class="col-md-10 col-md-offset-1">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active" onClick="hidd();">
        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">系统消息</a>
      </li>
      <li role="presentation" onClick="hidd();">
        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">用户消息</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        收件群组：<font color="red">填写用户组ID，用英文逗号分割;不填写将发送给所有用户</font><br>
        <textarea class="form-control" id="receiver_ugids"></textarea>
        <input type="button" class="btn btn-warning" value="编辑消息" onClick="msg('sys');">
      </div>
      <div role="tabpanel" class="tab-pane" id="profile">
        收件人：<font color="red">填写用户ID，用英文逗号分割</font><br>
        <textarea class="form-control" id="receiver_ids"></textarea>
        <input type="button" class="btn btn-warning" value="编辑消息" onClick="msg('usr');">
      </div>
    </div>

  </div>

  <div class="row" id="row" style="display:none">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">发送消息</div>

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

          <form action="{{ URL('admin/msg/dosend') }}" method="POST" id="form" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="msgtype" id="msgtype"> 
                  <input type="hidden" name="receiverid" id="receiverid">
                   <input type="hidden" name="receiverugid" id="receiverugid">
                  标题：
                  <input type="text" name="title" class="form-control" required="required" id="title" >
                </td>
              </tr>
              <!-- <tr>
                <td>
                  收件人：<font>填写收件人id，多个收件人用逗号隔开</font><br>
                  <input type="text" name="title" class="form-control" required="required" id="title" >
                </td>
              </tr> -->
              <tr>
                <td colspan="2">
                  内容：
                  <!-- <textarea name="content" rows="10" class="form-control" required="required"></textarea> -->
                  <!-- 加载编辑器的容器 -->
                  <script id="container"  type="text/plain"  style="min-width:100%;min-height:400px;">
                    
                  </script>
                </td>
              </tr>
            </table>
            <input type="button" class="btn btn-info" onClick="getAllHtml()" value="发送消息">
            <!-- 配置文件 -->
            <script type="text/javascript" src="{{ asset('/js/ueditor/ueditor.config.js') }}"></script>
            <!-- 编辑器源码文件 -->
            <script type="text/javascript" src="{{ asset('/js/ueditor/ueditor.all.js') }}"></script>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
                function hidd(){
                  $("#row").slideUp(100);
                }

                function msg(para){
                  if(para == 'sys'){
                    $("#msgtype").val('0');
                    $("#receiverugid").val($("#receiver_ugids").val());
                  }
                  if(para == 'usr'){
                    if($("#receiver_ids").val() == ""){alert("用户消息，用户ID不能为空");return;}
                    $("#msgtype").val('1');
                    $("#receiverid").val($("#receiver_ids").val());
                  }
                  $("#row").slideDown(100);
                }
                var ue = UE.getEditor('container');
                function getAllHtml() {
                    var title = $("#title").val();
                    if(title == null || title == ""){
                      alert("题目不能为空");
                      return;
                    }
                    
                    var content= UE.getEditor('container').getContent();
                    if(content == null || content == ""){
                      alert("内容不能为空");
                      return;
                    }

                    $("#container").append('<textarea name="body" id="content"></textarea>');
                    $("#content").val(content);
                    //alert($("#content").html());
                    $("#form").submit();
                }
            </script>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection