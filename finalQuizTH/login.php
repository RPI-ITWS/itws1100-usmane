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

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require __DIR__ . './Includes/database.php';

        $statement = $db->prepare("SELECT `id`, `password` from `users` WHERE `username`=? OR `email`=?;");
        $statement->bind_param("ss", $_POST["user"], $_POST["user"]);
        $statement->execute();
        $result = $statement->get_result();
        
        if ($result->num_rows) {
        $row = $result->fetch_assoc();
        if (password_verify($_POST["pw"], $row["password"])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["userid"] = $row["id"];
            header("location: ./Index.php");
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
    <h2>Login</h2>
    <form id="addForm" name="addForm" action="#" method="post" onsubmit="return validate(this);">
        <fieldset id="old_acc">
        <legend>Welcome to the page!</legend>
        <div class="login">

            <label class="field" for="user">Username</label>
            <div class="value"><input type="text" size="60" value="" name="user" id="user" autofocus value="<?php if (array_key_exists("user", $_POST)) echo htmlspecialchars($_POST["user"]); ?>"/></div>

            <label class="field" for="pw">Password</label>
            <div class="value"><input type="password" size="60" value="" name="pw" id="pw" /></div>

            <label class="field" for="pw">Name</label>
            <div class="value"><input type="password" size="60" value="" name="pw" id="pw" /></div>

            <label class="field" for="pw">Type (user or admin)</label>
            <div class="value"><input type="password" size="60" value="" name="pw" id="pw" /></div>


            <input type="submit" value="Log In" class="entry_buttons" id="login" name="login" />
        </div>
        </fieldset>
    </form>
    </div>
    <?php 
        include('./Includes/footer.inc.php'); 
    ?>

</body>

</html>


























