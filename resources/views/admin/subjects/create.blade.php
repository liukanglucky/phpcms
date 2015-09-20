@extends('adminapp')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增栏目</div>

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

          <form action="{{ URL('admin/subjects') }}" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            栏目名称：<input type="text" name="name" class="form-control" required="required" style="width:200px">
            <hr>
            <!-- <textarea name="content" rows="10" class="form-control" required="required"></textarea> -->
            上传栏目图标png格式<input type="file" name="icon" >
            <br>
            权重<input type="text" name="weight" class="form-control" required="required" style＝"width:200px">
            <button class="btn btn-lg btn-info">新增栏目</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection