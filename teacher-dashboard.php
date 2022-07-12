<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="teacher-dashboard.css">
    <link rel="icon" href="logo.jpg" type="image/x-icon" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style media="screen">
     a
     {
       text-decoration: none;
       color: black;
     }
   </style>
<body>
  <?php
  $servername = "localhost";
  $username ="root";
  $password = "";
  $dbname = "rollcall";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $teacher = $_SESSION['tusername'];
  $sql="select * from teachers where '$teacher'=username";
  $result = $conn -> query($sql);
  $row = $result -> fetch_assoc();
  ?>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bx-check'></i>
      <span class="logo_name">RollCall</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-content' ></i>
            <span class="link_name">View</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Attendance</a></li>
          <li><a href="teacher-today-attendance.php">Today's Attendance</a></li>
          <li><a href="teacher-overall-attendance.php">Overall Attendance</a></li>
          <li><a href="teacher-low-attendance.php">Low Attendance</a></li>
          <li><a href="teacher-according-to-date-attendance.php">Attendance <br>According To The Date</a></li>
        </ul>
      </li>
      <li>
        <a href="teacher-analysis.php">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="teacher-analysis.php">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="teacher-record.php">
          <i class='bx bx-video'></i>
          <span class="link_name">Record</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="teacher-record.php">Record</a></li>
        </ul>
      </li>
      <li>
        <a href="teacher-search.php">
          <i class='bx bx-search' ></i>
          <span class="link_name">Search</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="teacher-search.php">Search</a></li>
        </ul>
      </li>
      <li>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
      <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Dashboard</li>
      </ul>
        <div class="name-job">
          <a href="home-page.php"><span class="profile_name"><?php echo $row['username']; ?></span></a>
          <i class='bx bx-log-out' ></i>
        </div>
    </div>
    <hr>
    <div class="teacher-dash">
      <span class="disflex">
        <span class="teacher-details">
          <h1 class="t-head">Welcome <?php echo $row['fname']; ?>
          </h1>
          <p class="tshow">Thank you <?php echo $row['fname']; ?> for being part of our community and utilizing our service named RollCall. You can utilize this interface for purposes like to view analytics, record attendance, search for attendance of a particular student and check for today's attendance, overall attendance, attendance till date.
          </p>
          <table>
            <tr>
              <td><strong>Full Name</strong></td>
              <td><?php echo $row['fname']; ?></td>
            </tr>
            <tr>
              <td><strong>Username</strong></td>
              <td><?php echo $row['username']; ?></td>
            </tr>
            <tr>
              <td><strong>Profession</strong></td>
              <td><?php echo $row['profession']; ?></td>
            </tr>
            <tr>
              <td><strong>classes</strong></td>
              <td><?php echo $row['classes']; ?></td>
            </tr>
            <tr>
              <td><strong>Subjects</strong></td>
              <td><?php echo $row['subjects']; ?></td>
            </tr>
          </table>
        </span>
        <span class="teacher-photo">
          <img src="teacher_images/<?php echo $row['fname'].'/1.jpg';?>" alt="" width="550px" height="600px">
        </span>
      </span>
    </div>
  </section>
  <script src="teacher.js"></script>
</body>
</html>
