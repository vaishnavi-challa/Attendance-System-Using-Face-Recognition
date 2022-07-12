<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="teacher-analysis.css">
    <link rel="icon" href="logo.jpg" type="image/x-icon" />
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
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="link_name">Analytics</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Analytics</a></li>
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
        <li>Analytics</li>
      </ul>
        <div class="name-job">
          <a href='home-page.php'><span class="profile_name"><?php echo $_SESSION['tusername']; ?></span></a>
          <i class='bx bx-log-out' ></i>
        </div>
    </div>
    <hr><br>
    <div class="input-container">
      <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="classGraph" placeholder="Enter Class" id='kill' >
        <button name="gbutton" class="graph-button" type='submit'>Show Analytics</button>
      </form>
    </div>


  		<!-- <input type="text" required="" name='classpie'/> -->
  		<!-- <label>Enter Class</label> -->

    <!-- <button class="graph-button" type='submit' name="btnpie">Show Analytics</button> -->
        <?php
        if (isset($_POST['gbutton']))
        {
          echo '  <div class="flexbox">
              <div class="mychart">';
          $css=$_POST['classGraph'];

          // else {
          //   $css=8;
          // }
          $servername = "localhost";
            $username ="root";
            $password = "";
            $dbname = "rollcall";
            $conn = new mysqli($servername, $username, $password, $dbname);
            date_default_timezone_set("Asia/Calcutta");
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
      $msum=[0,0,0,0,0,0,0,0,0,0,0,0];
        for ($i=1;$i<=12;$i++)
        {
            $month=$array[$i];
          $col='2022-';
          if ($i<10)
          {
            $i='0'.strval($i);
          }
          $col=$col.strval($i).'-';

          for($j=1;$j<=31;$j++)
          {
            if($j<10)
            {
              $j='0'.strval($j);
            }
            $date=$col.strval($j);
            $sql="select class,sum(`$date`) as sum from students join $month on students.id=$month.id where class=$css group by class";
            $result=$conn->query($sql);
            $result = $result->fetch_assoc();
            $msum[$i-1]+=$result['sum'];
          }
        }
        $montharr = array(
        1=>31,
        2=>29,
        3=>31,
        4=>30,
        5=>31,
        6=>30,
        7=>31,
        8=>31,
        9=>30,
        10=>31,
        11=>30,
        12=>31
        );
        $sql="select fname from students where class=9";
         $result=$conn->query($sql);
        $n1 = $result->num_rows;
        $percentage=[0,0,0,0,0,0,0,0,0,0,0,0];
        $sump=0;
        for($i=0;$i<12;$i++)
        {
          $percentage[$i]=$msum[$i]*100/($n1*$montharr[$i+1]);
          $sump+=$percentage[$i];
        }
      for ($i=0; $i < 12; $i++) {
        $percentage[$i]=$percentage[$i]*100/$sump;
      }
      echo '<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>';}
         ?>

        <?php
        if (isset($_POST['gbutton']))
        {
        echo '</div>
          <div class="bargraph">';
        $servername = "localhost";
        $username ="root";
        $password = "";
        $dbname = "rollcall";
        $conn = new mysqli($servername, $username, $password, $dbname);

          date_default_timezone_set("Asia/Calcutta");
          $date= date("Y-m-d");
          $daydate=date("d");
          $intdate=intval($daydate);
          $month= strtolower(date('F'));
           $arr=[0,0,0];

          for ($j=1; $j <= intval($daydate); $j++) {
            $date=date("Y-m");
            if ($j<10)
            {
              $j='0'.strval($j);
            }
            $date=$date.'-'.strval($j);
            $sql="select class,sum(`$date`) as sum from students join $month on students.id=$month.id group by class";
            $result=$conn->query($sql);
           $no_of_rows = $result->num_rows;

            for ($i=0;$i<$no_of_rows;$i++)
            {
                $followingdata = $result->fetch_assoc();
               $arr[$i]+=$followingdata['sum'];
            }
          }

          $sql="select fname from students where class=8";
          $result=$conn->query($sql);
          $n1 = $result->num_rows;
          $sql="select fname from students where class=9";
          $result=$conn->query($sql);
        $n2 = $result->num_rows;
        $sql="select fname from students where class=10";
        $result=$conn->query($sql);
       $n3 = $result->num_rows;
          $cls_8=$arr[0]*100/($intdate*$n1);
          $cls_9=$arr[1]*100/($intdate*$n2);
          $cls_10=$arr[2]*100/($intdate*$n3);
          echo '<div id="myPlot" style="width:100%;max-width:700px"></div>

        </div>

      </div>
      <br><br><br>';}

         ?>

<?php
echo '<div class="flexbox">
  <div class="line-chart">';
echo '<br><br>';
if(isset($_POST['gbutton']))
{
  $css=$_POST['classGraph'];

// else
// {
//   $css=8;
// }
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "rollcall";
$conn = new mysqli($servername, $username, $password, $dbname);
date_default_timezone_set("Asia/Calcutta");
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
$monthsum=[0,0,0,0,0,0,0,0,0,0,0,0];
for ($i=1;$i<=12;$i++)
{
$month=$array[$i];
$col='2022-';
if ($i<10)
{
$i='0'.strval($i);
}
$col=$col.strval($i).'-';

for($j=1;$j<=31;$j++)
{
if($j<10)
{
  $j='0'.strval($j);
}
$date=$col.strval($j);
$sql="select class,sum(`$date`) as sum from students join $month on students.id=$month.id where class=$css group by class";
$result=$conn->query($sql);
$result = $result->fetch_assoc();
$monthsum[$i-1]+=$result['sum'];
}
}
echo '<div id="chartContainer" style="height: 500px; width: 600px;"></div>';
echo '
  </div>


  <div class="wavy-graph">';
}
?>
<?php
if(isset($_POST['gbutton'])){
  $css=$_POST['classGraph'];

// else {
//   $css=8;
// }

$servername = "localhost";
  $username ="root";
  $password = "";
  $dbname = "rollcall";
  $conn = new mysqli($servername, $username, $password, $dbname);
  date_default_timezone_set("Asia/Calcutta");
  $date= date("Y-m-d");
  $daydate=date("d");
  $intdate=intval($daydate);
  $month= strtolower(date('F'));
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
$sql= "select username,class,email,phone,students.fname,(`2022-$x-01`+`2022-$x-02`+`2022-$x-03`+`2022-$x-04`+`2022-$x-05`+`2022-$x-06`+`2022-$x-07`+`2022-$x-08`+`2022-$x-09`+`2022-$x-10`+`2022-$x-11`+`2022-$x-12`+`2022-$x-13`+`2022-$x-14`+`2022-$x-15`+`2022-$x-16`+`2022-$x-17`+`2022-$x-18`+`2022-$x-19`+`2022-$x-20`+`2022-$x-21`+`2022-$x-22`+`2022-$x-23`+`2022-$x-24`+`2022-$x-25`+`2022-$x-26`+`2022-$x-27`+`2022-$x-28`+`2022-$x-29`+`2022-$x-30`+`2022-$x-31`) as sum from students join $month on students.id=$month.id where class=$css";
$result=$conn->query($sql);
if ($result!=false)
{
$no_of_rows = $result->num_rows;
$low=0;
$lowpeople=[];
$lowsum=[];
for ($i=0;$i<$no_of_rows;$i++)
{
$followingdata = $result->fetch_assoc();
if($followingdata['sum']<5)
{
 $lowpeople[$low]=$followingdata['fname'];
 $lowsum[$low]=$followingdata['sum'];
 $low+=1;
}
}
}
echo '<div id="filled-line-chart" style="height: 500px; width: 650px;"></div>';
echo '</div>
    </div>';
echo "<br><br><br><br><br>
</section>";
}
 ?>



  <script src="teacher.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
var phpdata=<?php echo json_encode($percentage); ?>;
  function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Month', 'Attendance Percentage'],
    ['january',phpdata[0]],
    ['february',phpdata[1]],
    ['march',phpdata[2]],
    ['april',phpdata[3]],
    ['may',phpdata[4]],
    ['june',phpdata[5]],
    ['july',phpdata[6]],
    ['august',phpdata[7]],
    ['september',phpdata[8]],
    ['october',phpdata[9]],
    ['november',phpdata[10]],
    ['december',phpdata[11]],
  ]);

  var options = {
    title:'Average Monthly Attendance',
    backgroundColor:'#E4E9F7',
    is3D:true
  };

  var chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);
  }
  var xArr_php1=<?php echo json_encode($cls_8); ?>;
  var xArr_php2=<?php echo json_encode($cls_9); ?>;
  var xArr_php3=<?php echo json_encode($cls_10); ?>;
  var xArray = [xArr_php1,xArr_php2,xArr_php3];
