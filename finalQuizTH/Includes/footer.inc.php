<?php
include('./Includes/conn.php'); 

$query = "SELECT footer_name, email, phoneNumber, LinkedinLink, GithubLink FROM myFooter";
$result = mysqli_query($db, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo '<div class="footer" id="contact">';
    echo '<hr>';
    echo '<p>' . $row['footer_name'] . '</p>';
    echo '<p>Email: <a href="' . $row['email'] . '">' . $row['email'] . '</a></p>';
    echo '<p>Phone: ' . $row['phoneNumber'] . '</p>';
    echo '<p>LinkedIn: <a href="' . $row['LinkedinLink'] . '" target="_blank">' . $row['LinkedinLink'] . '</a>';
    echo ' GitHub: <a href="' . $row['GithubLink'] . '" target="_blank">' . $row['GithubLink'] . '</a></p>';
    echo '</div>';
} else {
    echo 'Error: ' . mysqli_error($db);
}

mysqli_close($db);
?>