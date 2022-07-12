<?php
session_start();
$servername = "localhost";
$username ="root";
$password = "";
$dbname='rollcall';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
echo 'error';
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="teacher-record.css">
    <link rel="icon" href="logo.jpg" type="image/x-icon" />
    <script defer src="face-api.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bx-check'></i>
      <span class="logo_name">RollCall</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="teacher-dashboard.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="teacher-dashboard.php">Dashboard</a></li>
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
        <a href="#">
          <i class='bx bx-video'></i>
          <span class="link_name">Record</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Record</a></li>
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
        <li><a href="teacher-dashboard.php">Home</a></li>
        <li>Record Attendance</li>
      </ul>
        <div class="name-job">
          <span class="profile_name"><?php echo $_SESSION['tusername']; ?></span>
          <i class='bx bx-log-out' ></i>
        </div>
    </div>
    <hr>
    <button class="collapsible">Need Help</button>
    <div class="content">
      Upload an image of classroom with students and can directly mark the attendance of students present in the image.
    </div>
      <div class="rcontainer flexing">

        <div class="image-upload">
          <h1>Record Attendance By Uploading Photograph</h1>
          <div class="drag-area">
        <div class="icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
        <header>Drag & Drop to Upload File</header>
        <span>OR</span>
        <form action="/handleUpload" method="post" enctype="multipart/form-data">
              <input type="file" name="photo" class="filec" id='imageUpload' value="Upload"/><br>
              <!-- &emsp;&emsp;&emsp;&emsp;<input type="submit" value="Upload"/> -->
           </form>
      </div>
        </div>
        <div class="imageshown" id='#images'>

        </div>
      <?php
      if (isset($_POST['selecting']))
      {
        $y=$_POST['selecting'];
      $rows=count($_POST['selecting']);
      date_default_timezone_set('Asia/Kolkata');
      $date= date("Y-m-d");
      $month= strtolower(date('F'));
      $time=date("H:i:s");
      for ($i=0;$i<$rows;$i++)
      {
        $x=$y[$i];
        $sql=  "update $month set `$date`=1 where fname='$x'";
        $result=$conn->query($sql);
          $sql="update students set timestamping='$time',lastdayattended='$date' where fname='$x'";
          $result=$conn->query($sql);
      }
      }
       ?>
      </div>

    <br>
  </section>
  <script defer src="teacher-record.js"></script>
  <script src="teacher.js"></script>
  <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
</body>
</html>
