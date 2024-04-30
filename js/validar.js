document.getElementById("submitBtn").addEventListener("click", function() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
  
    fetch("api.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ username, password }),
    })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        window.location.href = "catalogo.php";
      } else {
        document.getElementById("loginError").style.display = "block";
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      document.getElementById("loginError").style.display = "block";
    });
  });