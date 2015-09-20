@extends('adminapp')


@section('content')
<div class="container">
  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">积分头衔设置</div>

        <div class="panel-body">

        <!-- <a href="{{ URL('admin/subjects/create') }}" class="btn btn-lg btn-primary">新增</a> -->
        <!-- <form  method="post" action="{{ url('admin/ugs/list') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input class="inp_srh" name="name"  placeholder="栏目名称" >
          <input class="btn btn-success" type="submit" name="submit" value="搜索">
        </form -->
          <table class="table">
            <tr>
              <td>用户组编号</td>
              <td>名称</td>
              <td>所需积分</td>
              <td>备注</td>
              <td>操作</td>
            </tr>
          @foreach ($ugs as $ug)
          <tr>
            <td>{{ $ug->id }}</td>
            <td>{{ $ug->name }}</td>
            <td>{{ $ug->point }}</td>
            <td>{{ $ug->memo }}</td>
            <td>
              <a href="{{ URL('admin/ugs/'.$ug->id.'/edit') }}" class="btn btn-success">编辑</a>

              <form action="{{ URL('admin/ugs/'.$ug->id) }}" method="POST" style="display: inline;">
                <input name="_method" type="hidden" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">删除</button>
              </form>
            </td>
          </tr>
            
          @endforeach
          </table>



        </div>
        <?php echo $ugs->render(); ?>
      </div>
    </div>
  </div>
</div>
@endsection