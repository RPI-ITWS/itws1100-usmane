<h1>Emmanuel Usman</h1>
  <div id="mybutton">
    <ul>
      <li style="display: inline-block;"><a href="./Index.php"><button type="button">Home</button></a></li>
      <li style="display: inline-block;"><a href="./Aboutme.php"><button type="button">About</button></a></li>
      <li style="display: inline-block;"><a href="./projects.php"><button type="button">Projects</button></a></li>
      <li style="display: inline-block;"><a href="#contact"><button type="button">Contact</button></a></li>
      <li style="display: inline-block;"><a href="./FinalProject/Pages/home.php"><button type="button">My Final Project</button></a></li>
    </ul>

    <?php
    // Assuming you have a variable $loggedIn that indicates whether the user is logged in or not
    include('./Includes/conn.php');
    session_start();
    if(!isset($_SESSION['name'])) {
      $_SESSION['name']='User';
    }
    
    $_SESSION['name']='Admin';
    

    if ($_SESSION['name'] == "Admin") {
        ?>
        <div id="mybutton" style="text-align: right;">
            <a href="./Index.php" onclick="logoutAction();"><button type="button">Log out</button></a>
        </div>
        <?php
    } else {
        ?>
        <div id="mybutton" style="text-align: right;">
            <a href="./login.php"><button type="button">Login</button></a>
        </div>
        <?php
    }
    ?>
  </div>

  <script>
    function logoutAction() {
    var confirmLogout = confirm("Are you sure you want to log out?");
        
        if (confirmLogout) {
            // Use AJAX to update the session variable on the server side
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./update_session.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // The session variable has been updated, now redirect
                    alert("You have successfully logged out.");
                    window.location.href = "./logout.php";
                }
            };
            xhr.send();
        }
    }  
  </script>