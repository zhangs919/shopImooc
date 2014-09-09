<?php 
require_once '../include.php';
checkLogined();
$id=$_REQUEST['id'];

$res=getNodeById($id);
//var_dump($res);

//3. 实现数据的查询
//$sql="select * from imooc_node order by concat(path,id)";
// $res=mysql_query($sql);
// $row1=mysql_fetch_assoc($res)
$rows=getAllNodeById();
$pid=$_GET['pid'];
$name=$res['name'];
$path=$res['path'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>无限分类信息管理</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>

	<div align="center">
		<h3>修改分类信息</h3>
		<br />
		<form action="doAdminAction.php?act=editNode&id=<?php echo $id;?> " method="post">
			
			
			<table class="table" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th width="100%" colspan="2" align="left">添加菜单(节点)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td align="right" width="15%">上级菜单</td>
						<td>				
						<select name="id" id="">
						
							 <?php  foreach($rows as $row):?>
                           		
                               <?php 
                              $m=substr_count($row['path'], ',')-1;
                        		
                        		$strpad=str_pad("", $m*18,"&nbsp;");//节点之间间距缩进
                               							if($row['pid']==0){
                               								$dbd="disabled";
                               							}else{
                               								$dbd="";
                               							}//isset($_GET['name'])?$_GET['name']:"根类别"
                               							
                               							if($row['id']==$_GET['pid']){
                               								$select="selected";
                               							}else{
                               								echo $select="";
                               							}
                               echo "<option value='{$row['id']}' $select>{$strpad}--{$row['name']}</option>";
                               ?>
                            <?php endforeach;?>
						</select>
						</td>
					</tr>
					<tr>
						 <td align="right" width="15%">排序</td>
						 <td align="left"><input type="text" style="text-align: center;width:25px;padding:2px;border-radius:3px;" value="<?php echo $row['sort'];?>"/></td>
					</tr>
					<tr>
						<td align="right" width="15%">菜单名称</td>
						<td><input type="text" name="name" value="<?php echo $res['name'];?>"/></td>
					</tr>
					<tr>
						<td align="right" width="15%">节点名称</td>
						<td><input type="text" name="title" value="<?php echo $res['title'];?>" /></td>
					</tr>
					<tr>
						<td align="right" width="15%">链接参数 url</td>
						<td><input type="text" name="url" value="<?php echo $res['url'];?>" /></td>
					</tr>
					<tr>
						<td align="right" width="15%">节点状态</td>
						<td><input type="radio" name="status" checked="checked" />启用 <input
							type="radio" name="status" />关闭</td>
					</tr>
					<tr>
						<td align="right" width="15%">备注说明</td>
						<td><input type="text" name="remark" value="<?php echo $res['remark'];?>" /></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" value="修改" /></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html>