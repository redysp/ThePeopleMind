<!DOCTYPE html>
<html>
  <head>
    <title>The People's Mind</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="resources/styles.css"/>
    <link rel="icon" href="resources/logo.jpg"/>
    <link href="https://fonts.googleapis.com/css?family=Vollkorn+SC" rel="stylesheet">
  </head>

  <body>
    <?php 
      include('includes/menu.inc.php'); // include the menu bar and logo
    ?>
     
    <!-- Allow Facebook comments on page -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
      
    <div id="bodyBlock">
      <h1>The People's Mind</h1>
      <p>This is a document to get you started.</p>
    </div>
    
    <h2>Tell us what you think about our website!</h2>
    <!-- Facebook comments appear here -->
    <div class="fb-comments" data-href="localhost/project/index.html" data-numposts="5"></div>
  </body>
  
</html>


