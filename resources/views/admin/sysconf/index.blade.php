@extends('adminapp')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">系统参数配置</div>

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

          <form action="{{ URL('admin/sysconf/addsysconf') }}" method="POST" id="form" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    网站名称：
                    <input type="text" name="webname" class="form-control" value="{{$conf->webname}}"/>
                </td>
              </tr>
              
              <tr>
                <td >
                  logo图片：<img src="{{ $conf->logo }}" alt="Logo">
                  <input type="file" name="logo" >
                </td>
              </tr>
              <tr>
                <td>
                    关于我们：<font color="red">通过文章管理新增文章，这里只上传文章编号！</font>
                    <input type="text" name="aboutus" class="form-control" value="{{$conf->aboutus}}"/>
                </td>
              </tr>
              <tr>
                <td>
                    法律声明：<font color="red">通过文章管理新增文章，这里只上传文章编号！</font>
                    <input type="text" name="law" class="form-control" value="{{$conf->law}}"/>
                </td>
              </tr>
              <tr>
                <td>
                    其他页面底部连接：<font color="red">链接名称数量要和文章编号数量一致！以英文逗号分割</font><br>
                    链接名：<font color="red">如：联系我们,意见反馈</font><br>
                    <textarea name="otherhrefname" class="form-control">{{$conf->otherhrefname}}</textarea>
                    <font color="red">通过文章管理新增文章，这里只上传文章编号！如：1,2,3</font><br>
                    文章编号：<input type="text" name="otherhrefpid" class="form-control" value="{{$conf->otherhrefpid}}"/>
                </td>
              </tr>
              <tr>
                <td>
                    首页菜单导航<font color="red">链接名称数量要和编号数量一致！以英文逗号分割</font><br>
                    导航名：<font color="red">如：会员专区</font><br>
                    <textarea name="menu" class="form-control">{{$conf->menu}}</textarea>
                    <font color="red">通过栏目管理新增栏目，这里只上传栏目编号！如：1,2,3</font><br>
                    栏目编号：<input type="text" name="menuhref" class="form-control" value="{{$conf->menuhref}}"/>
                </td>
              </tr>
              <tr>
                <td>
                    备案信息：<font color="red"></font><br>
                    <textarea name="icp" class="form-control">{{$conf->icp}}</textarea>
                </td>
              </tr>
            </table>
            <input type="submit" class="btn btn-info"  value="保存配置">
            
            
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection