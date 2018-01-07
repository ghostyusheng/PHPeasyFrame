<?php

namespace Core\Steam;

class Input {
	public function upload ($name) {
		$file 		= $_FILES[$name];  
		$name 		= $file['name'];  
		$type 		= $file['type'];  
		$tmp_name 	= $file['tmp_name'];  
		$error 		= $file['error'];  
		$size 		= $file['size'];  
		$ext		= end (explode ('.', $name));

		$date		= date ("Y/m/d", time (null));
		$uniqid 	= uniqid (); 
		$dir		= UPLOAD_DIR . '/Txt/' . $date . '/';
		$path		= $dir	.  $uniqid . "." . $ext;

		if (!is_dir ($dir)) {
			mkdir ($dir, 0777, true);
		}

		if($error==UPLOAD_ERR_OK){  
			if(is_uploaded_file($tmp_name) && move_uploaded_file ($tmp_name, $path))  
			{  
				return [
					'status' => 0,
					'path'   => $path
				];
			}  
		}else{  
			switch ($error){  
				case 1:  
					$mes = "超过了配置文件大小";  
					break;  
				case 2:  
					$mes = "超过表单最大大小";  
				case 3:  
					$mes = "只有部分文件上传";  
				case 4:  
					$mes = "没有上传文件";  
				case 6:  
					$mes = "没有找到临时文件目录";   
				case 7:  
					$mes= "文件不能写";  
				case 8:  
					$mes = "扩展程序终端文件上传";  
			}  
		}  

		return [
			'status' => -1,
			'msg'    => $mes,
			'path'   => null
		];
	}
}
