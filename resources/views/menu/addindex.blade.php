<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题管理-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>
    <style>
       ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.pagination li {display: inline;}

    ul.pagination li a {
        color: black;
       
        padding: 8px 16px;
        text-decoration: none;
    }
       
    </style>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">管理</a>&nbsp;-</span>&nbsp;导航管理
			</div>
		</div>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
			
				<!-- topic表格 显示 -->
				<div class="conShow">
                    <center>
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">id</td>
							<td width="66px" class="tdColor tdC">导航名字</td>
							<td width="125px" class="tdColor">是否显示</td>
							<td width="155px" class="tdColor">排序</td>
							<td width="175px" class="tdColor">添加时间</td>
                            <td width="190px" class="tdColor">网址</td>
                            <td width="190px" class="tdColor">操作</td>
                        </tr>
                        @foreach($res as $k=>$v)
						<tr ids="{{$v->id}}">
							<td>{{$v->id}}</td>
                            <td>{{$v->name}}</td>
                            @if($v->hidden == 1)
                            <td>是</td>
                            @endif
                            @if($v->hidden == 2)
                            <td>否</td>
                            @endif
                            
                            <td sort="sort">
                                <span class="span_test">{{$v->sort}}</span>
                                <input class="chang" type="text" value="{{$v->sort}}" style="display:none">
                            </td>
							<td>{{date("Y-m-d H:i:s",$v->createtime)}}</td>
							<td>{{$v->url}}</td>
							
							<td>
                                <a href="{{url('/connoisseuradd/'.$v->id)}}"><img class="operation upadd" src="img/update.png"></a>
                                <img class="operation delban" data-id="{{$v->id}}" src="img/delete.png">
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    </center>
					<div class="ul">{{$res->links()}}</div>
				</div>
			</div>
		</div>
	</div>
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
</body>

<script>
    $(document).ready(function(){
        $(".delban").click(function(){
            $(".banDel").show();
        })
        $(".yes").click(function(){
            var id = $(".delban").data("id");
            var url = "{{url('/dodel')}}";
            var data = {};
            data.id=id;
            $.ajax({
                type:"post",
                data:data,
                url:url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:"json",
                success:function(res){
                   if(res.success==true){
                    history.go(0)
                   }
                }
            })
        })
        $(".no").click(function(){
            $(".banDel").hide();
        })
        $(".span_test").click(function(){
            var _this = $(this);
            _this.hide();
            _this.next("input").show();
            $(".chang").blur(function(){
                var _this = $(this);
                var zi = _this.val();
                var id = _this.parents("tr").attr("ids");
                var sort = _this.parent("td").attr("sort");
                var data = {};
                data.sort = sort;
                data.id = id;
                data.zi = zi;
               var url = "{{url('/updateajax')}}";
                $.ajax({
                    type:"get",
                    data:data,
                    url:url,
                    dataType:"json",
                    success:function(res){
                        console.log(res)
                    }
            })
            })
        })
    })
   
</script>
</html>