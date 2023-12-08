<?php include __DIR__ . '/../Components/head-start.php'; ?>
  <title>MBT | Review</title>
<?php include __DIR__ . '/../Components/head-end.php'; ?>

<body class="review-page">

<?php include __DIR__ . '/../Components/minimized-header.php'; ?>

<!-- Content of the page goes here -->
<h1 style="text-align: center; color: white; font-size: 2em; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Review a Movie/TV Show or Book</h1>

<?php require __DIR__ . '/../Components/Scripts/force_login.php'; ?>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require __DIR__ . '/../Components/Scripts/db.php';
    if ($_POST["reviewType"] == "book") {
      $statement = $db->prepare("INSERT INTO `reviews`
        (`user_id`, `type`, `title`, `author`, `plot_rating`, `characters_rating`, `overall_rating`, `body`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
      $userid = $_SESSION["userid"];
      $statement->bind_param("isssiiis", $userid,
        $_POST["reviewType"],
        $_POST["title"],
        $_POST["author"],
        $_POST["plot"],
        $_POST["characters"],
        $_POST["overallRating"],
        $_POST["textReview"]
      );
      if (!$statement->execute()) {
        echo "<script>alert(`Failed to save! Error: '" . addslashes($statement->error) . "'`)</script>";
      } else {
        echo "<script>alert(`Successfully saved!`);</script>";
      }
      $statement->close();
    }
    if ($_POST["reviewType"] == "movie") {
      $statement = $db->prepare("INSERT INTO `reviews`
        (`user_id`, `type`, `title`, `plot_rating`, `characters_rating`, `cinematography_rating`, `acting_rating`, `overall_rating`, `body`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");
      $userid = $_SESSION["userid"];
      $statement->bind_param("issiiiiis", $userid,
        $_POST["reviewType"],
        $_POST["title"],
        $_POST["plot"],
        $_POST["characters"],
        $_POST["cinematography"],
        $_POST["acting"],
        $_POST["overallRating"],
        $_POST["textReview"]
      );
      if (!$statement->execute()) {
        echo "<script>alert(`Failed to save! Error: '" . addslashes($statement->error) . "'`)</script>";
      } else {
        echo "<script>alert(`Successfully saved!`);</script>";
      }
      $statement->close();
    }
    $db->close();
  }
?>


<form id="reviewForm" method="POST">
  <label for="reviewType">Select Type:</label>
  <select id="reviewType" name="reviewType" onchange="toggleFields()">
    <option value="movie" selected>Movie/TV Show</option>
    <option value="book">Book</option>
  </select>

  <label for="title">Title:</label>
  <input type="text" id="title" name="title" required>

  <label style="display:none;" for="author">Author (for books):</label>
  <input style="display:none;" type="text" id="author" name="author">

  <label for="plot">Plot Rating (1-10):</label>
  <input type="number" id="plot" name="plot" min="1" max="10" required>

  <label for="characters">Characters Rating (1-10):</label>
  <input type="number" id="characters" name="characters" min="1" max="10" required>

  <label for="cinematography">Cinematography Rating (1-10):</label>
  <input type="number" id="cinematography" name="cinematography" min="1" max="10">

  <label for="acting">Acting Rating (1-10):</label>
  <input type="number" id="acting" name="acting" min="1" max="10">

  <label for="overallRating">Overall Rating (1-10):</label>
  <input type="number" id="overallRating" name="overallRating" min="1" max="10" required>

  <label for="textReview">Text Review:</label>
  <textarea id="textReview" name="textReview" rows="4" placeholder="Add a text review" maxlength="500"></textarea>

  <button type="submit">Submit Review</button>
</form>

<script>
  function toggleFields() {
    const reviewType = $('#reviewType').val();
    const cinematographyField = $('#cinematography, label[for="cinematography"]');
    const actingField = $('#acting, label[for="acting"]');
    const authorField = $('#author, label[for="author"]');

    if (reviewType === 'book') {
      cinematographyField.hide();
      actingField.hide();
      authorField.show();
    } else {
      cinematographyField.show();
      actingField.show();
      authorField.hide();
    }
  }
</script>


<?php include __DIR__ . '/../Components/footer.php'; ?>