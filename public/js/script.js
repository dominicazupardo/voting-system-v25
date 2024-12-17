function showLoginForm() {
  document.getElementById('loginForm').style.display = 'flex';
  document.getElementById('registerForm').style.display = 'none';
}

function showRegisterForm() {
  document.getElementById('registerForm').style.display = 'flex';
  document.getElementById('loginForm').style.display = 'none';
}

function closeForms() {
  document.getElementById('loginForm').style.display = 'none';
  document.getElementById('registerForm').style.display = 'none';
}
