<?php session_start(); ?>
<?php
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "rollcall";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'january' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
$result1 = $conn->query($sql);
while($row = $result1->fetch_assoc())
{
    $january[] = $row;
}
$columnArr = array_column($january, 'COLUMN_NAME');
$suname=$_SESSION['susername'];
$sql="select * from january where fname in(select fname from students where username='$suname')";
$result1=$conn->query($sql);
$no_of_rows = $result1->num_rows;
for ($i=0;$i<$no_of_rows;$i++)
{
    $arr = $result1->fetch_array(MYSQLI_NUM);
    break;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="logo.jpg" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="student-overall-attendance.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
</head>
<body>
<?php
$student=$_SESSION['susername'];

$servername = "localhost";
$username ="root";
$password = "";
$dbname = "rollcall";
$conn = new mysqli($servername, $username, $password, $dbname);
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
    $sql="select students.fname,`$date`as col from students join $array[$i] on students.id=$array[$i].id where username='$student'";
    $result=$conn->query($sql);
    $followingdata = $result->fetch_assoc();
    $daysatt+=$followingdata['col'];
  }
}
$date2='2022'.'-'.date('m').'-'.date('d');
$date1=date_create("2022-01-00");
$date2=date_create($date2);
$daystillnow=date_diff($date1,$date2);
$daystillnow=intval($daystillnow->format("%a"));
$perc=($daysatt/$daystillnow)*100;
$perc = number_format($perc, 2);
$intper=intval($perc);
 ?>
<div id="mySidenav" class="sidenav">
  <h3 class="pabs">RollCall</h3>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <br><br><br><br><br>
  <a href="student-dashboard.php"><i class="fa fa-user" aria-hidden="true"></i> Profile Info</a><br>
  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Overall Attendance</a><br>
  <a href="student-today-attendance.php"><i class="fa-solid fa-clipboard-user"></i>  Today's Attendance</a><br>
</div>
<div class="container">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()"> &#9776;</span>
<span class="dash"> &emsp;Overall Attendance</span><span class='dropdown'><a href="home-page.php"><button class="log" id='logout'><?php print_r($student); ?>&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></button></a></span>
</div>
<div class="widgets">
<div class="widget">
  <i class="fa-regular fa-calendar-check" aria-hidden="true" class="widget-logo"></i><br>
  <div class="tcolor">Number of days Attended-<?php echo $daysatt; ?></div>
</div>
<div class="widget">
  <i class="fa-solid fa-file-pen"></i>
  <div class="tcolor">Number of working days-<?php echo $daystillnow; ?></div>
</div>
<div class="widget">
  <php echo $perc;?>
<div role="progressbar" class="pro" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="--value:<?php echo $intper; ?>"></div>
<div class="tcolor">
  Attendance Percentage
</div>
</div>
</div>
<?php
$student=$_SESSION['susername'];

$servername = "localhost";
$username ="root";
$password = "";
$dbname = "rollcall";
$conn = new mysqli($servername, $username, $password, $dbname);
$daysatt=0;
$perct=[];
$dayst=[];
$level=['low','low','low','low','low','low','low','low','low','low','low','low'];
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
$user=$_SESSION['susername'];
$before = date('m');
for ($i=1; $i<=12 ; $i++)
{
  if ($i<10)
  {
    $i='0'.strval($i);
  }
  $y=$i;
  $i=intval($i);
  $daysatt=0;
  for ($xx=1; $xx <=31 ; $xx++)
  {
    if ($xx<10)
    {
      $xx='0'.strval($xx);
    }
    $date=date("Y").'-'.strval($y);
    $date=$date.'-'.strval($xx);
    $sql="select students.fname,`$date`as col from students join $array[$i] on students.id=$array[$i].id where username='$user'";
    $result=$conn->query($sql);
    $followingdata = $result->fetch_assoc();
    $daysatt+=$followingdata['col'];
  }
  $nowmonth=date('F');
  if (strtolower($nowmonth)==strtolower($array[$i]))
  {
    $date2='2022'.'-'.date('m').'-'.date('d');
    $date1='2022'.'-'.date('m').'-'.'00';
    $date1=date_create($date1);
    $date2=date_create($date2);
    $daystillnow=date_diff($date1,$date2);
    $daystillnow=intval($daystillnow->format("%a"));
  }
  else
  {
    $montharr = array(
      "january" => 31,
      "february" =>29 ,
      "march"=>31,
      'april'=>30,
      'may'=>31,
      'june'=>30,
      "july"=>31,
      'august'=>31,
      'september'=>30,
      "october" => 31,
      "november" => 30,
      "december" => 31
    );
    $daystillnow=$montharr[$array[$i]];
  }
  $perc=($daysatt/$daystillnow)*100;
  $perc = number_format($perc, 2);
  $perct[]=$perc;
  $dayst[]=$daysatt;
  if ($daysatt>=5)
  {
    $level[$i-1]='high';
  }
  $intper=intval($perc);
}
// print_r($level);
// print_r($perct);
// print_r($dayst);
 ?>
