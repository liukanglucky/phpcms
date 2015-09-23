@extends('adminapp')


@section('content')
<div class="container" style="min-width:1100px">
  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">文章管理</div>

        <div class="panel-body">

          <form method="post" action="{{ url('admin/comments/listcomments')}}"  class="form-inline">
            <!-- <form method="post" action=""> -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control">
            文章题目：
            <input  name="panme"  placeholder="题目" type="text"  class="form-control">
            发布用户：
            <input  name="uname"  placeholder="用户名" type="text"  class="form-control">
            状态：
            <select name="state"  class="form-control">
              <option value=""></option>
              <option value="0">待审核</option><option value="－1">未通过</option><option value="1">通过</option>
            </select>
            <input class="btn btn-success" type="submit" name="submit" value="搜索">
          </form>

        <!-- <a href="{{ URL('admin/pages/create') }}" class="btn btn-lg btn-primary">新增</a> -->
          <table class="table">
            <tr class="active">
              <td style="width:50px">编号</td>
              <td style="width:100px">用户名</td>
              <td>评论内容</td>
              <td>操作</td>
            </tr>
            @foreach ($comments as $c)
              <tr>
              <td style="width:50px">{{ $c->id }}</td>
              <td style="width:100px">{{ $c->uname }}</td>
              <td style="width:400px;word-wrap: break-word;word-break: normal;">{{ $c->content }}</td>
              <td>
                <form action="{{ URL('admin/comments/delete/'.$c->id) }}" method="POST" style="display: inline;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-warning">删除</button>
                </form>
                <form action="{{ URL('admin/comments/pass/'.$c->id.'/1') }}" method="POST" style="display: inline;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="submit" class="btn btn-info" value="通过">
                </form>
                <form action="{{ URL('admin/comments/pass/'.$c->id.'/2') }}" method="POST" style="display: inline;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="submit" class="btn btn-primary" value="不通过">
                </form>
              </td>
            </tr>
              
            @endforeach
          </table>



        </div>
        <?php echo $comments->render(); ?>
      </div>
    </div>
  </div>
</div>
@endsection
