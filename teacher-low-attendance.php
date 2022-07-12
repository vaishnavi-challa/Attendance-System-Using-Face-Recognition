<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="teacher-low-attendance.css" />
    <link rel="icon" href="logo.jpg" type="image/x-icon" />

    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> -->
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"
    />
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body onload="makeTableScroll();">
    <div class="sidebar close">
      <div class="logo-details">
        <i class="bx bx-check"></i>
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
          <li><a href="#">Low Attendance</a></li>
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
        <i class="bx bx-menu"></i>
        <span class="text">Dashboard</span>
        <ul class="breadcrumb">
          <li><a href="teacher-dashboard.php">Home</a></li>
          <li>Attendance</li>
          <li>Low Attendance</li>
        </ul>
        <div class="name-job">
          <a href='home-page.php'><span class="profile_name"><?php echo $_SESSION['tusername']; ?></span></a>
          <i class="bx bx-log-out"></i>
        </div>
      </div>
      <hr />
      <div class="container">
        <h3 class="tex">Details of Low Attendance Students</h3>
        <div class="legend-c">
          <fieldset>
            Enter the class, month in the input boxes below to find the students who
            have a low attendance rate for that particular class. Additionally,
            information like their phone numbers and email addresses will be
            displayed to make it easier to get in touch with the students mentioned.
            The threshold for low attendance is 5 days per month.
          </fieldset>
          <form class="flex-container" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="custom-select" style="width: 200px">
              <select name="class" type="input">
                <option value="0">Select Class</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
            <div class="custom-select" style="width: 200px">
              <select name='month' type='input'>
                <option value="0">Select Month</option>
                <option value="january">Janaury</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
              </select>
            </div>
            <div>
              <button class="btn" type="submit" name="search-button">search</button>
            </div>
          </form>
        </div>
        <br>

        <table id="checkin">
          <thead>
            <tr class="empty">
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <br /><br />
              <th>Userame</th>
              <th>Name</th>
              <th>Class</th>
              <th>Email Address</th>
              <th>Phone Number</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $servername = "localhost";
            $username ="root";
            $password = "";
            $dbname = "rollcall";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if (isset($_POST['search-button']))
            {
              $class=$_POST['class'];
              $month=$_POST['month'];
              $array = array(
    "january" => "01",
    "february" => "02",
    "march"=>'03',
    'april'=>'04',
    'may'=>'05',
    'june'=>'06',
    "july"=>"07",
    'august'=>'08',
    'september'=>'09',
    "october" => "10",
    "november" => "11",
    "december" => "12"
);
              $x=$array[$month];
              $sql= "select username,class,email,phone,students.fname,(`2022-$x-01`+`2022-$x-02`+`2022-$x-03`+`2022-$x-04`+`2022-$x-05`+`2022-$x-06`+`2022-$x-07`+`2022-$x-08`+`2022-$x-09`+`2022-$x-10`+`2022-$x-11`+`2022-$x-12`+`2022-$x-13`+`2022-$x-14`+`2022-$x-15`+`2022-$x-16`+`2022-$x-17`+`2022-$x-18`+`2022-$x-19`+`2022-$x-20`+`2022-$x-21`+`2022-$x-22`+`2022-$x-23`+`2022-$x-24`+`2022-$x-25`+`2022-$x-26`+`2022-$x-27`+`2022-$x-28`+`2022-$x-29`+`2022-$x-30`+`2022-$x-31`) as sum from students join $month on students.id=$month.id
              where class=$class";

              $result=$conn->query($sql);
              if ($result!=false)
              {
              $no_of_rows = $result->num_rows;
            for ($i=0;$i<$no_of_rows;$i++)
            {
                $followingdata = $result->fetch_assoc();
                if($followingdata['sum']<5)
                  echo "<tr><td>".$followingdata['username']."</td><td>".$followingdata['fname']. "</td><td>".$followingdata['class']. "</td><td>".$followingdata['email']. "</td><td>" .$followingdata['phone']. "</td></tr>";

            }
          }

            }
            ?>

          </tbody>
        </table>
      </div><br><br>
    </section>
    <script>
      $(document).ready(function () {
        $("#checkin").DataTable();
        // $("#checkout").DataTable();
      });
    </script>
    <script src="teacher.js"></script>
    <script src="teacher-low-attendance.js"></script>
  </body>
</html>
