<?php
ini_set("error_reporting","E_ALL &~ E_NOTICE");
date_default_timezone_set('UTC');
if(!isset($_GET['entry'])){
	echo '请求参数错误';
	exit;
	}
	$path = substr($_GET['entry'],0,6);
	$entry = substr($_GET['entry'],7,9);
	$file_name = 'contents/'.$path.'/'.$entry.'.txt';
	
	if(file_exists($file_name)){
		$fp = @fopen($file_name,'r');
		if($fp){
			flock($fp,LOCK_SH);
			$result = fread($fp,filesize($file_name));	
			}
			flock($fp, LOCK_UN);
			fclose($fp);
		}
		$content_array = explode('|', $result);
		$msg = '<a href = "index.php">Home Page</a>';
				echo $msg;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ThePeopleMind</title>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>
<div id = "container">
	<div id = "header">
      <div class="text" style=" text-align:center;">
      <h1>ThePeopleMind</h1></div>
</div>

    <div id = "left">
    	<div id = "blog_entry">
        	<div id = "blog_title"><?php echo $content_array[0]; ?></div>
            <div id = "blog_body">
            	<div id = "blog_date"><?php echo date('Y-m-d H:i:s',$content_array[1]); ?><br/>
			   <h1><?php echo $content_array[2]; ?></h1> 
         		       
         		   
         		          
          		       
           		</div>

           	
            </div>
        </div>
    </div>
    <div id = "footer">ThePeopleMind</div>
 </div>
  	 		
</body>
</html>
