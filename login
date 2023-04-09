<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <form class="container" action="verify.php" method="post">
    <h2>Log in to your account</h2>
    <div class="mb-3">
      <label class="form-label">Enter your username:</label>
      <input type="text" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="mb-3">
      <label class="form-label">Enter your password:</label>
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="mb-3">
      <input type="submit" class="btn btn-primary" value="Login">
    </div>
   </form>
   <div class="container">
     <p>New to our website? <a href="index.php">Create an account</a></p>
   </div>
</body>
</html>