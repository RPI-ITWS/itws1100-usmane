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
    $loggedIn = "Admin";

    if ($loggedIn == "Admin") {
        ?>
        <div id="mybutton" style="text-align: right;">
            <a href="./Index.php"><button type="button">Log out</button></a>
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
