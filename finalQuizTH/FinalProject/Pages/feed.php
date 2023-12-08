<?php include __DIR__ . '/../Components/head-start.php'; ?>
  <title>MBT | Feed</title>
  <script src="../Resources/Scripts/feed.js" defer></script>
<?php include __DIR__ . '/../Components/head-end.php'; ?>

<body class="feed-page" style="text-align:center; padding-top: 60px;">

<?php include __DIR__ . '/../Components/minimized-header.php'; ?>

<!-- Content of the page goes here -->
<h2>What would you like to see?</h2>
<form id="customForm">
  <input type="radio" id="choiceMovies" name="choice" value="Movies/TV Shows"><label for="choiceMovies">Movies/TV Shows</label>
  <input type="radio" id="choiceBooks" name="choice" value="Books"><label for="choiceBooks">Books</label>
  <button type="submit">Submit</button>
</form>

<div id="output"></div>

<?php include __DIR__ . '/../Components/footer.php'; ?>