

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" href="teacher-today-attendance.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="logo.jpg" type="image/x-icon" />
    <script>
  $(document).ready( function () {
  $('#checkin').DataTable();
  $('#checkout').DataTable();

  $('#select').on('change', function ()
  {
    var selectValue = $(this).val();
    $.ajax({
      type: "POST",
      url: "teacher-today-attendance.php",
      data: {
        selected: selectValue
      },
      success: function (data) {
        console.log(data);
        $('#pages').html(data);
      },
      error: function (data) {
        console.log(data);
      }
    });

  });
  });
  </script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> -->
    <script  src="http://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body id='pages'>
  <?php
  session_start();
   ?>
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
            <li><a href="#">Today's Attendance</a></li>
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
        <li><a href="teacher-dashboard.php">Home</a></li>
        <li>Attendance</li>
        <li>Today's Attendance</li>
      </ul>
        <div class="name-job">
          <a href="home-page.php"><span class="profile_name"><?php echo $_SESSION['tusername']; ?></span></a>
          <i class='bx bx-log-out' ></i>
        </div>
    </div>
    <hr>
    <div class="container">
      <div class="legend-c">
        <fieldset>
      Select particular class to find students who checkedin into the class. Also can click on the columns to get them sorted in alphabetical order, search usernames.
      <div style="width:200px;" >
          <select id="select" class="sss">
            <option value="0">select class</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div>
    </fieldset>
      </div>
  <br>
      <h3 class="check">CheckedIn Students</h3>
      <table id="checkin">
      <thead>
        <tr class="empty">
          <th></th>
          <th></th>
          <th></th>
        </tr>
      <tr><br><br><th>Userame</th><th>Name</th><th>Class</th></tr>
      </thead>
      <tbody>
        <?php
        if(isset($_POST["selected"]))
        {
          date_default_timezone_set("Asia/Calcutta");
         $selectedValue = $_POST['selected'];
      $date= date("Y-m-d");
      $month= strtolower(date('F'));
      $servername = "localhost";
      $username ="root";
      $password = "";
      $dbname = "rollcall";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error)
      {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql="select username,class,students.fname from students join $month on students.id=$month.id where class=$selectedValue and `$date`=1";

      $notcheckin=$conn->query($sql);
      $no_of_rows = $notcheckin->num_rows;
      for ($i=0;$i<$no_of_rows;$i++)
      {
          $followingdata = $notcheckin->fetch_assoc();
          echo "<tr><td>".$followingdata['username']."</td><td>".$followingdata['fname']. "</td><td>" .$followingdata['class']. "</td></tr>";
      }
        }
      ?>
      </tbody>
      </table>
  </div><br>
  <div class="container">
    <h3 class="check">To Be CheckedIn Students</h3>
    <table id="checkout">
    <thead>
      <tr class="empty">
        <th></th>
        <th></th>
        <th></th>
      </tr>
    <tr><br><br><th>Userame</th><th>Name</th><th>Class</th></tr>
    </thead>
    <tbody>
      <?php
      if(isset($_POST["selected"]))
      {
       $selectedValue = $_POST['selected'];
    $date= date("Y-m-d");
    $month= strtolower(date('F'));
    $sql="select username,class,students.fname from students join $month on students.id=$month.id where class=$selectedValue and `$date`=0";
    $notcheckin=$conn->query($sql);
    $no_of_rows = $notcheckin->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $followingdata = $notcheckin->fetch_assoc();
        echo "<tr><td>".$followingdata['username']."</td><td>".$followingdata['fname']. "</td><td>" .$followingdata['class']. "</td></tr>";
    }
      }
    ?>
    </tbody>
    </table>
</div><br><br>
</section>

  <script src="teacher.js"></script>
  <script src="teacher-today-attendance.js"></script>
</body>
</html>
