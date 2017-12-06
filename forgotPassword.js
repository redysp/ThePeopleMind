function validate(formObj) {
  // validation code
  var alertString = "";
    
  //validation for username field
  var user = 0;
  if (formObj.username.value == "") {
    alertString += "You must enter a username\n";
    user += 1;
  }
    
  var email = 0;
  if (formObj.email.value == "") {
    alertString += "You must enter an email address\n";
    email += 1;
  }
  
  //alert message
  if ((user + email) > 0) {
    alert(alertString);
    //focuses on the first field missing
    if (user == 1) {
      formObj.username.focus();
    } else {
      formObj.email.focus();
    }
      
    return false;
  } else {
    //success
    alert("Success!");
    return true;
  }
    
  
}