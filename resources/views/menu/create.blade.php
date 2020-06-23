<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导航</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/vue.js"></script>
<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航管理</a>&nbsp;-</span>&nbsp;导航添加
			</div>
		</div>
		<div class="page" id="app">
			<!-- 修改密码页面样式 -->
			<div class="bacen">
				
				<div class="bbD">
					&nbsp;&nbsp;&nbsp;&nbsp;导航名字：<input type="text" name="name" v-model="name" class="input3"/> 
				</div>
				<div class="bbD">
					&nbsp;&nbsp;&nbsp;&nbsp;链接地址：<input type="text" name="url" v-model="url" class="input3"/> 
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;是否显示：&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</s><input type="radio" value="1" v-model="hidden" name="hidden"/> &nbsp;是
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <input type="radio" value="2" v-model="hidden" name="hidden" checked/>&nbsp;否
                </div>
                <div class="bbD">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input type="text" name="sort" v-model="sort" class="input3"/> 
				</div>
				<div class="bbD">
					<p class="bbDP">
						<button class="btn_ok btn_yes" @click="send">提交</button>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script> 
    var vm  = new Vue({
        el:"#app",
        data:{
            name:null,
            url:null,
            hidden:null,
            sort:null,
        },
        methods:{
            send:function(){
                var data = {};
                data.name = this.name;
				data.url = this.url;
				data.hidden = this.hidden;
				data.sort = this.sort; 
				var url = "{{url('/addcreate')}}";
				axios.post(url,data).then(function(res){
					var showapp = res.data;
					if(showapp.success==true){
						location.href="{{url('/addindex')}}";
					}
				})
            }
			
		}
    })

</script>