@extends('adminapp')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增广告</div>

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

          <form action="{{ URL('admin/ads') }}" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            广告标题：
            <input type="text" name="title" class="form-control" required="required" style="width:200px">
            <hr>
            广告商：
            <input type="text" name="sendperson" class="form-control" required="required" style="width:200px">
            <hr>
            失效日期：
            <input type="date" name="enddate" class="form-control" required="required" style="width:200px">
            <hr>
            跳转url：
            <input type="text" name="url" class="form-control"  style="width:200px">
            例如：“http://www.baidu.com”
            <hr>
            图片：
            <input type="file" name="image" ></td>
            <hr>
            图片大小（宽［横向长度］＊高［纵向长度］）：顶部，底部：1920*200 首页右侧：300*840 ，列表页右侧：300*600，文章页右侧：300*600，页面两侧浮动：100*300
            <hr>
            类型：
            <select style="width:200px" name="type">
              <option value="0">首页顶部</option>
              <option value="1">首页底部</option>
              <option value="2">首页页面两侧浮动</option>
              <option value="3">首页右侧</option>
              <option value="4">列表页右侧</option>
              <option value="5">列表页顶部</option>
              <option value="6">列表页底部</option>
              <option value="7">文章页右侧</option>
              <option value="8">文章页顶部</option>
              <option value="9">文章页底部</option>
            </select>
            <hr>
            备注：
            <textarea style="width:100%" name="memo"></textarea>
            <hr>
            <button class="btn btn-lg btn-info">新增</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection