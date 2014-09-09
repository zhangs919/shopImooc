<?php 
require_once '../include.php';
checkLogined();
$rows=getAllNode();
//if(!$rows){
//	alertMes("没有菜单节点，请先添加", "addNode.php");
//}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>无限分类信息管理</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>

	<div align="center">
		<h3>添加分类信息</h3>
		<br />
		<form action="doAdminAction.php?act=addNode" method="post">
			<input type="hidden" name="pid"
				value="<?php echo isset($_GET['pid'])?$_GET['pid']:0; ?>" /> <input
				type="hidden" name="path"
				value="<?php echo isset($_GET['path'])?$_GET['path']:'0,'; ?>" />
			<table class="table" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th width="100%" colspan="2" align="left">添加菜单(节点)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td align="right" width="15%">上级菜单</td>
						<td><?php echo isset($_GET['name'])?$_GET['name']:"根类别"; ?></td>
					</tr>
					<tr>
						<td align="right" width="15%">菜单名称</td>
						<td><input type="text" name="name" /></td>
					</tr>
					<tr>
						<td align="right" width="15%">节点名称</td>
						<td><input type="text" name="title" /></td>
					</tr>
					<tr>
						<td align="right" width="15%">链接参数 url</td>
						<td><input type="text" name="url" /></td>
					</tr>
					<tr>
						<td align="right" width="15%">节点状态</td>
						<td><input type="radio" name="status" checked="checked" />启用 <input
							type="radio" name="status" />关闭</td>
					</tr>
					<tr>
						<td align="right" width="15%">备注说明</td>
						<td><input type="text" name="remark" /></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" value="添加" /></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html>