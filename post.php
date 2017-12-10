<?php
ini_set("error_reporting","E_ALL &~ E_NOTICE");
date_default_timezone_set('UTC');
if(!isset($_GET['entry'])){
	echo 'fail';
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
<!DOCTYPE html>
<html>
  <head>
    <title>The People's Mind: Results</title>
    <?php 
      include('includes/links.inc.php');
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>

  <body>
    <?php 
      include('includes/menu.inc.php'); // include the menu bar and logo
    ?>

    <div id = "center">
    	<div id = "blog_entry">
        	<div id = "blog_title"><?php echo $content_array[0]; ?></div>
            <div id = "blog_body">
              <div id = "blog_date"><?php echo date('Y-m-d H:i:s',$content_array[1]); ?><br/>
			    <h1><?php echo $content_array[2]; ?></h1> 
              </div>
            </div>
        </div>
    </div>
    <?php 
      include('includes/footer.inc.php');  // Includes button and footer
    ?>
  	 		
</body>
</html>