var yArray = ["class - 8 ", "class - 9 ", "class - 10 "];

var data = [{
  x:xArray,
  y:yArray,
  type:"bar",
  orientation:"h"
}];

var layout = {autosize: true,title:"Attendance Percentage For Each Class",paper_bgcolor:'#E4E9F7',plot_bgcolor:"#E4E9F7",yaxis: {
    title: 'Classes'},xaxis: {
        title: '(Sum of attendance of all students*100/Number of students*Number of days)'}};

Plotly.newPlot("myPlot", data, layout);
var lineDiv = document.getElementById('filled-line-chart');
var low_people=<?php echo json_encode($lowpeople); ?>;
var low_sum=<?php echo json_encode($lowsum); ?>;
var traceA = {
  x: low_people,
  y: low_sum,
  type: 'scatter',
  name: 'dash: 4px 4px',
  fill: 'tonexty',
  marker: {
    symbol: 'circle',
    size: 10,
    color:"rgba(255,0,0,0.6)"
  }
};

var data = [traceA];

var layout = {
  title:'Low Attendance In A Month',
  paper_bgcolor:'#E4E9F7',plot_bgcolor:"#E4E9F7",
  xaxis: {
    rangemode: 'tozero'
  },
  yaxis: {
    rangemode: 'tozero'
  }
};

