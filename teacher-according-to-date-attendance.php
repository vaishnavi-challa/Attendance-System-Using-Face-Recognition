<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="teacher-according-to-date-attendance.css" />
    <link rel="icon" href="logo.jpg" type="image/x-icon" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />

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
  <body>
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
            <li><a href="teacher-low-attendance.php">Low Attendance</a></li>
            <li><a href="#">Attendance <br>According To The Date</a></li>
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
          <li>Attendance According To The Date</li>
        </ul>
        <div class="name-job">
          <a href="home-page.php"><span class="profile_name"><?php echo $_SESSION['tusername']; ?></span></a>
          <i class="bx bx-log-out"></i>
        </div>
      </div>
      <hr />
      <div class="container">
        <h3 class="tex">Attendance According To The Date</h3>
        <div class="legend-c">
          <fieldset>
            You can view the attendance of each class on a particular date by
            entering the class, month and date in below input options and then click on search button.
          </fieldset>
          <!-- <div > -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="flex-container">
              <div class="custom-select" style="width: 200px">
                <select name='class' type='input'>
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
              <div class="custom-select datepicker">
                <input
                  class="coc-input"
                  type="date"
                  name="datetime"
                  id="dateofbirth" />
              </div>
              <div>
                <button class="btn" type="submit" name="search-button">search</button>
              </div>
            </form>
    <!-- </div> -->
        </div>
        <br />

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
              <th>Present/Absent</th>
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
              $date=$_POST['datetime'];
              $sql= "select username,students.fname,class,phone,`$date`
              from students join $month on students.id=$month.id
              where class=$class";
              $result=$conn->query($sql);
              if ($result!=false)
              {
              $no_of_rows = $result->num_rows;
            for ($i=0;$i<$no_of_rows;$i++)
            {
                $followingdata = $result->fetch_assoc();

                if ($followingdata[$date]==1)
                {
                  $followingdata[$date]='Present';
                }
                else{
                  $followingdata[$date]='Absent';
                }
                echo "<tr><td>".$followingdata['username']."</td><td>".$followingdata['fname']. "</td><td>".$followingdata['class']. "</td><td>".$followingdata[$date]. "</td><td>" .$followingdata['phone']. "</td></tr>";

            }
          }
        }
        ?>

          </tbody>
        </table><br><br><br>
      </div>
    </section>
    <script>
      $(document).ready(function () {
        $("#checkin").DataTable();
      });
    </script>
    <script src="teacher.js"></script>
    <script src="teacher-according-to-date-attendance.js"></script>
  </body>
</html>
