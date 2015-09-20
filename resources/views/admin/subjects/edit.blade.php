@extends('adminapp')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑栏目</div>

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

          <form action="{{ URL('admin/subjects/'.$subject->id) }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            栏目名称：
            <input type="text" name="name" class="form-control" required="required" value="{{ $subject->name }}" style＝"width:200px">
            权重：
            <input type="text" name="weight" class="form-control" required="required" value="{{ $subject->weight }}" style＝"width:200px">
            <br>
           
            <br>
            <button class="btn btn-lg btn-info">编辑</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection