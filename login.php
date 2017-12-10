<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?php 
      include('includes/links.inc.php');
    ?>
    <script type="text/javascript" src="login.js"></script>
  </head>

  <body>
    <?php 
      include('includes/menu.inc.php'); // include the menu bar and logo
    ?>
    <form id="login" name="login" action="#" method="post" onsubmit="return validate(this);">
        <fieldset> 
          <legend>Login</legend>
          <div class="formData">
                          
            <label class="field" for="username">Username:</label>
            <div class="value"><input type="text" size="60" value="" name="username" id="username"/></div>
            
            <label class="field" for="password">Password:</label>
            <div class="value"><input type="text" size="60" value="" name="password" id="password"/></div>
    
            <input type="submit" value="save" id="save" name="save"/>
          </div>
        </fieldset>
      </form>
      
    <button type="button" onclick="window.location.href='createAccount.php';">Create New Account</button>
    <button type="button" onclick="window.location.href='forgotPassword.php';">Forgot Password?</button>
    <?php 
      include('includes/footer.inc.php');
    ?>
  </body>
  
</html>


