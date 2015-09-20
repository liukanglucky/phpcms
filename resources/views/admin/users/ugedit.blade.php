@extends('adminapp')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑会员等级</div>

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

          <form action="{{ URL('admin/ugs/'.$ug->id) }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            等级名称：<input type="text" name="name" class="form-control" required="required" value="{{ $ug->name }}">
            <br>
            <!-- <textarea name="content" rows="10" class="form-control" required="required"></textarea> -->
            所需积分：<input type="text" name="point" class="form-control" required="required" value="{{ $ug->point }}">
            <br>
            可免费观看栏目:<br>
            @foreach($subjects as $s)
              @if(in_array($s->id,$fs))
               {{$s->name}}<input type="checkbox" value="{{$s->id}}" name="freesubject[]" checked/>
              @else
                {{$s->name}}<input type="checkbox" value="{{$s->id}}" name="freesubject[]" />
              @endif
            @endforeach 
            <br>
            描述：
            <textarea name="memo">{{ $ug->memo }}</textarea>
            <br>
            <button class="btn btn-lg btn-info">编辑</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection