<?php 
session_start();
$info = '';

	if(isset($_SESSION['user'])){
		$_SESSION['user'] = '';
		$msg = '成功退出, <a href = "index.php">返回首页</a>';
		}
		else{
			$msg = '登录超时， <a href = "index.php">返回首页</a>';
			}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bo-Blog</title>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>
	<div id = "container">
    	<div id = "header">
        	<div class="text" style=" text-align:center;">
        	  <h1>键盘侠</h1></div>
        </div>
        	
    		<div id = "left">
            	<div id = "blog_entry">
                	<div id = "blog_title">退出登录</div>
                    	<div id = "blog_body">
                        	<?php echo $msg; ?>
                        </div>
                </div>
            </div>
    	<!--<div id = "right">
        	<div id = "sidebar">
            	<div id = "menu_title"></div>
                <div id = "menu_body">Shibo Tech</div>
            </div>
        </div>-->
        	<div id = "footer">Keyboard Man</div>
    </div
></body>
</html>