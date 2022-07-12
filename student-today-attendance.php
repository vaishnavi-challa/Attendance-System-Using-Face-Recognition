<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="student-today-attendance.css">
<link rel="icon" href="logo.jpg" type="image/x-icon" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
</head>
<body id='dash'>
<?php
session_start();

 ?>
<div id="mySidenav" class="sidenav">
  <h3 class="pabs">RollCall</h3>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <br><br><br><br><br>
  <a href="student-dashboard.php"><i class="fa fa-user" aria-hidden="true"></i> Profile Info</a><br>
  <a href="student-overall-attendance.php"><i class="fa fa-calendar" aria-hidden="true"></i> Overall Attendance</a><br>
  <a href="#"><i class="fa-solid fa-clipboard-user"></i>  Today's Attendance</a><br>
</div>
<div class="container">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()"> &#9776;</span>
<span class="dash"> &emsp;Today's Attendance</span><span class='dropdown'><a href="home-page.php"><button class="log" href="" id='logout'><?php echo $_SESSION['susername']; ?> &nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></button></a></span>
</div>
<div class="trackattendance">
  <span class="tcolor">Track Your Today's Attendance</span>
  <br>
    <a id='tracka'><button type="button" name="button" class="track-attendance">Track Attendance</button><br><br></a>
    <script type="text/javascript">
    $(document).ready( function () {
    $('#tracka').on('click', function () {
      var selectedValue = $(this).val();
      $.ajax({
        type: "POST",
        url: "student-today-attendance.php",
        data: {
          selected: selectedValue
        },
        success: function (data) {
          $('#dash').html(data);
        },
        error: function (data) {
          console.log(data);
        }
      });
    });
    });
    </script>
    <?php
    date_default_timezone_set('Asia/Kolkata');
    $date= date("Y-m-d");
    $month= strtolower(date('F'));
    $servername = "localhost";
    $username ="root";
    $password = "";
    $dbname = "rollcall";
    $x=$_SESSION['susername'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql="select username from students join $month on students.id=$month.id where username='$x' and `$date`=0";
    $result=$conn->query($sql);
if(isset($_POST["selected"]))
{

    $no_of_rows = $result->num_rows;
    if ($no_of_rows!=0)
    {
      echo "<span class='yesorno'>

         You <span class='r-color'>haven't recorded</span> your attendance today.
      </span><br>";
      echo '<a href="student-record.php"><button type="button" name="button" class="track-attendance">Submit Attendance</button></a><br><br>';

    }
    else{
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
$user=$_SESSION['susername'];
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
          $sql="select students.fname,timestamping,lastdayattended,`$date`as col from students join $array[$i] on students.id=$array[$i].id where username='$user'";
          $result=$conn->query($sql);
          $followingdata = $result->fetch_assoc();
          $daysatt+=$followingdata['col'];
          $ll=$followingdata['lastdayattended'];
          $yy=$followingdata['timestamping'];
        }
      }
      $date2='2022'.'-'.date('m').'-'.date('d');
      $date1=date_create("2022-01-00");
      $date2=date_create($date2);
      $daystillnow=date_diff($date1,$date2);
      $daystillnow=intval($daystillnow->format("%a"));
      $perc=($daysatt/$daystillnow)*100;
      $perc = number_format($perc, 2);
      // echo $perc;
      echo '<span class="yesorno">
        You have <span class="s-color">successfully</span> submitted your attendance today.
      </span>';


      echo '<table class="table-decor">
        <tr>
          <td class="td-decor">No.of days attended</td>
          <td class="td-decor">'.$daysatt.'</td>
        </tr><br>
        <tr>
          <td class="td-decor">Last date Attended</td>
          <td class="td-decor">'.$ll.'</td>
        </tr><br>
        <tr>
          <td class="td-decor">Check-in Time</td>
          <td class="td-decor">'.$yy.'</td>
        </tr>
      </table>';
    }
  }
     ?>




</div>


<br>
<script type="text/javascript" src="student.js"></script>

</body>
</html>
