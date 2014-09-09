<?php 

/**
 * 添加节点
 */
function addNode(){
	// 	$arr=$_POST;
	// 	$arr['password']=md5($_POST['password']);
	// 	if(insert("imooc_admin",$arr)){
	// 		$mes="添加成功<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	// 	}else{

	// 		$mes="添加失败<br/><a href='addAdmin.php'>重新添加</a>";
	// 	}
	// 	return $mes;

	$arr=$_POST;
// 	$name=$_POST['name'];
// 	$pid=$_POST['pid'];
// 	$path=$_POST["path"];
	if(insert("imooc_node", $arr)){
		jumpMes("添加成功<br/><a href='listNode.php'>回到节点列表</a>", "listNode.php");
	}else{
		jumpMes("添加失败<br/><a href='addNode.php'>重新添加</a>", "addNode.php");
	}
}

/**
 * 修改节点信息
 * @param int $id
 */
function editNode($where){
	$arr=$_POST;
	//var_dump($arr);exit;
	if(update("imooc_node", $arr,$where)){
		
		jumpMes("修改成功<br/><a href='listNode.php'>回到节点列表</a>", "listNode.php");
	}else{
		jumpMes("修改失败<br/><a href='listNode.php'>重新修改</a>", "listNode.php");
	}
}

/**
 * 删除节点
 * @param int $id
 */
function delNode($id){
	if(delete("imooc_node","id={$id}")){
		jumpMes("删除成功<br/><a href='listNode.php'>回到节点列表</a>", "listNode.php");
	}else{
		jumpMes("删除失败<br/><a href='listNode.php'>重新删除</a>", "listNode.php");
	}
}


function getAllNode(){
	$sql="select * from imooc_node order by concat(path,id)";
	return fetchAll($sql);
}

function getNodeById($id){
	$sql="select * from imooc_node where id={$id}";
	return fetchOne($sql);
}

function getAllNodeById(){
	$sql="select * from imooc_node order by concat(path,id)";
	return fetchAll($sql);
}

function getNodeByPage($page,$pageSize=2){
	$sql="select * from imooc_node";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page))$page=1;
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from imooc_node order by concat(path,id) asc limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 
 * 得到pid=0的一级菜单
 * @return multitype
 */
function getMenuFirst(){
	$sql="select * from imooc_node where pid=0";
	return fetchAll($sql);
}

/**
 * 获得pid=0的菜单记录条数
 * Enter description here ...
 */
function getMenuNum(){
	$sql="select * from imooc_node where pid=0 order by concat(path,id)";
	return getResultNum($sql);
}

function getSubMenu($pid){
	$sql="select * from imooc_node where pid=$pid order by concat(path,id)";
	return fetchAll($sql);
}