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
    <h2 class="centered"><strong>Projects</strong></h2>

    <?php
    // Assuming you have already established a database connection
    include('./Includes/conn.php'); 

    $query = "SELECT lab_name, lab_description, lab_link FROM myLabs";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["lab_name"] . "</h2>";
            echo "<p>" . $row["lab_description"] . "</p>";
            echo '<a href="' . $row["lab_link"] . '">View Project</a>';
            echo "<hr>";
        }
    } else {
        echo "No projects found in the database.";
    }

    // Close the database connection
    $db->close();
?>
    

    <?php 
        include('./Includes/footer.inc.php'); 
    ?>
    

</body>

</html>