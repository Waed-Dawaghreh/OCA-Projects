function checkName() {
  let regex = /^[a-zA-Z]+ [a-xA-Z]+$/;
  let regex2 = /^[a-zA-Z]+ [Al][-][a-zA-z]+$/;
  let name = document.getElementById("name").value;

  if (!regex.test(name)) {
    alert("Invalid name");
  } else {
    alert("Valid name");
  }
}

function checkPhone() {
  let regex3 = /^\(?\d{3}\)?-?\s*-?\d{4}$/;
  let phone = document.getElementById("phoneNum").value;
  if (!regex3.test(phone)) {
    alert("Invalid phone num");
  } else {
    alert("Valid Number");
  }
}
function check_Email() {
  let regex = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
  let mail = document.getElementById("email").value;
  if (regex.test(mail)) {
    return true;
    alert(" This is a valid Email email");
  } else {
    alert("This is not a valid email address");
    return false;
  }
}
function checkPass() {
  let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
  let pass = document.getElementById("password").value;
  if (regex.test(pass)) {
    return true;
    alert(" This is a valid pass ");
  } else {
    alert("This is not a valid pass ");
    return false;
  }
}
function allChecks() {
  checkName();
  checkPass();
  checkPhone();
  check_Email();
}
var checkbox = document.querySelector("input[name= policy]");

checkbox.addEventListener("change", function () {
  if (this.checked) {
    // Checkbox is checked..
    allChecks();
  } else {
  }
});
