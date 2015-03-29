<?php
require_once "../autoload.php";

if (isset($_POST['submit_button'])){
    $errorMessage = '';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pdo = Database::connect();
    $c = new Customer($pdo);
    $status = $c->doLogin($username, $password);
    if ($status) {
        header("Location: index.php");
        exit();
    }
    else {
        $errorMessage = "Datele de conectare sunt incorecte";
    }
}




require_once "header_html.php";
?>

<div class="container">

      <form class="form-signin" method="post" action="">
        <?php if (isset($errorMessage)) echo $errorMessage; ?>
        <h1>BITVIDEO </h1>
        <h2 class="form-signin-heading"> Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="username" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button name="submit_button" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
