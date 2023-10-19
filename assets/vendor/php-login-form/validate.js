document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.querySelector(".login");

  loginForm.addEventListener("submit", function (event) {
    const email = loginForm.querySelector('input[type="text"]');
    const password = loginForm.querySelector('input[type="password"]');

    if (!isValidEmail(email.value)) {
      event.preventDefault();
      alert("Please enter a valid email address.");
    }

    if (password.value.length < 8) {
      event.preventDefault();
      alert("Password must be at least 8 characters long.");
    }
  });

  signupForm.addEventListener("submit", function (event) {
    const email = signupForm.querySelector('input[type="text"]');
    const password = signupForm.querySelector('input[type="password"]');
    const confirmPassword = signupForm.querySelectorAll('input[type="password"]')[1];

    if (!isValidEmail(email.value)) {
      event.preventDefault();
      alert("Please enter a valid email address.");
    }

    if (password.value.length < 8) {
      event.preventDefault();
      alert("Password must be at least 8 characters long.");
    }

    if (password.value !== confirmPassword.value) {
      event.preventDefault();
      alert("Passwords do not match.");
    }
  });

  function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }
});
