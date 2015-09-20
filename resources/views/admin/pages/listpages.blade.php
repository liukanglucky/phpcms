@extends('adminapp')


@section('content')
<div class="container" style="min-width:1100px">
  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">文章管理</div>

        <div class="panel-body">

          <form method="post" action="{{ url('admin/pages/list')}}" >
            <!-- <form method="post" action=""> -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            文章题目：
            <input  name="title"  placeholder="题目" type="text">
            栏目名称：
            <select name="sname"  style="width:200px">
              <option value=""></option>
              @foreach ($subjects as $subject)
                <option value="{{$subject->name}}">{{$subject->name}}</option>
              @endforeach
            </select>
            文章内容：
            <input  name="content"  placeholder="文章内容" type="text"><br>
            发布日期：
            <input  name="create_at_begin"  placeholder="开始时间" type="date">
            <input  name="create_at_end"  placeholder="结束时间" type="date"><br>
            <input class="btn btn-success" type="submit" name="submit" value="搜索">
          </form>

        <!-- <a href="{{ URL('admin/pages/create') }}" class="btn btn-lg btn-primary">新增</a> -->
          <table class="table">
            <tr>
              <td>文章编号</td>
              <td>文章标题</td>
              <td>栏目名称</td>
              <td>收费金币</td>
              <td>创建时间</td>
              <td>操作</td>
            </tr>
            @foreach ($pages as $page)
              <tr>
              <td>{{ $page->id }}</td>
              <td style="width:300px;overflow:hidden">{{ $page->title }}</td>
              <td>{{ $page->sname }}_{{$page->sid}}</td>
              <td>{{ $page->coin }}</td>
              <td>{{ $page->created_at }}</td>
              <td >
                <a href="{{ URL('admin/pages/'.$page->id.'/edit') }}" class="btn btn-success">编辑</a>

                <form action="{{ URL('admin/pages/'.$page->id) }}" method="POST" style="display: inline;">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger">删除</button>
                </form>
                
                 <a href="{{ URL('pages/page/'.$page->id) }}" class="btn btn-warning">预览</a>

              </td>
            </tr>
              
            @endforeach
          </table>



        </div>
        <?php echo $pages->render(); ?>
      </div>
    </div>
  </div>
</div>
@endsection
