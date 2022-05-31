<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Signin Template · Bootstrap v5.1</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form method="post">
      <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      <?php
      session_start();

      if(isset($_SESSION['email'])){
          header('Location: ../pages/main.php');
      }
      include_once("../database/database.php");
      $database = new Database;
      $connection = $database->getConnection();

      if (isset($_POST['button_signin'])) {
        $loginSQL = "SELECT * FROM pengguna WHERE email ='" . $_POST['inputan_email'] .
          "' AND password = MD5('" . $_POST['inputan_password'] . "')";
        // print_r($loginSQL);

        $statement = $connection->prepare($loginSQL);
        $statement->execute();
        $row_count = $statement->rowCount();

        if ($row_count > 0) {
          $_SESSION['email'] = $_POST['inputan_email'];
          header('Location: ../pages/main.php')
      ?>
          <div class="alert alert-success" role="alert">
            Login Berhasil
          </div>
        <?php
        } else {
        ?>
          <div class="alert alert-danger" role="alert">
            Gagal Login!
          </div>
      <?php
        }
      }


      ?>
      <div class="form-floating">
        <input type="email" class="form-control" name="inputan_email" id="inputan_email" placeholder="name@example.com" required>
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="inputan_password" id="inputan_password" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" name="button_signin" type="submit">Sign in</button>
      <!-- <a href="../dashboard/index.html" class="w-100 btn btn-lg btn-warning">Ke Dashboard</a> -->
      <p class="mt-5 mb-3 text-muted">&copy;2022</p>
    </form>
  </main>



</body>

</html>