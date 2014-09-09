<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script type="text/javascript" src="plugins/myfocus/js/myfocus-2.0.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-1.6.js"></script>
<script type="text/javascript" src="scripts/jquery.common.js"></script>
<script type="text/javascript">
//设置
myFocus.set({
	id:'myFocus',//ID
	pattern:'mF_fancy'//风格
});
//设置
myFocus.set({
	id:'myFocus2',//ID
	pattern:'mF_YSlider'//风格
});
</script>
<style type="text/css">
<!-- 表格样式 -->
TD {
FONT-FAMILY: "Verdana", "宋体"; FONT-SIZE: 12px; LINE-HEIGHT: 130%; letter-spacing:1px
}

<!-- 超级连接样式 -->
A:link {
COLOR: #990000; FONT-FAMILY: "Verdana", "宋体"; FONT-SIZE: 12px; TEXT-DECORATION: none; letter-spacing:1px
}
A:visited {
COLOR: #990000; FONT-FAMILY: "Verdana", "宋体"; FONT-SIZE: 12px; TEXT-DECORATION: none; letter-spacing:1px
}
A:active {
COLOR: #990000; FONT-FAMILY: "Verdana", "宋体"; FONT-SIZE: 12px; TEXT-DECORATION: none; letter-spacing:1px
}
A:hover {
COLOR: red; FONT-FAMILY: "Verdana", "宋体"; FONT-SIZE: 12px; TEXT-DECORATION: underline; letter-spacing:1px
}
<!-- 其他样式 -->
.Menu {
COLOR:blue; FONT-FAMILY: "Verdana", "宋体"; FONT-SIZE: 12px; CURSOR: hand;
}

.menu span{font-size:18px;}
.menu span:hover{color:green;cursor:pointer;}
</style>
<script type="text/javascript">
function ShowMenu(MenuID)
{
if(MenuID.style.display=="none")
{
MenuID.style.display="";
}
else
{
MenuID.style.display="none";
}
}

</script>
</head>
<body>
	<?php
	error_reporting(E_ALL & ~E_NOTICE);
		//基本变量设置
		$GLOBALS["ID"] =1; //用来跟踪下拉菜单的ID号
		$layer=1; //用来跟踪当前菜单的级数
		
		//连接数据库
		$Con=mysql_connect("localhost","root","");
		mysql_select_db("test");
		//提取一级菜单
		$sql="select * from menu where parent_id=0";
		$result=mysql_query($sql,$Con);
		//如果一级菜单存在则开始菜单的显示
		if(mysql_num_rows($result)>0) ShowTreeMenu($Con,$result,$layer,$ID);
		//=============================================
		//显示树型菜单函数 ShowTreeMenu($con,$result,$layer)
		//$con：数据库连接
		//$result：需要显示的菜单记录集
		//layer：需要显示的菜单的级数
		//=============================================
		function ShowTreeMenu($Con,$result,$layer)
		{
		//取得需要显示的菜单的项目数
		$numrows=mysql_num_rows($result);
		
		//开始显示菜单，每个子菜单都用一个表格来表示
		echo "<table cellpadding='0' cellspacing='0' border='0'>";
		
		for($rows=0;$rows<$numrows;$rows++)
		{
		//将当前菜单项目的内容导入数组
		$menu=mysql_fetch_array($result);
		
		//提取菜单项目的子菜单记录集
		$sql="select * from menu where parent_id=$menu[id]";
		$result_sub=mysql_query($sql,$Con);
		
		echo "<tr>";
		//如果该菜单项目有子菜单，则添加JavaScript onClick语句
		if(mysql_num_rows($result_sub)>0)
		{
		echo "<td width='20'></td>";
		echo "<td class='Menu' onClick='javascript:ShowMenu(Menu".$GLOBALS["ID"].");'>";
		}
		else
		{
		echo "<td width='20'></td>";
		echo "<td class='Menu'>";
		}
		//如果该菜单项目没有子菜单，并指定了超级连接地址，则指定为超级连接，
		//否则只显示菜单名称
		if($menu[url]!="")
		echo "<a href='$menu[url]'>$menu[name]</a>";
		else
		echo "<span style='font-size:18px;background:#f3f3f3;border:1px solid #fefefe;margin:3px;padding:3px;'>".$menu[name]."</span>";
		echo "
		</td>
		</tr>
		";
		
		//如果该菜单项目有子菜单，则显示子菜单
		if(mysql_num_rows($result_sub)>0)
		{
		//指定该子菜单的ID和style，以便和onClick语句相对应
		echo "<tr id=Menu".$GLOBALS["ID"]++." style='display:none'>";
		echo "<td width='20'> </td>";
		echo "<td>";
		//将级数加1
		$layer++;
		//递归调用ShowTreeMenu()函数，生成子菜单
		ShowTreeMenu($Con,$result_sub,$layer);
		//子菜单处理完成，返回到递归的上一层，将级数减1
		$layer--;
		echo "</td></tr>";
		}
		//继续显示下一个菜单项目
		}
		echo "</table>";
		}
		?>

</body>
</html>
