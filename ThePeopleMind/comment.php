<?php
date_default_timezone_set('UTC');
$ok = true;
if(isset($_POST['content'])){
	$ok = true;
	//$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$date = time();
	$blog_str = $date.'|'.$content;
	$ym = date('Ym',time());
	$d = date('d',time());
	$time = date('His',time());
	$folder = 'comments/'.$ym;
	$file = $d.'-'.$time.'.txt';
	$filename = $folder.'/'.$file;
	$entry = $ym.'-'.$d.'-'.$time;
	$result = 0;
	
	if(file_exists($folder) == false){
		
			$ok = false;
			$msg = '<font color = red>fail</font>';
			
		}
		$fp = @fopen($filename, 'w');
		if($fp){
			flock($fp, LOCK_EX);
			$result = fwrite($fp, $blog_str);
			$lock = flock($fp, LOCK_UN);
			fclose($fp);
			}
			if(strlen($result)>0){
				
				$msg = 'Success, <a href = "index.php?entry='.$entry.'">Return to home page</a>';
				echo $msg;
				}
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    	  <h1>ThePeopleMind   	</h1>
    	</div>
        </div>
       
        
  <div id = "left"> 
        	<div id = "blog_entry">
            	<div id = "blog_title">
            	  <div align="center">Comment</div>
            	</div>
                <div id = "blog_body">
                	<!--<div id = "blog_date"></div>-->
                    <div align="center">
                      <table border = "0">
                        <form method = "POST" action = "comment.php">
                          <tr>
                            <!--<td width="200">标题:</td></tr>
                          <tr><td><input type = "text" name = "title" size = "54"></td></tr> -->
                          <tr>
                            <td>What you want to say:</td></tr>
                          <tr><td><textarea name = "content" cols = "42" rows = "10"></textarea></td></tr>
                          <tr><td><input type = "submit" value = "submit"></td></tr>
                        </form>
                        </table>
                    </div>
                </div>
                <div align="center"><!-- blog_body-->
                </div>
        	</div>
        	<!-- blog_entry-->
            </div>
        <div id = "footer">
          ThePeopleMind</div>
                    </div>                    
</body>
</html>