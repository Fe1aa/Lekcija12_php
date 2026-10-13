<?php include("header.php") ?>

<div class="auth-container">
  <h1 class="h3">Please sign in</h1>
  <form action="loginlogic.php" method="POST">
    <label for="username" class="form-label">
      Username
    </label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>

    <label for="password" class="form-label">
      Password
    </label>

    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

    <button type="submit" name="submit" class="btn btn-primary btn-lg">
      Sign in
    </button>

    <small>
      Don't have an account?
      <a href="signup.php">Sign Up</a>
    </small>

    <p class="text-muted mt-5">
      Digital School &copy; 2026
    </p>
  </form>
</div>

<?php include("footer.php") ?>