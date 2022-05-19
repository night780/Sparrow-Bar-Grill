
//Login Template for Test/Content Purposes. Not Real Login.

$(document).ready(function() {
  $('#example').DataTable( {
    responsive: {
      details: {
        renderer: $.fn.dataTable.Responsive.renderer.tableAll()
      }
    }
  } );
} );

document.getElementById("loginForm").onsubmit = adminLogin;

function adminLogin() {
  clearErrors();

  let emailInput = document.getElementById("email").value;
  let passwordInput = document.getElementById("password").value;

  let valid = true;
  //Sets username and pass. Not Secure. Not real Login
  let email = "admin@greenriverdev.com";
  let password = "password";

  if (emailInput != email || emailInput == "") {
    document.getElementById("emailErr").style.display = "block";
    valid = false;
  }

  if (passwordInput != password || emailInput == "") {
    document.getElementById("passwordErr").style.display = "block";
    valid = false;
  }

  return valid;
}

function clearErrors() {
  let errors = $(".error");
  for (let i = 0; i < errors.length; i++) {
    errors[i].style.display = "none";
  }
}

function displayRemoveRow() {
  let editElements = document.getElementsByClassName("editOptions");

  for (let i = 0; i < editElements.length; i++) {
    editElements[i].style.display = "table-cell";
  }
}

function removeRow(className) {
  let editElements = document.getElementsByClassName(className);

  for (let i = 0; i < editElements.length; i++) {
    editElements[i].style.display = "none";
  }
}


