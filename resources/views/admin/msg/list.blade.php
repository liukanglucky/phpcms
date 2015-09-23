@extends('adminapp')

@section('content')
<div class="container" >

  <div class="row" id="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">消息列表</div>

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
          <form method="post" action="{{ url('admin/msg/list')}}" class="form-inline">
            <!-- <form method="post" action=""> -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            标题：
            <input  name="title"  placeholder="题目" type="text">
            栏目名称：
            <select name="stat"  style="width:200px">
              <option value=""></option>
              <option value="0">系统消息</option>
              <option value="2">群租消息</option>
              <option value="1">用户消息</option>
            </select>
            <input class="btn btn-success" type="submit" name="submit" value="搜索">
          </form>

          <table class="table">
            <tr>
              <td>编号</td><td>类型</td><td>标题</td><td style="width:300px">内容</td>
              <td>操作</td>
            </tr>
            @foreach($msg as $m)
            <tr>
              <td>{{$m->id}}</td>
              <td>{{$m->msgtype}}</td>
              <td>{{$m->title}}</td>
              <td style="width:300px">{{$m->body}}</td>
              <td>
                <form action="{{ URL('admin/msg/delete/'.$m->id) }}" method="POST" style="display: inline;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger">删除</button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
          <?php echo $msg->render(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection