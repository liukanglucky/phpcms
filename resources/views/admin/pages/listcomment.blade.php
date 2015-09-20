@extends('adminapp')


@section('content')
<div class="container" style="min-width:1100px">
  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">文章管理</div>

        <div class="panel-body">

          <form method="post" action="{{ url('admin/comments/listcomments')}}" >
            <!-- <form method="post" action=""> -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            文章题目：
            <input  name="panme"  placeholder="题目" type="text">
            发布用户：
            <input  name="uname"  placeholder="用户名" type="text"><br>
            状态：
            <select name="state">
              <option value="0">待审核</option><option value="－1">未通过</option><option value="1">通过</option>
            </select>
            <input class="btn btn-success" type="submit" name="submit" value="搜索">
          </form>

        <!-- <a href="{{ URL('admin/pages/create') }}" class="btn btn-lg btn-primary">新增</a> -->
          <table class="table">
            <tr>
              <td>评论编号</td>
              <td>文章标题</td>
              <td>用户名</td>
              <td>评论内容</td>
              <td>操作</td>
            </tr>
            @foreach ($comments as $c)
              <tr>
              <td>{{ $c->id }}</td>
              <td>{{ $c->panme }}</td>
              <td>{{ $c->uname }}</td>
              <td style="width:300px;word-wrap: break-word;word-break: normal;">{{ $c->content }}</td>
              <td >
                
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
