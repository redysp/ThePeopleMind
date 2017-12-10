<?php
include 'config/auth.php';
session_start();

	if(isset($_POST['user'])&&isset($_POST['passwd'])){
		$user = $_POST['user'];
		$passwd = $_POST['passwd'];
		$passwd = md5($passwd);
		
		if($user != $AUTH['user'] || $passwd != $AUTH['passwd']){
			echo '<strong><font color = "red">用户名密码错误</font></strong>';
			}
			
		else{
			$_SESSION['user'] = $user;
			header("location:index.php");
			}		
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Keyboard Man</title>
<link rel = "stylesheet" type = "text/css" href = "style.css" />
</head>
<body>
<div id = "container">
	<div id = "header">
    	<div class="text" style=" text-align:center;">
    	  <h1>键盘侠</h1></div>
    </div>
    
    <div id = "left">
    	<div id = "blog_entry">
        	<div id = "blog_title">用户登录</div>
            	<div id = "blog_body">
                	<div id = "blog_date"></div>
                	<table border = "0">
                    <form method = "POST" action = "login.php">
                    <tr><td>Name:</td><td><input type = "text" name = "user" size = "25"></td></tr>
                    <tr><td>Password:</td><td><input type = "password" name = "passwd" size = "25"></td></tr>
                    <tr><td><input type = "submit" value = "Log in"></td></tr>
                    </form>
                    </table>
                </div><!--blog_body-->
            </div><!--blog_entry-->
        </div>
        
       

<div id = "footer">Keyboard Man</div>
</div>
</body>
</html>