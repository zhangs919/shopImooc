<?php 
/**
 * 添加商品分类
 * @return string
 */
function addCate(){
	$arr=$_POST;
	if(insert("imooc_cate", $arr)){
		$mes="分类添加成功<br/><a href='addCate.php'>继续添加分类</a>|<a href='listCate.php'>查看分类列表</a>";
	}else{
		$mes="分类添加失败<a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类列表</a>";
	}
	return $mes;
}

/**
 * 编辑商品分类
 * @param string $where
 * @return string
 */
function editCate($where){
	$arr=$_POST;
	if(update("imooc_cate", $arr,$where)){
		//$mes="分类修改成功<br/><a href='listCate.php'>查看分类列表</a>";
		jumpMes("删除成功<br/><a href='listCate.php'>回到列表页</a>", "listCate.php");
	}else{
		jumpMes("分类修改失败<br/><a href='listCate.php'>重新修改</a>", "listCate.php");
	}
	return $mes;
}

/**
 * 得到单个商品分类
 * @param int $id
 * @return Ambigous <multitype:, multitype:>
 */
function getCateById($id){
	$sql="select id,cName from imooc_cate where id={$id}";
	return fetchOne($sql);
}

/**
 * 删除商品分类
 * @param string $where
 * @return string
 */
function delCate($where){
	if(delete("imooc_cate",$where)){
		//$mes="删除成功<br/><a href='listCate.php'>查看分类列表</a>";
		jumpMes("删除成功<br/><a href='listCate.php'>回到列表页</a>", "listCate.php");
	}else{
		//$mes="删除失败<a href='listCate.php'>重新删除</a>";
		jumpMes("删除失败<br/><a href='listCate.php'>重新删除</a>", "listCate.php");
	}
	return $mes;
}

/**
 * 得到所有商品分类
 * @return Ambigous <multitype, multitype:>
 */
function getAllCate(){
	$sql="select id, cName from imooc_cate";
	$rows=fetchAll($sql);
	return $rows;
}