<div class="cards">
  <div class="card">
    <div class="month">January</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[0]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[0]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[0]; ?>
    </div>
    <div id="ex1" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    for ($i=0;$i<31;$i++)
    {
      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex1" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
  <div class="card">
    <div class="month">February</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[1]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[1]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[1]; ?>
    </div>
    <div id="ex2" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'february' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $february[] = $row;
    }
    $columnArr = array_column($february, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from february where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<29;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex2" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>


  </div>
  <div class="card">
    <div class="month">March</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[2]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[2]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[2]; ?>
    </div>
    <div id="ex3" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'march' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $march[] = $row;
    }
    $columnArr = array_column($march, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from march where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<31;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex3" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
  <div class="card">
    <div class="month">April</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[3]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[3]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[3]; ?>
    </div>
    <div id="ex4" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'april' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $april[] = $row;
    }
    $columnArr = array_column($april, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from april where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<30;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex4" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
</div>
<div class="cards">
  <div class="card">
    <div class="month">May</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[4]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[4]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[4]; ?>
    </div>
    <div id="ex5" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'may' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $may[] = $row;
    }
    $columnArr = array_column($may, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from may where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<31;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex5" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
  <div class="card">
    <div class="month">June</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[5]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[5]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[5]; ?>
    </div>
    <div id="ex6" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'june' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $june[] = $row;
    }
    $columnArr = array_column($june, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from june where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<30;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex6" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
  <div class="card">
    <div class="month">July</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[6]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[6]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[6]; ?>
    </div>
    <div id="ex7" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'july' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $july[] = $row;
    }
    $columnArr = array_column($july, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from july where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<31;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex7" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
  <div class="card">
    <div class="month">August</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[7]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[7]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[7]; ?>
    </div>
    <div id="ex8" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'august' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $august[] = $row;
    }
    $columnArr = array_column($august, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from august where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<31;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex8" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
</div>
<div class="cards">
  <div class="card">
    <div class="month">September</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[8]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[8]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[8]; ?>
    </div>
    <div id="ex9" class="modal">
  <table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'september' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $september[] = $row;
    }
    $columnArr = array_column($september, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from september where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<30;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
  </table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
  </div>
    <a href="#ex9" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
  <div class="card">
    <div class="month">October</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[9]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[9]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[9]; ?>
    </div>
    <div id="ex10" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'october' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $october[] = $row;
    }
    $columnArr = array_column($october, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from october where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<31;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex10" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
  <div class="card">
    <div class="month">November</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[10]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[10]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[10]; ?>
    </div>
    <div id="ex11" class="modal">
<table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'november' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $november[] = $row;
    }
    $columnArr = array_column($november, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from november where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<30;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
</div>
    <a href="#ex11" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

  </div>
  <div class="card">
    <div class="month">December</div>
    <div class="attend">
      Number of days attended &nbsp;&nbsp;- <?php echo $dayst[11]; ?><br>
      Percentage of attendance &nbsp;- <?php echo $perct[11]; ?><br>
      Level of attendance&emsp;&emsp;&emsp;&nbsp;- <?php echo $level[11]; ?>
    </div>
    <div id="ex12" class="modal">
  <table>
  <thead>
    <tr class="head-row">
      <th class="date-head">Date</th>
      <th class="status-head">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'december' and TABLE_schema='rollcall' and (COLUMN_NAME!='fname' and COLUMN_NAME!='id')";
    $result1 = $conn->query($sql);
    while($row = $result1->fetch_assoc())
    {
        $december[] = $row;
    }
    $columnArr = array_column($december, 'COLUMN_NAME');
    $suname=$_SESSION['susername'];
    $sql="select * from december where fname in(select fname from students where username='$suname')";
    $result1=$conn->query($sql);
    $no_of_rows = $result1->num_rows;
    for ($i=0;$i<$no_of_rows;$i++)
    {
        $arr = $result1->fetch_array(MYSQLI_NUM);
        break;
    }
    for ($i=0;$i<31;$i++)
    {

      echo '<tr class="tr-class">';
      echo '<td class="date">'.$columnArr[$i].'</td>';
      if ($arr[$i+2]==1)
      {
        echo '<td class="status">✔️</td>';
      }
      if ($arr[$i+2]==0)
      {
        echo '<td class="status">❌</td>';
      }
      echo '</tr>';
    }
    ?>
  </tbody>
  </table>
  <a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a>
  <br><br>
  </div>
    <a href="#ex12" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>

</div>
</div>
<br><br><br><br><br><br>
<script type="text/javascript" src="student.js"></script>

</body>
</html>
