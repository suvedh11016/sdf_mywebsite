document.getElementById("loginForm").addEventListener("submit", function(event) {
  event.preventDefault(); 
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  if (email === "cs22btech11016@iith.ac.in" && password === "suvedh") {
    alert("Login successful for cs22btech11016@iith.ac.in!");
    window.location.href = "website.html";
  } else if (email === "cs22btech11049@iith.ac.in" && password === "simhadri") {
    alert("Login successful for cs22btech11049@iith.ac.in!");
    window.location.href = "website.html";
  } else if (email === "cs22btech11025@iith.ac.in" && password === "vignesh") {
    alert("Login successful for cs22btech11025@iith.ac.in!");
    window.location.href = "website.html";
  } else {
    alert("Invalid email or password. Please try again.");
    document.getElementById("email").value = "";
    document.getElementById("password").value = "";
  }
});