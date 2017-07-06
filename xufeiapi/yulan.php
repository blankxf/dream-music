<?php
 	header('Access-Control-Allow-Origin:*'); 
	require './Upload.class.php';
	if(isset($_FILES["myfile"])){
		$data = new Upload('myfile','./yulan');
		if($newname = $data->saveFile()){
			echo json_encode(['code'=>1,'data'=>$newname]);
		}else{
			$err=$data->getError();
			echo json_encode(['code'=>2,'data'=>$err]);
		}
	}else{
		echo json_encode(['code'=>0,'data'=>"数据错误!"]);
	}
