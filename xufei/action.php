<?php
	require "../xufeiapi/config.php";
	require "../xufeiapi/Model.class.php";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$model=new Model("xf_baoming");
		$res=$model->where("id={$id}")->select();
		if(!$res){
			echo "<script>location.href='./table.html';</script>";
		}
	}else{
		echo "<script>location.href='./table.html';</script>";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>报名表操作</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="dist/semantic.min.css">
</head>
<body>
	<div class="ui container">
		<h1>修改 <?php echo $res[0]['name'];?></h1>
		<form class="ui form" action="./do.php?a=update&id=<?php echo $res[0]['id'];?>" method="post">
			<div class="two fields">
			  <div class="field">
			    <label>人数</label>
			    <input type="number" name="num" value="<?php echo $res[0]['num']?>" mix="1">
			  </div>
			  <div class="field">
			    <label>金额</label>
			    <input type="number" name="money" value="<?php echo $res[0]['money']?>">
			  </div>
			   <div class="field">
			    <label>报名时间</label>
			    <input type="text" name="addtime" value="<?php echo date("Y-m-d H:i:s",$res[0]['addtime'])?>">
			  </div>
			</div>
		  <button class="ui button">确认修改</button>
		</form>
		  <a href="./do.php?a=del&id=<?php echo $res[0]['id'];?>" class="ui red button">删除该数据</a>
	</div>


	<script type="text/javascript" src="dist/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="dist/semantic.min.js"></script>

</body>
</html>