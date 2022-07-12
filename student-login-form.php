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
    <link rel="stylesheet" href="student-login-form.css">
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <h3>Student Login</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username" name='student-username'>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="student-password">

        <button type="submit" name='login-b'>Log In</button>
        <?php
        if (isset($_POST['login-b']))
        {
          $servername = "localhost";
          $username ="root";
          $password = "";
          $dbname = "rollcall";
          $conn = new mysqli($servername, $username, $password, $dbname);
            $username=$_POST['student-username'];
            $pass=$_POST['student-password'];
            $sql="select * from students where username='$username' and password='$pass'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
              $_SESSION['susername']=$username;
              header("Location: student-dashboard.php");
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
