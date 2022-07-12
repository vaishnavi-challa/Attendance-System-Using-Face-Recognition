<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="icon" href="logo.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="teacher-search.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"
    href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet"
    href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css" />
    <Script src="https://code.jquery.com/jquery-1.12.3.js"
    type="text/javascript"></Script>
    <Script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"
    type="text/javascript"></Script>
    <Script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"
    type="text/javascript"></Script>
    <Script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"
    type="text/javascript"></Script>
    <Script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"
    type="text/javascript"></Script>
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
        <a href="teacher-record.php">
          <i class='bx bx-video'></i>
          <span class="link_name">Record</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="teacher-record.php">Record</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-search' ></i>
          <span class="link_name">Search</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Search</a></li>
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
        <li>Search</li>
      </ul>
        <div class="name-job">
          <a href="home-page.php"><span class="profile_name"><?php echo $_SESSION['tusername']; ?></span></a>
          <i class='bx bx-log-out'></i>
        </div>
    </div>
    <hr>
    <div class="container">
      <div class="legend-c">
        <fieldset>
      Search details of students by Userame, Name, Class, Last Day Attended, CheckedIn time, Lastday attended, Attendance percentage this month. Select columns to find in that particular columns if more than one column are selected then the row which contains the search word in all of the selected columns (and search) will be shown.
    </fieldset>
      </div>
  <br>
  <div class="inline-class">
  <div class="search active">
		<div class="icon"></div>

		<div class="input">
			<input type="text" placeholder="Search..." id="mysearch">
		</div>
  	</div>
  <div class="a">
    <input type="checkbox" id="0" name="vehicle1" value="Bike" >
      <label for="vehicle1">Username</label><br>
      <input type="checkbox" id="1" name="vehicle2" value="Car" >
      <label for="vehicle2">Name</label><br>
  </div>
  <div class="b">
    <input type="checkbox" id="3" name="vehicle3" value="Boat" >
    <label for="vehicle3">Lastday Attended</label><br>
    <input type="checkbox" id="4" name="vehicle3" value="Boat" >
    <label for="vehicle3">CheckedIn time</label><br>
  </div>
  <div class="c">
          <input type="checkbox" id="5" name="vehicle3" value="Boat" >
          <label for="vehicle3">Attendance percentage</label><br>
          <input type="checkbox" id="6" name="vehicle3" value="Boat" >
          <label for="vehicle3">Phone Number</label><br>
  </div>
  <div class="d">
    <input type="checkbox" id="2" name="vehicle3" value="Boat" >
    <label for="vehicle3">Class</label>
  </div>
</div>
      <table id="checkin">
      <thead>
        <tr class="empty">
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>

        <!-- <input type="text" name="" value="" id='myInput'> -->
      <tr><br><br><th>Userame</th><th>Name</th><th>Class</th><th>Last day attended</th><th>CheckedIn time</th><th>Attendance percentage</th><th>phone number</th></tr>
      </thead>
      <tbody>
        <?php
        $servername = "localhost";
        $username ="root";
        $password = "";
        $dbname = "rollcall";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql="select username,fname,class,timestamping,phone,lastdayattended from students";
        $result=$conn->query($sql);
        $no_of_rows = $result->num_rows;
        for ($mm=0;$mm<$no_of_rows;$mm++)
        {
          $followingdata = $result->fetch_assoc();
          $user=$followingdata['username'];
          $daysatt=0;
          $array = array(
          1=>"january",
          2=>"february",
          3=>"march",
          4=>'april',
          5=>'may',
          6=>'june',
          7=>"july",
          8=>'august',
          9=>'september',
          10=>"october" ,
          11=>"november" ,
          12=>"december"
          );
            date_default_timezone_set("Asia/Calcutta");
            $date= date("Y-m-d");
            $daydate=date("d");
            $intdate=intval($daydate);

          $before = date('m');
          for ($i=1; $i<=$before ; $i++)
          {
            if ($i<10)
            {
              $i='0'.strval($i);
            }
            $y=$i;
            $i=intval($i);
            for ($xx=1; $xx <=31 ; $xx++)
            {
              if ($xx<10)
              {
                $xx='0'.strval($xx);
              }
              $date=date("Y").'-'.strval($y);
              $date=$date.'-'.strval($xx);
              $sql="select students.fname,`$date`as col from students join $array[$i] on students.id=$array[$i].id where username='$user'";
              $resul=$conn->query($sql);
              $followingdat = $resul->fetch_assoc();
              $daysatt+=$followingdat['col'];
            }
          }
          $date2='2022'.'-'.date('m').'-'.date('d');
          $date1=date_create("2022-01-00");
          $date2=date_create($date2);
          $daystillnow=date_diff($date1,$date2);
          $daystillnow=intval($daystillnow->format("%a"));
          $perc=($daysatt/$daystillnow)*100;
          $perc = number_format($perc, 2);
            echo "<tr><td>".$followingdata['username']."</td><td>".$followingdata['fname']. "</td><td>".$followingdata['class']. "</td><td>".$followingdata['lastdayattended']. "</td><td>" .$followingdata['timestamping']. "</td><td>".$perc."</td><td>".$followingdata['phone']. "</td></tr>";
        }


?>
      <!-- <tr><td>Daniel Danny</td><td>danny.daniel@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr
      <tr><td>Samuel</td><td>samuel@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Jack</td><td>jack@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Eureka</td><td>eureka@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Pink</td><td>pinky@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Mishti</td><td>mishti@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Puneet</td><td>puneet@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Nick</td><td>nick@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Danika</td><td>daniel@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Vishakha</td><td>vishakha@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Nitin</td><td>ni3@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Latika</td><td>latika@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Kaavya</td><td>kaavya@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Ishika</td><td>ishika@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr>
      <tr><td>Veronika</td><td>veronika@gmail.com</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td><td>Pass1234</td></tr> -->
      </tbody>
      </table>
  </div><br><br><br>
  </section>
      <script>
    $(document).ready( function () {
    $('#checkin').DataTable({
        dom: 'Blfrtip',
        buttons: [{
            text: 'Export To Excel  ',
            extend: 'excelHtml5',
            exportOptions: {
                modifier: {
                    selected: true
                },

                columns: [0, 1, 2, 3,4,5,6],
                format: {
                    header: function (data, columnIdx) {
                        return data;
                    },
                    body: function (data, column, row) {
                        debugger;
                        return column === 7 ? "" : data;
                    }
                }
            },

            footer: false,
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
            }
        }],
        "order": [[2, 'asc'],[0,'asc']],
    });
    $('#mysearch').on( 'keyup', function () {
      var table = $('#checkin').DataTable();
      var cols=[]
      var columns=['0','1','2','3','4','5','6']
      for (let i=0;i<columns.length;i++)
      {
        var x = document.getElementById(columns[i]).checked
        if (x==true)
        {
          cols.push(parseInt(columns[i]))
        }
      }
      if (cols.length<1)
      {
        table.search( this.value ).draw();
      }
      else
      {
        table.columns(cols).search( this.value ).draw();
      }
} );

} );
    </script>
  <script src="teacher.js"></script>
  <script src="teacher-search.js"></script>
</body>
</html>
