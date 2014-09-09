<?php 
require_once '../include.php';
checkLogined();
$pageSize=12;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
// $rows=getNodeByPage($page,$pageSize);
$rows=getAllNodeById();
// $sql="select * from imooc_node";
// $totalRows=getResultNum($sql);
// $pageSize=5;
// $totalPage=ceil($totalRows/$pageSize);
// if($page<1||$page==null||!is_numeric($page))$page=1;
// if($page>=$totalPage)$page=$totalPage;
// $offset=($page-1)*$pageSize;
// $sql="select * from imooc_node order by concat(path,id) asc limit {$offset},{$pageSize}";
// $rows=fetchAll($sql);

// var_dump($sql);exit;
//var_dump(getAllNode());exit;

//构建生成树中需要的数据
// $Node=getAllNode();
// // var_dump($Node);exit;
// $array=array();
// foreach($Node as $k => $r) {
// 			$r['id']      = $r['id'];
// 			$r['title']   = $r['title'];
// 			$r['name']    = $r['name'];

// 			$array=$r;
// 			var_dump($array);
			
// 		}

// 	function listNode(){
// 		$m=substr_count($row['path'], ',')-1;
		 
// 		$strpad=str_pad("", $m*12,"&nbsp;");
// 		if($row['pid']==0){
// 			$dbd="disabled";
// 		}else{
// 			$dbd="";
// 		}//isset($_GET['name'])?$_GET['name']:"根类别"
// 		$id=$row['name'];
// 		if($id==$rows['id']){
// 			$select="selected";
// 		}else{
// 			$select="";
// 		}
// 		$listNode=$m.$strpad."-".$row['name'];
// 		return $listNode;
// 	}
	





if(!$rows){
	alertMes("没有分类，请添加", "addNode.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="styles/backstage.css">
<title>Insert title here</title>
</head>
<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添加节点" class="add"  onclick="addNode()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="5%">编号</th>
                                <th width="5%">排序</th>
                                <th width="20%">节点名称</th>
                                <th width="20%">路径</th>
                                <th width="20%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                        <?php 
                        		$m=substr_count($row['path'], ',')-1;
                        		
                        		$strpad=str_pad("", $m*18*2,"&nbsp;");//节点之间间距缩进
                        		$icon="";
//                         		if($row['pid']==0){
//                         			$dbd="disabled";
//                         		}else{
//                         			$dbd="";
//                         		}//isset($_GET['name'])?$_GET['name']:"根类别"
//                         		$id=$row['id'];
//                         		if($id==$rows['id']){
//                         			$select="selected";
//                         		}else{
//                         			$select="";
//                         		}$Tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
                        		if($row["pid"]==0){
                        			$icon="|--".$strpad;
                        		}else{
                        			$icon="|".$strpad."|_";
                        		}
                        ?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td align="center"><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td align="center"><input type="text" style="text-align: center;width:15px;padding:2px;border-radius:3px;" value="<?php echo $row['sort'];?>"/></td>
                                <td><?php echo "<font color='red'>".$icon.$row['name']." ( ".$row['title']." )</font>";?></td>
                                <td><?php echo $row['path'];?></td>
                                <td align="center">
                                	<?php 
                                		echo "<a class='btn' href='addNode.php?pid={$row['id']}&name={$row['name']}&path={$row['path']}{$row['id']},'>添加子类</a>
                                			  <a class='btn' href='editNode.php?id={$row['id']}&pid={$row['pid']}&name={$row['name']}&path={$row['path']}'>修改</a>
                                			  <a class='btn' href='#' onclick='delNode({$row['id']})'>删除</a>";                               		
                                	?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>

</body>
<script type="text/javascript">
function addNode(){
	window.location="addNode.php";
}
function editCate(id){
	window.location="editCate.php?id="+id;
}
function delNode(id){
	if(window.confirm("你确定要删除分类吗？")){
		window.location="doAdminAction.php?act=delNode&id="+id;
	}
}
</script>

</html>