<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="student-dashboard.css">
<link rel="icon" href="logo.jpg" type="image/x-icon" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
</head>
<body>
  <?php
  $servername = "localhost";
  $username ="root";
  $password = "";
  $dbname = "rollcall";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $student = $_SESSION['susername'];
  $sql="select * from students where '$student'=username";
  $result = $conn -> query($sql);
  $row = $result -> fetch_assoc();
  $standard;
  if ($row['class']==10)
  {
    $standard='X';
  }
  else if ($row['class']==9)
  {
    $standard='IX';
  }
  else if ($row['class']==8)
  {
    $standard='VIII';
  }
  ?>
<div id="mySidenav" class="sidenav">
  <h3 class="pabs">RollCall</h3>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <br><br><br><br><br>
  <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile Info</a><br>
  <a href="student-overall-attendance.php"><i class="fa fa-calendar" aria-hidden="true"></i> Overall Attendance</a><br>
  <a href="student-today-attendance.php"><i class="fa-solid fa-clipboard-user"></i>  Today's Attendance</a><br>
</div>
<div class="container">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()"> &#9776;</span>
<span class="dash"> &emsp;Student Dashboard</span><a class="log" href="home-page.php" onclick="func()" id='logout'> Logout  <i class="fa fa-sign-out" id="logout" aria-hidden="true"></i></a>
</div>
<h1 class="headcl">Welcome <?php echo $row['fname']; ?>!!</h1>
<img src="card.gif" alt="" width="150px;" height="200px;" class="idcard">

<div class="profileinfo" id="pinfo">
  <img src="labeled_images/<?php echo $row['fname'].'/1.jpg'; ?>" alt="" class="imagecl">
    <div class="profilehead">

    <h1> Profile Information</h1>

    </div>
    <div class="studentinfo">
      <span class="tdhead">Student Name</span>  <span class="trnames"><?php echo $row['fname']; ?></span><br>
      <span class="tdhead">Standard</span>  <span class="trnames"><?php echo $standard; ?></span><br>
      <span class="tdhead">Scholar Number</span>  <span class="trnames"><?php echo $row['schlno']; ?></span><br>
      <span class="tdhead">Phone Number</span>  <span class="trnames"><?php echo $row['phone']; ?></span><br>
      <span class="tdhead">Email Id</span>  <span class="trnames"><?php echo $row['email']; ?></span><br>

    </div>
</div>
<script type="text/javascript" src="student.js"></script>
</body>
</html>
