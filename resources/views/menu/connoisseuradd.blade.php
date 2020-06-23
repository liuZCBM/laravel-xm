<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导航</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/vue.js"></script>
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<meta name="csrf-token" content="{{ csrf_token() }}" />
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航管理</a>&nbsp;-</span>&nbsp;导航修改
			</div>
		</div>
		<div class="page" id="app">
			<!-- 修改密码页面样式 -->
			<div class="bacen">
              
				<input type="hidden" id="id" value="{{$res->id}}">
				<div class="bbD">
					&nbsp;&nbsp;&nbsp;&nbsp;导航名字：<input type="text" name="name" id="name" value="{{$res->name}}" class="input3"/> 
				</div>
				<div class="bbD">
					&nbsp;&nbsp;&nbsp;&nbsp;链接地址：<input type="text" name="url" id="url" value="{{$res->url}}" class="input3"/> 
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;是否显示：&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</s><input type="radio" value="1" id="hidden" name="hidden"/> &nbsp;是
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <input type="radio" value="2"   id="hidden" name="hidden" />&nbsp;否
                </div>
                <div class="bbD">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input type="text" name="sort" id="sort" value="{{$res->sort}}" class="input3"/> 
				</div>
				<div class="bbD">
					<p class="bbDP">
						<button class="btn_ok btn_yes" >提交</button>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script> 
     $(document).ready(function(){
        $(".btn_ok").click(function(){
           var name = $("#name").val();
           var hidden = $("#hidden").val();
           var sort = $("#sort").val();
           var url = $("#url").val();
           var id = $("#id").val();
           var data = {};
           data.name = name;
           data.hidden = hidden;
           data.sort = sort;
           data.url = url;
           data.id = id;
           var urll = "{{url('/update')}}";
           $.ajax({
                type:"post",
                data:data,
                url:urll,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:"json",
                success:function(res){
                   if(res.success==true){
                       location.href="{{url('/addindex')}}";
                   }
                }
            })
        })
    })
</script>