Plotly.plot( lineDiv, data, layout );
window.onload = function () {
  var month_php=<?php echo json_encode($monthsum); ?>;
    var chart = new CanvasJS.Chart("chartContainer",
    {
      backgroundColor: "#E4E9F7",
      animationEnabled: true,
      interactivityEnabled: true,
  		animationDuration: 2000,
      theme: "light2",
      title:{
        fontSize: 20,
      text: "Students Attendance In This Year"
      },
      axisX:{
   labelFontSize:10,
 },
 axisY:
 {
   labelFontSize:10,
 },
       data: [
      {
        type: "line",

        dataPoints: [
        { x: new Date(2022,00,1), y:month_php[0] },
        { x: new Date(2022, 01, 1), y: month_php[1] },
        { x: new Date(2022, 02, 1), y: month_php[2] },
        { x: new Date(2022, 03, 1), y: month_php[3] },
        { x: new Date(2022, 04, 1), y: month_php[4]},
        { x: new Date(2022, 05, 1), y: month_php[5]},
        { x: new Date(2022, 06, 1), y: month_php[6]},
        { x: new Date(2022, 07, 1), y: month_php[7]},
        { x: new Date(2022, 08, 1), y: month_php[8]},
        { x: new Date(2022, 09, 1), y: month_php[9] },
        { x: new Date(2022, 10, 1), y: month_php[10] },
        { x: new Date(2022, 11, 1), y: month_php[11] }
        ]
      }
      ]
    });

    chart.render();
  }
  </script>
</body>
</html>
