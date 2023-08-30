let togglePassword1 = document.querySelector("#toggle-password1");

let togglePassword2 = document.querySelector("#toggle-password2");

togglePassword1.addEventListener("click", PasswordToggle1);
togglePassword2.addEventListener("click", PasswordToggle2);

function PasswordToggle1() {
  var x = document.getElementById("password1");

  if (x.type === "password") {
    x.type = "text";
    togglePassword1.classList.add("fa-eye-low-vision");
    togglePassword1.classList.remove("fa-eye");
  } else {
    x.type = "password";
    togglePassword1.classList.remove("fa-eye-low-vision");
    togglePassword1.classList.add("fa-eye");
  }
}

function PasswordToggle2() {
  var x = document.getElementById("password2");
  if (x.type === "password") {
    x.type = "text";
    togglePassword2.classList.add("fa-eye-low-vision");
    togglePassword2.classList.remove("fa-eye");
  } else {
    x.type = "password";
    togglePassword2.classList.remove("fa-eye-low-vision");
    togglePassword2.classList.add("fa-eye");
  }
}
