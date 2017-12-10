<!DOCTYPE html>
<html>
  <head>
    <title>The People's Mind: Create Account</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?php 
      include('includes/links.inc.php');
    ?>
    <script type="text/javascript" src="createAccount.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <?php 
      include('includes/menu.inc.php'); // include the menu bar and logo
    ?>
    <form id="create" name="create" action="#" method="post" onsubmit="return validate(this);">
        <fieldset> 
          <legend>Create Account</legend>
          <div class="formData">
              
            <label class="field" for="first">First Name:</label>
            <div class="value"><input type="text" size="60" value="" name="first" id="first"/></div>
              
            <label class="field" for="last">Last Name:</label>
            <div class="value"><input type="text" size="60" value="" name="last" id="last"/></div>
                          
            <label class="field" for="username">Username:</label>
            <div class="value"><input type="text" size="60" value="" name="username" id="username"/></div>
            
            <label class="field" for="password">Password:</label>
            <div class="value"><input type="text" size="60" value="" name="password" id="password" autocomplete="off"/></div>  <!-- Autocomplete is off to remove suggestions -->
              
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


