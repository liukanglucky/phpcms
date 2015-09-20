@extends('adminapp')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑会员</div>

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

          <form action="{{ URL('admin/users/'.$u->id) }}" method="POST"  enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            EMail：
            <input type="text" name="email" class="form-control" required="required" style="width:200px" value="{{ $u->email }}">
            <hr>
            姓名：
            <input type="text" name="name" class="form-control" required="required" style="width:200px" value="{{ $u->name }}">
            <hr>
            昵称：
            <input type="text" name="nickname" class="form-control" required="required" style="width:200px" value="{{ $u->nickname }}">
            <hr>
            用户身份：
            <select style="width:200px" name="ugid">
              @foreach ($ugs as $ug)
                <option value="{{$ug->id}}:{{$ug->name}}">{{$ug->name}}</option>
              @endforeach
            </select>
            <hr>
            积分：
            <input type="text" name="point" class="form-control" required="required" style="width:200px" value="{{ $u->point }}">
            <hr>
            <!-- <textarea name="content" rows="10" class="form-control" required="required"></textarea> -->
            金币：
            <input type="text" name="gold" class="form-control" required="required" style="width:200px" value="{{ $u->gold }}">
            <hr>
            身份：
            <input type="text" name="status" class="form-control" required="required" style="width:200px" value="{{ $u->status }}">
            <hr>
            <button class="btn btn-lg btn-info">编辑</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection