

<style type="text/css">



/*left*/
.leftsidebar_box{width:160px;height:auto !important;overflow:visible !important;position:absolute;left:0px;height:100% !important;background-color:#3992d0;}
.line{height:2px;width:100%;background-image:url({{asset('/images/left/line_bg.png ')}});background-repeat:repeat-x;}
.leftsidebar_box dt{padding-left:40px;padding-right:10px;background-repeat:no-repeat;background-position:10px center;color:#f5f5f5;font-size:14px;position:relative;line-height:48px;cursor:pointer;}
.leftsidebar_box dd{background-color:#317eb4;padding-left:40px;}
.leftsidebar_box dd a{color:#f5f5f5;line-height:20px;}
.leftsidebar_box dt img{position:absolute;right:10px;top:20px;}
.system_log dt{background-image:url({{asset('/images/left/system.png')}})}
.custom dt{background-image:url({{asset('/images/left/custom.png')}})}
.channel dt{background-image:url({{asset('/images/left/channel.png')}})}
.app dt{background-image:url({{asset('/images/left/app.png')}})}
.cloud dt{background-image:url({{asset('/images/left/cloud.png')}})}
.syetem_management dt{background-image:url({{asset('/images/left/syetem_management.png')}})}
.source dt{background-image:url({{asset('/images/left/source.png')}})}
.statistics dt{background-image:url({{asset('/images/left/statistics.png')}})}
.leftsidebar_box dl dd:last-child{padding-bottom:10px;}
</style>
<script>
	function gotourl(url){
		window.location.href = url;
	}
</script>


<div class="container" style="200px">

	<div class="leftsidebar_box">
		<div class="line"></div>
		<dl class="system_log">
			<dt onClick="changeImage()">栏目管理<img src="{{asset('/images/left/select_xl01.png')}}"></dt>
			<dd class="first_dd" onClick="gotourl('{{ URL('admin/subjects/create') }}')"><a href="{{ URL('admin/subjects/create') }}">新建栏目</a></dd>
			<dd onClick="gotourl('{{url('/admin/subjects/list') }}')"><a href="{{url('/admin/subjects/list') }}">栏目列表</a></dd>
		</dl>
		<dl class="source">
			<dt>文章管理<img src="{{asset('/images/left/select_xl01.png')}}"></dt>
			<dd class="first_dd" onClick="gotourl('{{ URL('admin/pages/create') }}')"><a href="{{ URL('admin/pages/create') }}">新建文章</a></dd>
			<dd onClick="gotourl('{{ URL('admin/pages/list') }}')"><a href="{{ URL('admin/pages/list') }}">文章列表</a></dd>
			<dd onClick="gotourl('{{ URL('admin/comments/listcomments') }}')"><a href="{{ URL('admin/comments/listcomments') }}">评论管理</a></dd>
		</dl>
	
		<dl class="custom">
			<dt onClick="changeImage()">客户管理<img src="{{asset('/images/left/select_xl01.png')}}"></dt>
			<dd class="first_dd" onClick="gotourl('{{ URL('admin/users/list') }}')"><a href="{{ URL('admin/users/list') }}">会员列表</a></dd>
			<dd><a href="#">会员充值</a></dd>
			<dd class="first_dd" onClick="gotourl('{{ URL('admin/ugs/create') }}')"><a href="{{ URL('admin/ugs/create') }}">会员等级设置</a></dd>
			<dd class="first_dd" onClick="gotourl('{{ URL('admin/ugs/list') }}')"><a href="{{ URL('admin/ugs/list') }}">积分头衔设置</a></dd>
		</dl>

		<dl class="channel">
			<dt>渠道管理<img src="{{asset('/images/left/select_xl01.png')}}"></dt>
			<dd class="first_dd" onClick="gotourl('{{ URL('admin/ads/list') }}')"><a href="{{ URL('admin/ads/list') }}">广告管理</a></dd>
			<dd><a href="#">微信公众平台</a></dd>
			<dd><a href="#">新浪微博</a></dd>
		</dl>

		<dl class="syetem_management">
			<dt>系统管理<img src="{{asset('/images/left/select_xl01.png')}}"></dt>
			<dd class="first_dd"><a href="{{ URL('admin/sysconfi/index') }}">系统基本参数</a></dd>
			<dd><a href="#">支付参数设定</a></dd>
		</dl>


		<dl class="statistics">
			<dt>统计分析<img src="{{asset('/images/left/select_xl01.png')}}"></dt>
			<dd class="first_dd" onClick="gotourl('{{ URL('admin/stat/page') }}')"><a href="{{ URL('admin/stat/page') }}">文章统计</a></dd>
			<!-- <dd class="first_dd" onClick="gotourl('{{ URL('admin/stat/page') }}')"><a href="{{ URL('admin/ads/page') }}">用户统计</a></dd> -->
		</dl>

		<!-- <dl class="app">
			<dt onClick="changeImage()">APP管理<img src="{{asset('/images/left/select_xl01.png')}}"></dt>
			<dd class="first_dd"><a href="#">App运营商管理</a></dd>
			<dd><a href="#">开放接口管理</a></dd>
			<dd><a href="#">接口类型管理</a></dd>
		</dl>
	
		<dl class="cloud">
			<dt>大数据云平台<img src="{{asset('/images/left/select_xl01.png')}}"></dt>
			<dd class="first_dd"><a href="#">平台运营商管理</a></dd>
		</dl> -->
	
		
	
		
	
	</div>

</div>

<script type="text/javascript" src="{{ asset('/js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript">
$(".leftsidebar_box dt").css({"background-color":"#3992d0"});
$(".leftsidebar_box dt img").attr("src","{{asset('/images/left/select_xl01.png')}}");
$(function(){
	$(".leftsidebar_box dd").hide();
	$(".leftsidebar_box dt").click(function(){
		$(".leftsidebar_box dt").css({"background-color":"#3992d0"})
		$(this).css({"background-color": "#317eb4"});
		$(this).parent().find('dd').removeClass("menu_chioce");
		$(".leftsidebar_box dt img").attr("src","{{asset('/images/left/select_xl01.png')}}");
		$(this).parent().find('img').attr("src","{{asset('/images/left/select_xl01.png')}}");
		$(".menu_chioce").slideUp(); 
		$(this).parent().find('dd').slideToggle();
		$(this).parent().find('dd').addClass("menu_chioce");
	});
})
</script>



