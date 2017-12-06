function validate(formObj) {
  // validation code
  var alertString = "";
    
  //validation for first name field
  var first = 0;
  if (formObj.first.value == "") {
    alertString += "You must enter a first name\n";
    first += 1;
  }

  //validation for last name field
  var last = 0;
  if (formObj.last.value == "") {
    alertString += "You must enter a last name\n";
    last += 1;
  }
    
  //validation for username field
  var user = 0;
  if (formObj.username.value == "") {
    alertString += "You must enter a username\n";
    user += 1;
  }
    
  //validation for password field  
  var pass = 0;
  if (formObj.password.value == "") {
    alertString += "You must enter a password\n";
    pass += 1;
  }
    
  var email = 0;
  if (formObj.email.value == "") {
    alertString += "You must enter an email address\n";
    email += 1;
  }
  
  //alert message
  if ((first + last + user + pass + email) > 0) {
    alert(alertString);
    //focuses on the first field missing
    if (first == 1) {
      formObj.first.focus();
    } else if (last == 1) {
      formObj.last.focus();
    } else if (user == 1) {
      formObj.username.focus();
    } else if (pass == 1) {
      formObj.password.focus();
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