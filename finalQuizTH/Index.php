<?php
  include('./Includes/htmlTop.inc.php'); // include the DOCTYPE and opening tags
  include('./Includes/htmlHead.inc.php'); // HAS THE HEAD WHICH SHOULD HAVE THE CSS
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>

<body>
    <?php
        include('./Includes/header.inc.php'); //has the menu which appears at the top of the page
    ?>
    <hr>

    <!--this is the photo from my main page-->
    <div class="container">
    <img src="../WebsiteResources/mountainpic.jpeg" alt="Welcome Image" class="image">
    <div class="text">
      <h1>Welcome to my Personal Website</h1>
    </div>
  </div>

    
    <!--maybe include from the footer database? not specified-->
    <!--IF I NEED TO INCLUDE IT FROM THE DATABASE I WILL LATER-->
    <?php 
        include('./Includes/footer.inc.php'); 
    ?>
</body>

</html>
