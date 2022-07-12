<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

  <meta charset="UTF-8">
  <link rel="icon" href="logo.jpg" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script defer src="face-api.min.js"></script>
  <!-- <script defer src="pass.js"></script> -->
  <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
  <script defer src="student-record.js"></script>
  <title>Face Recognition</title>
  <link rel="stylesheet" href="student-record.css">
  <style>
    body
    {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column
    }

    canvas
    {
      position: absolute;
      right:4%;
      z-index: 2;
    }
  </style>
</head>
<body>

  <nav class="container">
    <input id="nav-toggle" type="checkbox" />
    <div class="logo roll">Roll<strong>Call</strong></div>
    <img src="logo.jpg" alt="" width="40px" class="tick">
    <ul class="links">
      <li class="list">
        <a href="home-page.php" class='font'>Home</a>
        <div class="home_underline"></div>
      </li>
      <li class="list">
        <a href="teacher-login-form.php" class='font'>Teacher Page</a>
        <div class="home_underline"></div>
      </li>
      <li class="list">
        <a href="student-login-form.php" class='font'>Student Page</a>
        <div class="home_underline"></div>
      </li>
    </ul>
    <label for="nav-toggle" class="icon-burger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </label>
  </nav>
  <br><br><br>
  <div class="rtext">
    <h2 class="record">Record Your Attendance</h2><br>
    <p class="showtext">Record your attendance using webcam instantly. Our tool assures accurate time records and reduces the cost of human data entry errors.
      Face api (open source) is used in the following project, which aids with the recognition of faces and used to track the attendance of students in a class, helps to store students absentee record and attendance history.</p>
      <button class="rbutton" id='startw'>Start Webcam</button>
      <button class="sbutton" id='stopw'>Stop Webcam</button>
  </div>
  <video id="videoInput" width="630" height="450" muted controls class="mask">
    <?php
      if (isset($_POST['jsvar']))
      {
        $updatestud=$_POST['jsvar'];
        date_default_timezone_set('Asia/Kolkata');
        $date= date("Y-m-d");
        $month= strtolower(date('F'));
        $time=date("H:i:s");
        $servername = "localhost";
        $username ="root";
        $password = "";
        $dbname = "rollcall";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $rows=count($updatestud);
        for ($i=0; $i <$rows; $i++)
        {
          $sql=  "update $month set `$date`=1 where fname='$updatestud[$i]'";
          $result=$conn->query($sql);
          $sql="update students set timestamping='$time',lastdayattended='$date' where fname='$updatestud[$i]'";
          $result=$conn->query($sql);
        }
      }
     ?>

</body>
</html>
