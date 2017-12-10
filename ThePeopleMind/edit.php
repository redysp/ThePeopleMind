<?php
session_start();
$ok = false;

	if(!isset($_GET['entry'])){
		echo '参数错误';
		exit;
		}
		
	if(empty($_SESSION['user']) || $_SESSION['user']!='admin'){
		echo '请<a href="login.php">登录</a>后再操作';
		exit;
		}
		
	$path = substr($_GET['entry'],0,6);
	$entry = substr($_GET['entry'],7,9);
	$file_name = 'contents/'.$path.'/'.$entry.'.txt';
	
	if(file_exists($file_name)){
		$fp = @fopen($file_name,'r');
		if($fp){
			flock($fp, LOCK_SH);
			$result = fread($fp, filesize($file_name));
		}
			flock($fp, LOCK_UN);
			fclose($fp);
			$content_array = explode('|',$result);
			}
			if(isset($_POST['title']) && isset($_POST['content'])){
				$title = trim($_POST['title']);
				$content = trim($_POST['content']);
				
				if(file_exists($file_name)){
					$blog_temp = str_replace($content_array[0],$title,$result);
					$blog_str = str_replace($content_array[2],$content,$blog_temp);
					$fp = @fopen($file_name, 'w');
					if($fp){
						flock($fp, LOCK_EX);
						$result = fwrite($fp, $blog_str);
						$lock = flock($fp, LOCK_UN);
						fclose($fp);
						}
					}
					if(strlen($result)>0){
					$ok = true;
					$msg = '日志添加成功,<a href = "post.php?entry = '.$_GET['entry'].'">查看该日志文章</a>';	
					}
				}
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
</body>
</html>