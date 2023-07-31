<?php
session_start();
if (isset($_SESSION["userName"]) && isset($_SESSION["phone"])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Ninja</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>Chat Ninja</h1>
  <div class="chat">
    <h2>Welcome &nbsp <span><?= $_SESSION["userName"] ?> </span> <button id="btnl">Logout</button> </h2>
    
    <div class="msg">
      <!-- Messages will be dynamically loaded here -->
    </div>
    <div class="input_msg">
      <input type="text" placeholder="Write your Message Here" id="input_msg"/>
      <button id="btns" onclick="update()">Send</button>
      
    </div>
  </div>

  <script>
      // JavaScript code to handle logout button click
      document.getElementById("btnl").addEventListener("click", function () {
        // Perform logout actions here (e.g., clear session data)
        clearSessionData();
      });

      function clearSessionData() {
        // Send an AJAX request to the server to clear session data
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "clearSession.php", true);
        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // The AJAX request has completed successfully
            // Redirect to the login page
            window.location.href = "login.php";
          }
        };
        xhr.send();
      }
    </script>

  <!-- Load the script after the DOM has been fully loaded -->
  <script src="js/script.js"></script>
</body>

</html>

<style>
  /* Additional CSS to align the logout button to the right */

  .chat h2 {
    display: flex;
    justify-content: space-between;
    font-size: 2rem;
   
  }
  /* Align the logout button to the right */
  .chat h2 button {
    margin-left: auto;
  }
</style>

<?php
} else {
  header('location:login.php');
}
?>
