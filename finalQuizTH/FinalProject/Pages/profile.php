<?php include __DIR__ . '/../Components/head-start.php'; ?>
  <title>MBT | Profile</title>
<?php include __DIR__ . '/../Components/head-end.php'; ?>

<body class="profile-body" style="padding-top: 60px;">

<?php include __DIR__ . '/../Components/minimized-header.php'; ?>

<?php require __DIR__ . '/../Components/Scripts/force_login.php'; ?>

<?php
  require __DIR__ . '/../Components/Scripts/db.php';

  $statement = $db->prepare("SELECT `username`, `first_name`, `last_name` FROM `users` WHERE `id`=?");
  $statement->bind_param("i", $_SESSION["userid"]);
  $statement->execute();
  $result = $statement->get_result();

  if (!$result->num_rows) {
    $_SESSION["loggedin"] = false;
    header("location: ./login.php");
    exit;
  }

  $user = $result->fetch_assoc();
  $statement->close();

  $statement = $db->prepare("SELECT * FROM `reviews` WHERE `user_id`=?");
  $statement->bind_param("i", $_SESSION["userid"]);
  $statement->execute();
  $result = $statement->get_result();
  $reviews = $result->fetch_all(MYSQLI_ASSOC);
  $statement->close();

  $db->close();
?>


<div class="profile-container">
  <div class="profile-top">
    <div class="profile-picture">
      <img src="../Resources/Images/profilepicturedefault.jpg" alt="Profile Picture">
    </div>
    <div class="user-info">
      <div class="username"><?php echo htmlspecialchars($user['username']); ?></div>
      <div class="full-name"><?php echo htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']); ?></div>
    </div>
    <a class="logout" href="./logout.php">Logout</a>
  </div>
  <div class="line"></div>

  <h2>My Movie/TV Show Reviews</h2>
  <?php
  // Display Movie/TV Show reviews
  foreach ($reviews as $review) {
    if ($review['type'] == 'movie') {
      echo '<div>';
      echo '<h3>' . htmlspecialchars($review['title']) . '</h3>';
      echo '<p><strong>Type:</strong> ' . htmlspecialchars($review['type']) . '</p>';
      echo '<p><strong>Plot Rating:</strong> ' . htmlspecialchars($review['plot_rating']) . '</p>';
      echo '<p><strong>Characters Rating:</strong> ' . htmlspecialchars($review['characters_rating']) . '</p>';
      echo '<p><strong>Cinematography Rating:</strong> ' . htmlspecialchars($review['cinematography_rating']) . '</p>';
      echo '<p><strong>Acting Rating:</strong> ' . htmlspecialchars($review['acting_rating']) . '</p>';
      echo '<p><strong>Overall Rating:</strong> ' . htmlspecialchars($review['overall_rating']) . '</p>';
      echo '<p><strong>Text Review:</strong> ' . htmlspecialchars($review['body']) . '</p>';
      echo '<hr>';
      echo '</div>';
    }
  }
  ?>

  <h2>My Book Reviews</h2>
  <?php
  // Display Book reviews
  foreach ($reviews as $review) {
    if ($review['type'] == 'book') {
      echo '<div>';
      echo '<h3>' . htmlspecialchars($review['title']) . '</h3>';
      echo '<p><strong>Type:</strong> ' . htmlspecialchars($review['type']) . '</p>';
      echo '<p><strong>Author:</strong> ' . htmlspecialchars($review['author']) . '</p>';
      echo '<p><strong>Plot Rating:</strong> ' . htmlspecialchars($review['plot_rating']) . '</p>';
      echo '<p><strong>Characters Rating:</strong> ' . htmlspecialchars($review['characters_rating']) . '</p>';
      echo '<p><strong>Overall Rating:</strong> ' . htmlspecialchars($review['overall_rating']) . '</p>';
      echo '<p><strong>Text Review:</strong> ' . htmlspecialchars($review['body']) . '</p>';
      echo '<hr>';
      echo '</div>';
    }
  }

  ?>



  <?php
  $count = 0;
  $countMovies = 0;
  $countBooks = 0;
  foreach ($reviews as $review) {
    $count++;
    if ($review['type'] == 'movie') {
      $countMovies++;
    }
    if ($review['type'] == 'book') {
      $countBooks++;
    }
  }

  echo '<h2>Trophies</h2>';
  echo 'You have ' . $count . ' reviews total!' . "<br>";
  echo 'You have ' . $countMovies . ' movie review(s)' . "<br>";
  echo 'You have ' . $countBooks . ' book reviews(s)' . "<br>";
  function evaluateTrophy($count, $type)
  {
    if ($count >= 100) {
      return "Master $type Reviewer";
    } elseif ($count >= 50) {
      return "Expert $type Reviewer";
    } elseif ($count >= 25) {
      return "Seasoned $type Reviewer";
    } elseif ($count >= 10) {
      return "Intermediate $type Reviewer";
    } elseif ($count >= 5) {
      return "Beginner $type Reviewer";
    } else {
      return "Novice $type Reviewer";
    }
  }

  // Determine trophies for overall, movies, and books
  $overallTrophy = evaluateTrophy($count, "Overall");
  $moviesTrophy = evaluateTrophy($countMovies, "Movie");
  $booksTrophy = evaluateTrophy($countBooks, "Book");

  // Display trophies
  echo "<p>Overall Trophy: $overallTrophy</p>";
  echo "<p>Movies Trophy: $moviesTrophy</p>";
  echo "<p>Books Trophy: $booksTrophy</p>";
  ?>


  <div id="trophySlider">
    <h3>All Trophies</h3>
    <?php
    $trophyTitles = [
      "Novice",
      "Beginner",
      "Intermediate",
      "Seasoned",
      "Expert",
      "Master"
    ];
    for ($i = 1; $i <= 6; $i++) {

      $trophyTitle = $trophyTitles[$i - 1];
      echo '<div class="trophyBox" id="trophy' . $i . '">';
      echo '<img class="center" src="../Resources/Images/' . $i . '.png" alt="Trophy ' . $i . '">';
      echo '</div>';
      echo '<p style="text-align: center;">' . $trophyTitle . '</p>'; // Center the text under the image
    }
    ?>

  </div>


  <button id="prevBtn" onclick="prevTrophy()">&#10094;</button>
  <button id="nextBtn" onclick="nextTrophy()">&#10095;</button>

  <script>
    let currentTrophy = 0;

    function showTrophy(n) {
      const trophies = document.querySelectorAll('.trophyBox img');
      trophies.forEach((trophy, index) => {
        if (index === n) {
          trophy.parentNode.classList.add('unlocked');
          trophy.style.filter = 'none';
        } else {
          trophy.parentNode.classList.remove('unlocked');
          trophy.style.filter = 'blur(5px)';
        }
      });
    }

    function prevTrophy() {
      if (currentTrophy > 0) {
        currentTrophy--;
      }
      showTrophy(currentTrophy);
    }

    function nextTrophy() {
      const trophies = document.querySelectorAll('.trophyBox img');
      if (currentTrophy < trophies.length - 1) {
        currentTrophy++;
      }
      showTrophy(currentTrophy);
    }

    // Initially show the first trophy
    showTrophy(currentTrophy);
  </script>


</div>







<?php include __DIR__ . '/../Components/footer.php'; ?>