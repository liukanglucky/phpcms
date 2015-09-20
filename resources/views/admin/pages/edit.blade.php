@extends('adminapp')

@section('content')
<!-- 配置文件 -->
<script type="text/javascript" src="{{ asset('/js/ueditor/ueditor.config.js') }}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{ asset('/js/ueditor/ueditor.all.js') }}"></script>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑 Page</div>

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

          <form action="{{ URL('admin/pages/'.$page->id) }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table">
              <tr>
                <td>
                   <!-- -->
                    栏目名称：{{$page->sname}}
                    <select name="sidsname"  style="width:200px">
                      @foreach ($subjects as $subject)
                        <option value="{{$subject->id}},{{$subject->name}}">{{$subject->name}}</option>
                      @endforeach
                    </select>
                </td>
                <td>
                  文章题目：
                  <input type="text" name="title" class="form-control" required="required" id="title" style="width:200px" value="{{$page->title}}">
                </td>
              </tr>
              <tr>
                <td>
                  是否需要付费：{{$page->isCharge}}
                  <select name="isCharge"  style="width:200px">
                      <option value="0">免费</option>
                      <option value="1">付费</option>
                  </select>
                </td>
                <td>
                   所需金币：<input type="text" name="coin" value="{{$page->coin}}" required="required" class="form-control" style="width:200px">
                </td>
              </tr>
              <tr>
                <td>
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
                  文章内容：<input type="button" class="btn btn-warning" value="导入内容" onClick="setContent()">
                  <!-- <textarea name="content" rows="10" class="form-control" required="required"></textarea> -->
                  <!-- 加载编辑器的容器 -->
                  <script id="container"  type="text/plain"  style="min-width:100%;min-height:600px;">
                    
                  </script>
                  
                </td>
              </tr>
            </table>
            <button class="btn btn-info" onClick="getAllHtml()">编辑 Page</button>
          </form>
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

                function setContent(isAppendTo) {
                    var html = '<?php echo $page->content ; ?>';
                    UE.getEditor('container').setContent(html, "");
                    //alert(arr.join("\n"));
                }
            </script>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection