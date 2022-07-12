<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Login Form</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="teacher-login-form.css">
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <h3>Teacher Login</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username" name="teacher-username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="teacher-password">

        <button type="submit" name='login-b'>Log In</button>

        <?php
        if (isset($_POST['login-b']))
        {
          $servername = "localhost";
          $username ="root";
          $password = "";
          $dbname = "rollcall";
          $conn = new mysqli($servername, $username, $password, $dbname);
            $username=$_POST['teacher-username'];
            $pass=$_POST['teacher-password'];
            $sql="select * from teachers where username='$username' and password='$pass'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
              $_SESSION['tusername']=$username;
              header("Location: teacher-dashboard.php");
            }
            else {
              echo '  <div class="errormsg">
        Enter Valid Credentials
                </div>';
              }
        }
          ?>

    </form>
</body>
</html>
