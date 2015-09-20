@extends('adminapp')


@section('content')
<div class="container">
  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">栏目管理</div>

        <div class="panel-body">

        <!-- <a href="{{ URL('admin/subjects/create') }}" class="btn btn-lg btn-primary">新增</a> -->
        <form  method="post" action="{{ url('admin/subjects/list') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input class="inp_srh" name="name"  placeholder="栏目名称" >
          <input class="btn btn-success" type="submit" name="submit" value="搜索">
        </form>
          <table class="table">
            <tr>
              <td>栏目编号</td>
              <td>栏目图标</td>
              <td>栏目名称</td>
              <td>权重</td>
              <td>创建日期</td>
              <td>创建人</td>
              <td>操作</td>
            </tr>
          @foreach ($subjects as $subject)
          <tr>
            <td>{{ $subject->id }}</td>
            <td><img src="{{ $subject->icon}}" height="40" width="50" alt="{{ $subject->name }}"/></td>
            <td>{{ $subject->name }}</td>
            <td>{{$subject->weight}}</td>
            <td>{{ $subject->created_at }}</td>
            <td>{{ $subject->person }}</td>
            <td>
              <a href="{{ URL('admin/subjects/'.$subject->id.'/edit') }}" class="btn btn-success">编辑</a>

              <form action="{{ URL('admin/subjects/'.$subject->id) }}" method="POST" style="display: inline;">
                <input name="_method" type="hidden" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">删除</button>
              </form>
            </td>
          </tr>
            
          @endforeach
          </table>



        </div>
        <?php echo $subjects->render(); ?>
      </div>
    </div>
  </div>
</div>
@endsection