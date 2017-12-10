<!DOCTYPE html>
<html>
  <head>
    <title>The People's Mind: Reset Password</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?php 
      include('includes/links.inc.php');
    ?>
    <script type="text/javascript" src="forgotPassword.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <?php 
      include('includes/menu.inc.php'); // include the menu bar and logo
    ?>
    <h2>To reset your password, enter your username and your email address. We will send you an email to reset your password.</h2>  
      
    <form id="create" name="create" action="#" method="post" onsubmit="return validate(this);">
        <fieldset> 
          <legend>Reset Password</legend>
          <div class="formData">
                          
            <label class="field" for="username">Username:</label>
            <div class="value"><input type="text" size="60" value="" name="username" id="username"/></div>
              
            <label class="field" for="email">Email:</label>
            <div class="value"><input type="text" size="60" value="" name="email" id="email"/></div>
    
            <input type="submit" value="save" id="save" name="save"/>
          </div>
        </fieldset>
        <div class="g-recaptcha" data-sitekey="6Lc3-zsUAAAAAJr28YZS6rH-CFktbEPwsXfBWJUu"></div>
      </form>
    <?php 
      include('includes/footer.inc.php');
    ?>
  </body>
  
</html>
