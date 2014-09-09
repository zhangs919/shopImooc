<?php 
/**
 * 检查是否有管理员
 * @param string $sql
 * @return Ambigous <multitype:, multitype:>
 */
function checkAdmin($sql){
	return fetchOne($sql);
}

/**
 * 检查是否有管理员登录
 */
function checkLogined(){
	if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
		alertMes("请先登录", "login.php");
	}
}

/**
 * 添加管理员
 * @return string
 */
function addAdmin(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(insert("imooc_admin",$arr)){
		jumpMes("添加成功<br/><a href='listAdmin.php'>查看管理员列表</a>", "listAdmin.php");
		//$mes="添加成功<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		jumpMes("添加失败<br/><a href='listAdmin.php'>请重新添加</a>", "addAdmin.php");
		//$mes="添加失败<br/><a href='addAdmin.php'>重新添加</a>";
	}
	return $mes;
}

/**
 * 得到所有管理员的操作
 * @return Ambigous <multitype, multitype:>
 */
function getAllAdmin($where=null){
	$sql="select id,username,email from imooc_admin";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 
 * @param unknown $page
 * @param number $pageSize
 * @return Ambigous <multitype, multitype:>
 */
function getAdminByPage($page,$pageSize=2){
	$sql="select * from imooc_admin";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select id,username,email from imooc_admin limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 编辑管理员
 * @param int $id
 * @return string
 */
function editAdmin($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("imooc_admin", $arr,"id={$id}")){
		jumpMes("编辑成功<br/><a href='listAdmin.php'>回到节点列表</a>", "listAdmin.php");
		//$mes="编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		jumpMes("编辑失败<br/><a href='listAdmin.php'>请重新编辑</a>", "listAdmin.php");
		//$mes="编辑失败!<br/><a href='listAdmin.php'>请重新修改</a>";
	}
	return $mes;
}

/**
 * 删除管理员的操作
 * @param int $id
 * @return string
 */
function delAdmin($id){
	if(delete("imooc_admin","id={$id}")){
		jumpMes("删除成功<br/><a href='listAdmin.php'>回到节点列表</a>", "listAdmin.php");
		//$mes="删除成功<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		jumpMes("删除失败<br/><a href='listAdmin.php'>请重新删除</a>", "listAdmin.php");
		//$mes="删除失败!<br/><a href='listAdmin.php'>请重新删除</a>";
	}
	return $mes;
}

/**
 * 注销管理员
 */
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	header("location:login.php");
}

/**
 * 添加用户
 * @return string
 */
function addUser(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['regTime']=time();
	$uploadFile=uploadFile("../uploads");
	if($uploadFile&&is_array($uploadFile)){
		$arr['face']=$uploadFile[0]['name'];
	}else{
		return "添加失败<a href='addUser.php'>重新添加</a>";
	}
	//var_dump($arr);exit;
	if(insert("imooc_user",$arr)){
		$mes="添加成功!<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看列表</a>";
		
	}else{
		$filename="../uploads/".$uploadFile[0]['name'];
		if(file_exists($filename)){
			unlink($filename);
		}
		
		$mes="添加失败!<br/><a href='addUser.php'>重新添加</a>|<a href='listUser.php'>查看列表</a>";
	}
	return $mes;
}

/**
 * 编辑用户
 * @param unknown $id
 * @return string
 */
function editUser($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("imooc_user", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='listUser.php'>查看用户列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listUser.php'>请重新修改</a>";
	}
	return $mes;
}

/**
 * 删除用户
 * @param int $id
 * @return string
 */
function delUser($id){
	$sql="select face from imooc_user where id=".$id;
	$row=fetchOne($sql);
	$face=$row['face'];
	if(file_exists("../uploads/".$face)){
		unlink("../uploads/".$face);
	}
	if(delete("imooc_user","id={$id}")){
		$mes="删除成功<a href='listUser.php'>查看用户列表</a><br/>1秒钟后跳转到用户列表页面!<meta http-equiv='refresh' content='1;url=listUser.php'/>";
	}else{
		$mes="删除失败!<br/><a href='listUser.php'>请重新删除</a><br/>1秒钟后跳转到用户列表页面!<meta http-equiv='refresh' content='1;url=listUser.php'/>";
	}
	return $mes;
}







