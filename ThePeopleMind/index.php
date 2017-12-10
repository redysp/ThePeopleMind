<?php
date_default_timezone_set('UTC');
$login = false;
session_start();

	if(!empty($_SESSION['user']) && $_SESSION['user'] = 'admin')
	
		$login = true;
		
		$file_array = array();
		$folder_array = array();
	
		$dir = 'contents';
		$dh = opendir($dir);
		
		if($dh){
			$filename = readdir($dh);
				while($filename){
					if($filename != '.' && $filename != '..'){
						$folder_name = $filename;
						array_push($folder_array, $folder_name);	
					}
					$filename = readdir($dh);
				}
			}
			rsort($folder_array);
			$post_data = array();
			
			foreach($folder_array as $folder){
				$dh = opendir($dir.'/'.$folder);
				
				

$dir_name=  $dir.'/'.$folder; 
$hi = opendir($dir_name);  
$basename = basename($dir_name);  
$fileArr = array();  

	while (($file_name = readdir($hi))!=false)  {  

if (($file_name !=".") && ($file_name != "..")){    
$fName = "$dir_name/$file_name";  
$fTime = filemtime($fName);  
$fileArr[$file_name] = $fTime;  
}  
}    
arsort($fileArr);  
$numberOfFiles = sizeOf($fileArr);  

					for($t=0;$t<$numberOfFiles;$t++)  {  
						$thisFile = each($fileArr);  
						$thisName = $thisFile[0];  
						$thisTime = $thisFile[1];


					if(is_file($dir.'/'.$folder.'/'.$thisName)){
						$file = $thisName;
						$file_name = $dir.'/'.$folder.'/'.$file;
						if(file_exists($file_name)){
							$fp = @fopen($file_name, 'r');
							if($fp){
								flock($fp, LOCK_SH);
								$result = fread($fp, filesize($file_name));
								}
								flock($fp, LOCK_UN);
								fclose($fp);
							}
							$temp_data = array();
							$content_array = explode('|', $result);
							
							$temp_data['SUBJECT'] = $content_array[0];
							$temp_data['DATE'] = date('Y-m-d H:i:s', $content_array[1]);
							$temp_data['CONTENT'] = $content_array[2];
						    $temp_data['POLLADDRESS'] = $content_array[3];
							$temp_data['POLLRESULTADDRESS'] = $content_array[4];
							$file = substr($file,0,9);
							$temp_data['FILENAME'] = $folder.'-'.$file;
							array_push($post_data, $temp_data);
						}
					}
				}
				
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ThePeopleMind</title>

<link rel="stylesheet" type="text/css" media="screen and (max-device-width: 2300px)" href="tinyScreen.css" />

<link rel = "stylesheet" type = "text/css" href = "style.css" />
</head>

<body>
<div id = "container">
	<div id = "header">
    	<div class="text" style=" text-align:center;">
   	  <h1>ThePeopleMind</h1></div>
    </div>
    <div id = "biaotilan">
<div class="text" style="text-align: center; font-size: 18px;">
    	<p class="biaoti"><span><!--<a href="index.php">首页</a>&nbsp;&nbsp;&nbsp;&nbsp; -->  
                                <a href="add.php">post something</a>&nbsp;&nbsp;&nbsp;&nbsp; 
                                 <!--<a href="login.php">登录</a>&nbsp;&nbsp;&nbsp;&nbsp;  -->
                                <a href="aboutus.html">About</a>&nbsp;&nbsp;&nbsp;&nbsp; 
                               
                            </span></p>
                                </div>
    	 </div>
        
	<div id = "center">
        <?php foreach($post_data as $post){
			?>
           <div id = "blog_entry">
           		<div id = "blog_title"><?php echo $post['SUBJECT']; ?></div>
           		<div id = "blog_body">
                <div id = "blog_date"><?php echo $post['DATE']; ?>
                </div>
                	<?php echo $post['CONTENT']; ?>
                    <div><br/><a href = "comment.php">comment</a>&nbsp;
                    
            				<a href = "<?php echo $post['POLLADDRESS']; ?>">To Poll</a>&nbsp;
                   			<a href = "<?php echo $post['POLLRESULTADDRESS']; ?>">Result of Poll</a>&nbsp;
                    </div>
                </div>
           </div>
           <br/>
          <?php } ?>
        </div>
       
    <?php ?>
	<div id = "footer">ThePeopleMind</div>
</body>
</html>
