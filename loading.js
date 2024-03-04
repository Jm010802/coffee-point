// Wait for the DOM to be fully loaded before executing the script
document.addEventListener("DOMContentLoaded", function() {
    // Set a timeout to redirect to the new link after 5 seconds
    setTimeout(function() {
      window.location.href = "login.html"; // Replace "new_page.html" with your desired link
    }, 5000); // 5000 milliseconds = 5 seconds
  });