<?php
date_default_timezone_set('UTC');
$ok = true;
if(isset($_POST['title'])&&isset($_POST['content'])){
	$ok = true;
    // prevent injection from input
	$title = htmlspecialchars(trim($_POST['title']));
	$content = htmlspecialchars(trim($_POST['content']));
	$polladdress = htmlspecialchars(trim($_POST['polladdress']));
	$pollresultaddress = htmlspecialchars(trim($_POST['pollresultaddress']));
	$date = time();
    //trim again to prevent injection from output
	$blog_str = trim($title).'|'.trim($date).'|'.trim($content).'|'.trim($polladdress).'|'.trim($pollresultaddress);
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
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>The People's Mind: Add a Poll</title>
    <?php 
      include('includes/links.inc.php');
    ?>
    <script type="text/javascript" src="add.js"></script>
  </head>

  <body>
    <?php 
      include('includes/menu.inc.php'); // include the menu bar and logo
    ?>      
    <div id = "center"> 
      <div id = "blog_entry">
        <div id = "blog_title">
          <div align="center">Your opinion?</div>
        </div>
        <div id = "blog_body">
        <!--<div id = "blog_date"></div>-->
          <div align="center">
            <table border = "0">
              <form method = "POST" action = "add.php" onsubmit="return validate(this);">
                <tr>
                  <td width="200">Title</td></tr>
                <tr><td><input type = "text" name = "title" size = "54" id="title"></td></tr>
                <tr>
                  <td>Description of Problem</td></tr>
                <tr><td><textarea name = "content" cols = "50" rows = "10" id="description"></textarea></td></tr>
                          
                <tr><td><input type="button" onclick="window.open('https://www.poll-maker.com/');" value="Create Poll" />You must create a poll here!</td></tr>
                <tr><td>Copy your poll address here: <input type = "text" name = "polladdress" size = "22" id="copya"></td>
                <tr><td>Copy your poll result address here: <input type = "text" name = "pollresultaddress" size = "15" id="copyr"></td>
                </tr>
                <tr><td><input type = "submit" value = "post"></td></tr>
              </form>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    <?php 
      include('includes/footer.inc.php');
    ?>                 
  </body>
</html>