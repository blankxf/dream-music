<?php
	header("Content-type:text/html;charset=utf-8");
	require "../xufeiapi/config.php";
	require "../xufeiapi/Model.class.php";
	if(isset($_GET['a'])){
		$id=$_GET['id'];
		$model=new Model("xf_baoming");

		switch($_GET['a']){
			case "update":
			$data=[
				"id"=>$id,
				"num"=>$_POST['num'],
				"money"=>$_POST['money']
			];
			$res=$model->save($data);
			if($res){
				echo "<script>alert('修改成功!');location.href='./table.html';</script>";
			}else{
				echo "<script>alert('修改失败!');location.href='./action.php';</script>";
			}
			
			break;
			case "del":
			$res=$model->delete($id);
			if($res){
				echo "<script>alert('删除成功!');location.href='./table.html';</script>";
			}else{
				echo "<script>alert('删除失败!');location.href='./action.php';</script>";
			}
			
		}
	}else{
		echo "<script>location.href='./table.html';</script>";
	}