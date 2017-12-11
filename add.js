function validate(formObj) {
  // validation code
  var alertString = "";
  //validation for title field
  var title1 = 0;
  if (formObj.title.value == "") {
    alertString += "You must enter a title\n";
    title1 += 1;
  }
    
  //validation for description field  
  var description1 = 0;
  if (formObj.description.value == "") {
    alertString += "You must enter a description\n";
    description1 += 1;
  }
    
  //validation for first copy field  
  var copya1 = 0;
  if (formObj.copya.value == "") {
    alertString += "You must copy your poll address\n";
    copya1 += 1;
  }
  
  //validation for second copy field
  var copyr1 = 0;
  if (formObj.copyr.value == "") {
    alertString += "You must copy your poll result address\n";
    copyr1 += 1;
  }
  
  //alert message
  if ((title1 + description1 + copya1 + copyr1) > 0) {
    alert(alertString);
    //focuses on the first field missing
    if (title1 == 1) {
      formObj.title.focus();
    } else if (description1 == 1 ) {
      formObj.description.focus();
    } else if (copya1 == 1) {
      formObj.copya.focus();
    } else {
      formObj.copyr.focus();
    }
      
    return false;
  } else {
    //success
    alert("Success!");
    return true;
  }
}