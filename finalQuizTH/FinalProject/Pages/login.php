<?php include __DIR__ . '/../Components/head-start.php'; ?>
  <title>MBT | Login</title>
  <script src="../Resources/Scripts/login.js" defer></script>
<?php include __DIR__ . '/../Components/head-end.php'; ?>

<body class="login-page">

<?php include __DIR__ . '/../Components/minimized-header.php'; ?>

<?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require __DIR__ . '/../Components/Scripts/db.php';

    $statement = $db->prepare("SELECT `id`, `password` from `users` WHERE `username`=? OR `email`=?;");
    $statement->bind_param("ss", $_POST["user"], $_POST["user"]);
    $statement->execute();
    $result = $statement->get_result();
    
    if ($result->num_rows) {
      $row = $result->fetch_assoc();
      if (password_verify($_POST["pw"], $row["password"])) {
        $_SESSION["loggedin"] = true;
        $_SESSION["userid"] = $row["id"];
        header("location: ./profile.php");
        exit;
      } else {
        echo '<script>alert("Invalid login credentials");</script>';
      }
    } else {
      echo '<script>alert("Invalid login credentials");</script>';
    }

    $db->close();
  }
?>

<div class="bodyBlock">
  <h2>Login / Create Account</h2>
  <form id="addForm" name="addForm" action="#" method="post" onsubmit="return validate(this);">
    <fieldset id="old_acc">
      <legend>Already have an account? Login!</legend>
      <div class="login">

        <label class="field" for="user">Username or Email</label>
        <div class="value"><input type="text" size="60" value="" name="user" id="user" autofocus value="<?php if (array_key_exists("user", $_POST)) echo htmlspecialchars($_POST["user"]); ?>"/></div>

        <label class="field" for="pw">Password</label>
        <div class="value"><input type="password" size="60" value="" name="pw" id="pw" /></div>

        <input type="submit" value="Log In" class="entry_buttons" id="login" name="login" />
      </div>
    </fieldset>
    <a href="./create.php">Don't have an account? Create one</a>
  </form>
</div>

<?php include __DIR__ . '/../Components/footer.php'; ?>