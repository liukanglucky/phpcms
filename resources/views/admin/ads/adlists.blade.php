@extends('adminapp')


@section('content')
<div class="container">
  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">广告管理</div>

        <div class="panel-body">
          <a href="{{ URL('admin/ads/create') }}" class="btn btn-lg btn-primary">新增</a>
        <!-- <a href="{{ URL('admin/subjects/create') }}" class="btn btn-lg btn-primary">新增</a> -->
        <!-- <form  method="post" action="{{ url('admin/subjects/list') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input class="inp_srh" name="name"  placeholder="栏目名称" >
          <input class="btn btn-success" type="submit" name="submit" value="搜索">
        </form> -->
          <table class="table">
            <tr>
              <td>广告编号</td>
              <td>广告标题</td>
              <td>广告商</td>
              <td>有效日期</td>
              <td>缩略图</td>
              <td>广告类型</td>
              <td>展现次数</td>
              <td>操作</td>
            </tr>
          @foreach ($ads as $ad)
          <tr>
            <td>{{ $ad->id }}</td>
            <td>{{ $ad->title }}</td>
            <td>{{ $ad->sendperson }}</td>
            <td>{{ $ad->created_at }}  -  {{ $ad->enddate }}</td>
            <td><img src="{{ $ad->image }}" height="40" width="50" alt="{{ $ad->title }}"/></td>
            <td>{{ $ad->type }}</td>
            <td>{{ $ad->num }}</td>
            <td>
              <a href="{{ URL('admin/ads/'.$ad->id.'/edit') }}" class="btn btn-success">编辑</a>

              <form action="{{ URL('admin/ads/'.$ad->id) }}" method="POST" style="display: inline;">
                <input name="_method" type="hidden" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">删除</button>
              </form>
            </td>
          </tr>
            
          @endforeach
          </table>



        </div>
        <?php echo $ads->render(); ?>
      </div>
    </div>
  </div>
</div>
@endsection