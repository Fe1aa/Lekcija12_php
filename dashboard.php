<?php
  session_start();

  require_once "config.php";

  if(!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
  }

  $sql = "SELECT * from new_users";

  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $username = htmlspecialchars($_SESSION["username"], ENT_QUOTES, "UTF-8");

  $name = htmlspecialchars($_SESSION["name"], ENT_QUOTES, "UTF-8");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .sidebar {
      border-right: 1px solid #ddd;
      color: #fff;
      min-height: 100vh;
    }

    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: #333;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #e9ecef;
    }

    .main-content {
      padding: 30px;
    }
  </style>
</head>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <div class="container-fluid">

    <span class="navbar-brand">
      Welcome; <?= htmlspecialchars($_SESSION["username"]); ?>
    </span>

    <a href="logout.php" class="btn btn-outline-light">
      Sign Out
    </a>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 sidebar">
      <h5 class="mt-4 ms-3">Menu</h5>

      <a href="dashboard.php">Dashboard</a>

      <a href="profile.php">Edit Profile</a>
    </div>

    <main class="col-md-10 main-content">
      <!-- Main content goes here -->
       <h2>Dashboard</h2>

       <hr>

       <h4>All registered users</h4>

       <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Name</th>
              <th>Surname</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($users as $user): ?>
              <tr>
                <td><?php echo htmlspecialchars($user["id"]); ?></td>
                <td><?php echo htmlspecialchars($user["username"]); ?></td>
                <td><?php echo htmlspecialchars($user["name"]); ?></td>
                <td><?php echo htmlspecialchars($user["surname"]); ?></td>
                <td><?php echo htmlspecialchars($user["email"]); ?></td>
                <td>
                  <a href="profile.php?id=<?= $user['id'] ?>" class="btn btn-primary btn-sm">Update</a>

                  <form action="delete.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                    <input type="hidden" name="id" id="<?= $user['id'] ?>"> 
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </main>
  </div>
</div>

</html>
