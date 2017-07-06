<?php
	header('Access-Control-Allow-Origin:*'); 
	require "./config.php";
	require "./Model.class.php";
	require './Upload.class.php';
// echo $_GET['callback']."(".json_encode($_FILES).")";die;

		if(isset($_FILES["myfile"])){
			$data = new Upload('myfile','./images');
			if($newname = $data->saveFile()){
				$pic=$newname;
			}else{
				$pic=null;
			}
		}else{
			$pic=null;
		}
		$model=new Model("xf_baoming");
		$data=[
			"name"=>$_GET['name'],
			"weixin"=>$_GET['weixin'],
			"num"=>$_GET['num'],
			"money"=>$_GET['money'],
			"image"=>$pic,
			"addtime"=>time()
		];
		$res=$model->add($data);
		if($res>0){
			echo json_encode(['code'=>1,'data'=>"报名成功!"]);
		}else{
			echo json_encode(['code'=>0,'data'=>"报名失败!"]);
		}	

		
