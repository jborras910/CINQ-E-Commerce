let togglePassword3 = document.querySelector("#toggle-password3");
togglePassword3.addEventListener("click", PasswordToggle3);
function PasswordToggle3() {
  var x = document.getElementById("password3");
  if (x.type === "password") {
    x.type = "text";
    togglePassword3.classList.add("fa-eye-low-vision");
    togglePassword3.classList.remove("fa-eye");
  } else {
    x.type = "password";
    togglePassword3.classList.remove("fa-eye-low-vision");
    togglePassword3.classList.add("fa-eye");
  }
}
