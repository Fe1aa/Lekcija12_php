<?php 
  session_start();

  require_once "config.php";

  if(!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
  }

  $id = $_GET["id"] ?? $_SESSION["user_id"] ?? null;

  if(!$id) {
    die("User ID is required.");
  }

  $sql = "SELECT * FROM new_users WHERE id = :id";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if(!$user) {
    die("User not found.");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h2>Edit Profile</h2>

      <hr>

      <form action="update.php" method="POST">
        <input type="hidden" name="id" id="<?= $user['id'] ?>">

        <div class="mb-3">
          <label>Username</label>
          <input type="text" name="username" id="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
        </div>

        <div class="mb-3">
          <label>Name</label>
          <input type="text" name="name" id="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
        </div>

        <div class="mb-3">
          <label>Surname</label>
          <input type="text" name="surname" id="form-control" value="<?= htmlspecialchars($user['surname']) ?>" required>
        </div>

        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="email" id="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary" name="update">Save Changes</button>

        <a href="dashboard.php" class="btn btn-secondary">Back</a>

      </form>
    </div>
  </div>
</body>
</html>