@extends('adminapp')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑会员</div>

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

          <form action="{{ URL('admin/ads/'.$ad->id) }}" method="POST"  enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            广告标题：
            <input type="text" name="title" class="form-control" required="required" style="width:200px" value="{{$ad->title}}"> 
            <hr>
            广告商：
            <input type="text" name="sendperson" class="form-control" required="required" style="width:200px" value="{{$ad->sendperson}}">
            <hr>
            失效日期：{{$ad->enddate}}
            <input type="date" name="enddate" class="form-control" required="required" style="width:200px">
            <hr>
            跳转url：
            <input type="text" name="url" class="form-control" required="required" style="width:200px" value="{{$ad->url}}">
            <hr>
            图片：<img src="{{ $ad->imgae}}" height="40" width="50" alt="{{ $ad->title }}"/>
            <input type="file" name="image" ></td>
            <hr>
            类型：{{$ad->type}}
            <select style="width:200px" name="type">
              <option value="0">首页顶部</option>
              <option value="1">首页两侧</option>
              <option value="2">首页底部</option>
              <option value="3">列表页右侧</option>
            </select>
            <hr>
            备注：
            <textarea style="width:100%" name="memo">{{$ad->memo}}</textarea>
            <hr>
            <button class="btn btn-lg btn-info">编辑</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection