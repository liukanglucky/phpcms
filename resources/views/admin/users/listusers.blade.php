@extends('adminapp')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">用户管理</div>

        <div class="panel-body">

        <a href="{{ URL('admin/users/create') }}" class="btn btn-lg btn-primary">新增</a>
          <table class="table">
            <tr>
              <td>用户编号</td>
              <td>用户名</td>
              <td>email</td>
              <td>用户组</td>
              <td>积分</td>
              <td>金币</td>
              <td>操作</td>
            </tr>
          @foreach ($users as $user)

            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->status }}</td>
              <td>{{ $user->point }}</td>
              <td>{{ $user->gold }}</td>
              <td>
                <a href="{{ URL('admin/users/'.$user->id.'/edit') }}" class="btn btn-success">编辑</a>

                <form action="{{ URL('admin/users/'.$user->id) }}" method="POST" style="display: inline;">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger">删除</button>
                </form>
              </td>
            </tr>
          @endforeach
          </table>



        </div>
        <?php echo $users->render(); ?>
      </div>
    </div>
  </div>
</div>
@endsection