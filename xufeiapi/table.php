<?php
	require "./config.php";
	require "./Model.class.php";
	$model=new Model("xf_baoming");
	$res=$model->select();
	if(isset($_GET['key'])){
		if($_GET['key']=="小飞飞"){
			echo json_encode(["code"=>1,"data"=>$res]);
		}else{
			echo json_encode(["code"=>0,"data"=>$res]);
		}
	}else{
		echo json_encode(["code"=>0,"data"=>$res]);
	}
	