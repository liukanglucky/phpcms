@extends('adminapp')


@section('content')
<div class="container" style="min-width:1100px">
  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">文章阅读统计</div>

        <div class="panel-body">
          <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
          <div id="main" style="height:10px" >
          </div>
          <hr>
          <form method="post" action="{{ url('admin/stat/page')}}" >
            <!-- <form method="post" action=""> -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            文章题目：
            <input  name="pname"  placeholder="文章名" type="text">
            用户名：
            <input  name="uname"  placeholder="用户名" type="text"><br>
            
            <input class="btn btn-success" type="submit" name="submit" value="搜索">
          </form>
          <!-- <hr>
            <font color="red">勾选文章,生成阅读总量对比图</font>
            <input type="button" class="btn btn-info" value="生成柱状图" />
          <hr> -->
        <!-- <a href="{{ URL('admin/pages/create') }}" class="btn btn-lg btn-primary">新增</a> -->
          <table class="table">
            <tr>
              <td>文章编号</td>
              <td style="width:200px;overflow:hidden">文章标题</td>
              <td>状态</td>
              <td>阅读次数</td>
              <td>操作</td>
            </tr>
            @foreach ($orders as $order)
              <tr>
              <td>{{ $order->pid }}</td>
              <td style="width:200px;overflow:hidden">{{ $order->pname }}</td>
              <td>{{ $order->status }}</td>
              <td>{{ $order->readnum }}</td>
              <td><a onClick="zxbypid('{{$order->pid}}','{{$order->pname}}');" >阅读人次图表</a></td>
            </tr>
              
            @endforeach
          </table>



        </div>
        <?php echo $orders->render(); ?>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="height:600px">
  <div class="modal-dialog" role="document" style="height:600px;top:0;margin-top:0">
    <div class="modal-content" style="height:600px;top:0;margin-top:0">
      <div class="modal-header" style="height:50px">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" style="height:600px" id="main">
        
      </div>
    </div>
  </div>
</div> -->

<script type="text/javascript" src="{{ asset('/js/echarts.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.js')}}"></script>
<script>
// 路径配置
  require.config({
      paths: {
          echarts: '{{URL("js")}}'
      }
  });
                    
   


  function zxbypid(pid,pname){
    url = "{{URL('pages/stat/')}}"+"/"+pid;
    //alert(url);
    $.ajax({  
        type: "post",  
        url: url,  
        dataType: "text", 
        data:{"_token":"{{ csrf_token() }}"},  
        success: function(data){ 
          data = eval('(' + data + ')');
          //alert(data);
          var x_data = [];
          var y_data = [];
          // $.each(data,function(k,v) {
          //   x_data.push(k);
          //   y_data.push(v);
          // });
          for( k in data){
            //alert(k);
            x_data.push(k);
            y_data.push(data[k]);
          }
         
          // 使用
          require(
            [
                'echarts',
                'echarts/chart/bar', // 使用柱状图就加载bar模块，按需加载
                'echarts/chart/line' // 使用柱状图就加载bar模块，按需加载
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main')); 
                
                option = {
          title : {
          text: "文章标题："+pname,
          subtext: "阅读人员分析"
          },
          tooltip : {
          trigger: 'axis'
          },
          legend: {
          data:['阅读次数']
          },
          toolbox: {
          show : true,
          feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
          }
          },
          calculable : true,
          xAxis : [
          {
            type : 'category',
            boundaryGap : false,
            data : x_data
          }
          ],
          yAxis : [
          {
            type : 'value',
            axisLabel : {
                formatter: '{value}次'
            }
          }
          ],
          series : [
          {
            name:'阅读人数',
            type:'line',
            data:y_data,
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name: '平均值'}
                ]
            }
          }
          ]
          };
                    

                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
          );
          $("#main").css("height","400px");
          //$("#main").slideDown(200);
        } ,
        error : function(msg){
          alert("ajax error!");
        },
      });
  }
</script>
@endsection
