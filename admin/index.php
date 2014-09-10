<?php 
require_once '../include.php';
checkLogined();
$menu_f=getMenuFirst();
$i=1; //初始化一级菜单的编号为1
//$m=substr_count($menu_f['path'], ',')+1; 
//$num=getMenuNum(); //获得记录条数
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">慕课电子商务后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
       <!--   <div class="link fl"><a href="#">慕课</a><span>&gt;&gt;</span><a href="#">商品管理</a><span>&gt;&gt;</span>商品修改</div>-->
        <div class="link fr">
            <b>欢迎您
			<?php 
				if(isset($_SESSION['adminName'])){
					echo $_SESSION['adminName'];
				}elseif(isset($_COOKIE['adminName'])){
					echo $_COOKIE['adminName'];
				}
			
			?>
            
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="javascript:history.go(1)" class="icon icon_j">前进</a><span></span><a href="javascript:history.go(-1)" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n" onclick="window.location.reload()">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
					<!--  循环输出一级菜单 	-->
                    <?php foreach($menu_f as $menu):?>
                    <li>
                        <h3 onclick="show('menu<?php echo $i;?>','change<?php echo $i;?>')"><span id="change<?php echo $i;?>">+</span><?php echo $i.$menu['name'];?></h3>
                        <?php 
                        	$pid=$menu['id'];
                        	$res=getSubMenu($pid);
                        ?>
                        <dl id="menu<?php echo $i;?>" style="display:none;">
                        <!--  循环输出二级菜单 	-->
                        <?php foreach($res as $sub_menu): ?>
                            <dd><a href="<?php if(isset($sub_menu['url'])) echo $sub_menu['url'].'.php';else echo '#';?>" target="mainFrame"><?php echo $i.$sub_menu['name']; ?></a></dd>
                        <?php endforeach; ?>  
                        </dl>	
                    </li>
                    <?php $i++;endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>