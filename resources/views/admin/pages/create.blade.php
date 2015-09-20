@extends('adminapp')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增文章</div>

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

          <form action="{{ URL('admin/pages') }}" method="POST" id="form" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    栏目名称：
                    <select name="sidsname"  style="width:200px">
                      @foreach ($subjects as $subject)
                        <option value="{{$subject->id}},{{$subject->name}}">{{$subject->name}}</option>
                      @endforeach
                    </select>
                </td>
                <td>
                  文章题目：
                  <input type="text" name="title" class="form-control" required="required" id="title" style="width:200px">
                </td>
              </tr>
              <tr>
                <td>
                  是否需要付费：
                  <select name="isCharge"  style="width:200px">
                      <option value="0">免费</option>
                      <option value="1">付费</option>
                  </select>
                </td>
                <td>
                   所需金币：<input type="text" name="coin" required="required" class="form-control" style="width:200px">
                </td>
              </tr>
              <tr>
                <td >
                  首页图片：
                  <input type="file" name="image" ></td>

                <td >
                  是否开启评论：
                  <select name="comment">
                    <option value="0">否</option> <option value="1">是</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  附件：
                <input type="file" name="file" >
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  文章内容：
                  <!-- <textarea name="content" rows="10" class="form-control" required="required"></textarea> -->
                  <!-- 加载编辑器的容器 -->
                  <script id="container"  type="text/plain"  style="min-width:100%;min-height:600px;">
                    
                  </script>
                </td>
              </tr>
            </table>
            <input type="button" class="btn btn-info" onClick="getAllHtml()" value="新增文章">
            <!-- 配置文件 -->
            <script type="text/javascript" src="{{ asset('/js/ueditor/ueditor.config.js') }}"></script>
            <!-- 编辑器源码文件 -->
            <script type="text/javascript" src="{{ asset('/js/ueditor/ueditor.all.js') }}"></script>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
                var ue = UE.getEditor('container');
                function getAllHtml() {
                    var title = $("#title").val();
                    if(title == null || title == ""){
                      alert("文章题目不能为空");
                      return;
                    }
                    
                    var content= UE.getEditor('container').getContent();
                    if(content == null || content == ""){
                      alert("文章内容不能为空");
                      return;
                    }

                    $("#container").append('<textarea name="content" id="content"></textarea>');
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