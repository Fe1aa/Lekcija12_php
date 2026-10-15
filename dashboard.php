<?php
  require_once "config.php";

  if(!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
  }

  $username = htmlspecialchars($_SESSION["username"], ENT_QUOTES, "UTF-8");

  $name = htmlspecialchars($_SESSION["name"], ENT_QUOTES, "UTF-8");

  include("header.php") 

?>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <div class="container-fluid">
    <a href="dashboard.php" class="navbar-brand">
      Digital School
    </a>

    <div class="navbar-nav ms-auto">
      <a href="login.php" class="nav-link">Sign Out</a>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-3 col-lg-2 sidebar p-0">
      <a href="dashboard.php" class="fw-bold">Dashboard</a>

      <a href="login.php">Sign In</a>

      <a href="signup.php">Sign Up</a>
    </nav>

    <main class="col-md-9 col-lg-10 dashboard-content">
      <h1>Dashboard</h1>

      <p>Welcome <strong><?php echo $name; ?></strong></p>

      <div class="card mt-4">
        <div class="card-body">
          <h5 class="card-title">Welcome!</h5>
          <p class="card-text">Username: <?php echo $username; ?></p>
          <p>You are successfully logged in.</p>
          <a href="signup.php" class="btn btn-primary">Create Account</a>
        </div>
      </div>

      <!-- Main content goes here -->
    </main>
  </div>
</div>

<?php include("footer.php") ?>
