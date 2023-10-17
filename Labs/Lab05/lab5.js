/* Lab 5 JavaScript File 
   Place variables and functions in this file */

   function preview() {
      alert(`${document.getElementById("firstName").value} ${document.getElementById("lastName").value} is ${document.getElementById("pseudonym").value}`);
   }

   function eraseText() {
      if (document.getElementById("comments").value == "Please enter your comments") {
         document.getElementById("comments").value = "";
      }
  }

function validate(formObj) {
   // put your validation code here
   // it will be a series of if statements

   if (formObj.firstName.value == "") {
      alert("You must enter a first name");
      formObj.firstName.focus();
      return false;
   }
   if (formObj.lastName.value == "") {
      alert("You must enter a last name");
      formObj.lastName.focus();
      return false;
   }
   if (formObj.title.value == "") {
      alert("You must enter a title");
      formObj.title.focus();
      return false;
   }
   if (formObj.org.value == "") {
      alert("You must enter an organization");
      formObj.org.focus();
      return false;
   }
   if (formObj.pseudonym.value == "") {
      alert("You must enter a nickname");
      formObj.pseudonym.focus();
      return false;
   }
   if (formObj.comments.value == "") {
      alert("You must enter a comment");
      formObj.comments.focus();
      return false;
   }

   alert("Form was successful");
   return true;

}

window.onload=function() {document.getElementById("firstName").focus(); };
