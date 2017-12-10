<?php
date_default_timezone_set('UTC');
$ok = true;
if(isset($_POST['title'])&&isset($_POST['content'])){
	$ok = true;
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$polladdress = trim($_POST['polladdress']);
	$pollresultaddress = trim($_POST['pollresultaddress']);
	$date = time();
	$blog_str = $title.'|'.$date.'|'.$content.'|'.$polladdress.'|'.$pollresultaddress;
	$ym = date('Ym',time());
	$d = date('d',time());
	$time = date('His',time());
	$folder = 'contents/'.$ym;
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
				
				$msg = 'Successful added, <a href = "post.php?entry='.$entry.'">See what you just posted here!</a>';
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
            	  <div align="center">Your opinion?</div>
            	</div>
                <div id = "blog_body">
                	<!--<div id = "blog_date"></div>-->
                    <div align="center">
                      <table border = "0">
                        <form method = "POST" action = "add.php">
                          <tr>
                            <td width="200">Ting you run into:</td></tr>
                          <tr><td><input type = "text" name = "title" size = "54"></td></tr>
                          <tr>
                            <td>What's it about?:</td></tr>
                          <tr><td><textarea name = "content" cols = "42" rows = "10"></textarea></td></tr>
                          
                          <tr><td><input type="button" onclick="window.open('https://www.poll-maker.com/');" value="Create Poll" />You must creat a poll here!</td></tr>
                          <tr><td>copy your poll address here:<input type = "text" name = "polladdress" size = "15"></td>
                          <tr><td>copy your poll result address here:<input type = "text" name = "pollresultaddress" size = "11"></td>
                          </tr>
                          <tr><td><input type = "submit" value = "post"></td></tr>
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