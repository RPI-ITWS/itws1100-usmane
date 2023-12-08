<?php include __DIR__ . '/../Components/head-start.php'; ?>
  <title>MBT | Sign Up</title>
<?php include __DIR__ . '/../Components/head-end.php'; ?>

<body class="create-page">

<?php include __DIR__ . '/../Components/minimized-header.php'; ?>

<?php
  $errors = array();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require __DIR__ . '/../Components/Scripts/db.php';

    if ($_POST["pw1"] != $_POST["pw2"]) {
      $errors["pw2"] = "Passwords do not match";
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $errors["email"] = "Invalid email address";
    }

    if (!preg_match('/^[\w\d]+$/', $_POST["newuser"])) {
      $errors["newuser"] = "Username may only contain letters, numbers and underscores";
    }

    if (strlen($_POST["newuser"]) > 30) {
      $errors["newuser"] = "Username can be at most 30 chars";
    }

    if (strlen($_POST["first"]) > 50) {
      $errors["first"] = "First name can be at most 50 chars";
    }
    
    if (strlen($_POST["last"]) > 50) {
      $errors["last"] = "Last name can be at most 50 chars";
    }

    foreach (["first", "last", "email", "newuser", "pw1", "pw2"] as $field) {
      if (!array_key_exists($field, $_POST) || $_POST[$field] == "") {
        $errors[$field] = "Required";
      }
    }

    if (empty($errors)) {
      $statement = $db->prepare("INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`, `email`) VALUES (?, ?, ?, ?, ?);");
      $username = $_POST["newuser"];
      $password = password_hash($_POST["pw1"], PASSWORD_DEFAULT);
      $email = $_POST["email"];
      $first = $_POST["first"];
      $last = $_POST["last"];
      $statement->bind_param("sssss", $username, $password, $first, $last, $email);
      if (!$statement->execute()) {
        echo '<script>alert(`Error creating user: "' . $statement->error . '"`);</script>';
      } else {
        echo '<script>alert("Successfully registered!");location.href="./login.php";</script>';
      }
      $statement->close();
    }

    $db->close();
  }
?>

<div class="bodyBlock">
  <form id="addForm" name="addForm" method="post">
    <fieldset id="new_acc">
      <legend>Create an Account</legend>
      <div class="formData">
        <label class="field" for="first">First Name</label>
        <div class="value">
          <input type="text" size="60" name="first" id="first" autofocus value="<?php if (array_key_exists("first", $_POST)) echo htmlspecialchars($_POST["first"]); ?>" />
          <div class="error"><?php if (array_key_exists("first", $errors)) echo htmlspecialchars($errors["first"]); ?></div>
        </div>

        <label class="field" for="last">Last Name</label>
        <div class="value">
          <input type="text" size="60" name="last" id="last" value="<?php if (array_key_exists("last", $_POST)) echo htmlspecialchars($_POST["last"]); ?>" />
          <div class="error"><?php if (array_key_exists("last", $errors)) echo htmlspecialchars($errors["last"]); ?></div>
        </div>

        <label class="field" for="email">Email</label>
        <div class="value">
          <input type="email" size="60" name="email" id="email" value="<?php if (array_key_exists("email", $_POST)) echo htmlspecialchars($_POST["email"]); ?>" />
          <div class="error"><?php if (array_key_exists("email", $errors)) echo htmlspecialchars($errors["email"]); ?></div>
        </div>

        <label class="field" for="newuser">Username</label>
        <div class="value">
          <input type="text" size="60" name="newuser" id="newuser" value="<?php if (array_key_exists("newuser", $_POST)) echo htmlspecialchars($_POST["newuser"]); ?>" />
          <div class="error"><?php if (array_key_exists("newuser", $errors)) echo htmlspecialchars($errors["newuser"]); ?></div>
        </div>

        <label class="field" for="pw1">Password</label>
        <div class="value">
          <input type="password" size="60" name="pw1" id="pw1" />
          <div class="error"><?php if (array_key_exists("pw1", $errors)) echo htmlspecialchars($errors["pw1"]); ?></div>
        </div>

        <label class="field" for="pw2">Re-Type Password</label>
        <div class="value">
          <input type="password" size="60" name="pw2" id="pw2" />
          <div class="error"><?php if (array_key_exists("pw2", $errors)) echo htmlspecialchars($errors["pw2"]); ?></div>
        </div>

        <input type="submit" value="Create Account" class="entry_buttons" id="create" name="create" />
      </div>
    </fieldset>
    <a href="./login.php">Already have an account? Log in</a>
  </form>
</div>


<?php include __DIR__ . '/../Components/footer.php'; ?>