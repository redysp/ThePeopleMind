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

<!DOCTYPE html>
<html>
  <head>
    <title>The People's Mind: Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?php 
      include('includes/links.inc.php');
    ?>
  </head>

  <body>
    <!-- Allow Facebook comments on page -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
      
    <?php 
      include('includes/menu.inc.php'); // include the menu bar and logo
    ?>
      
    <div id = "biaotilan">
      <div class="text" style="text-align: center; font-size: 18px;">
    	<p class="biaoti"><span><!--<a href="index.php">首页</a>&nbsp;&nbsp;&nbsp;&nbsp; -->  
          <a href="add.php">Create a New Poll</a>&nbsp;&nbsp;&nbsp;&nbsp; </span></p>
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
    
    <h2>Tell us what you think about our website!</h2>
    <!-- Facebook comments appear here -->
    <div class="fb-comments" data-href="localhost/project/index.html" data-numposts="5"></div>
      
    <?php 
      include('includes/footer.inc.php');
    ?>
  </body>
  
</html>


