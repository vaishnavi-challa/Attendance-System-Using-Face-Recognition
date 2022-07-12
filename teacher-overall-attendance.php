<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="teacher-overall-attendance.css" />
    <link rel="icon" href="logo.jpg" type="image/x-icon" />

    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
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
            <li><a href="#">Overall Attendance</a></li>
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
        <i class="bx bx-menu"></i>
        <span class="text">Dashboard</span>
        <ul class="breadcrumb">
          <li><a href="teacher-dashboard.php">Home</a></li>
          <li>Attendance</li>
          <li>Overall Attendance</li>
        </ul>
        <div class="name-job">
          <a href="home-page.php"><span class="profile_name"><?php echo $_SESSION['tusername']; ?></span></a>
          <i class="bx bx-log-out"></i>
        </div>
      </div>
      <hr />
      <div class="container">
        <h3 class="tex">Overall Attendance Of Students</h3>
        <div class="legend-c">
          <fieldset>
            Enter the class, month in the input boxes below to find the overall attendance of students. Additionally,
            information like their phone numbers and email addresses will be
            displayed to make it easier to get in touch with the students if required.
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
              <button class="btn" type="submit" name="search">search</button>
            </div>
          </form>
          <div class="cards-all" id='all'>
          </div>
          <?php
          $servername = "localhost";
          $username ="root";
          $password = "";
          $dbname = "rollcall";
          $conn = new mysqli($servername, $username, $password, $dbname);
          if (isset($_POST['search']))
          {
            $class=$_POST['class'];
            $month=$_POST['month'];
            $sql="select *
            from students join $month on students.id=$month.id
            where class=$class";
            $result=$conn->query($sql);
            $no_of_rows = $result->num_rows;
            $res_arr=[];
            $perct=[];
            $dayst=[];
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
            for ($i=0; $i < $no_of_rows; $i++)
            {
              $followingdata = $result->fetch_assoc();
              $res_arr[]=$followingdata;
              $user=$followingdata['username'];
              $daysatt=0;
                date_default_timezone_set("Asia/Calcutta");
                $daydate=date("d");
                $intdate=intval($daydate);
                for ($xx=1; $xx <=31 ; $xx++)
                {
                  if ($xx<10)
                  {
                    $xx='0'.strval($xx);
                  }
                  $date=date("Y").'-'.$x;
                  $date=$date.'-'.strval($xx);
                  $sql="select students.fname,`$date`as col from students join $month on students.id=$month.id where username='$user'";
                  $res=$conn->query($sql);
                  $following = $res->fetch_assoc();
                  $daysatt+=$following['col'];
                }
              $nowmonth=date('F');
              if (strtolower($nowmonth)==strtolower($month))
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
                $daystillnow=$montharr[$month];
              }
              $perc=($daysatt/$daystillnow)*100;
              $perc = number_format($perc, 2);
              $perct[]=$perc;
              $dayst[]=$daysatt;
            }

          }
           ?>
           <script type="text/javascript">
           var details = <?php echo json_encode($res_arr); ?>;
   var req=details.length;
   var month=<?php echo json_encode($month); ?>;
   var percentage=<?php echo json_encode($perct); ?>;
   var tillnow=<?php echo json_encode($dayst); ?>;
   var cards_req=parseInt(req/2)+1;
   var remaining_cards=parseInt(req%2);
   var allcards=document.getElementById('all');
   var counter=0;
   console.log(details[0]['2022-03-01']);
   var monthdays={
     'january':31,
     'february':29,
     'march':31,
     'april':30,
     'may':31,
     'june':30,
     'july':31,
     'august':30,
     'september':30,
     'october':31,
     'november':30,
     'december':31
   };
   for (var i = 0; i < cards_req; i++)
   {
     var newset=document.createElement('div');
     newset.classList.add('cards');
     allcards.appendChild(newset);
     if (i==cards_req-1)
     {
       for (var k=0;k<remaining_cards;k++)
       {
         var newcard=document.createElement('div');
         newcard.classList.add('card-1');
         newset.appendChild(newcard);
         newcard.innerHTML+=
         '<table class="text-table">'+
         '<tr>'+'<td><strong>Full Name </strong></td>'+'<td>'+details[counter]["fname"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Standard </strong></td>'+'<td>'+details[counter]["class"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Scholar Number </strong></td>'+'<td>'+details[counter]["schlno"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Last Day Attended </strong></td>'+'<td>'+details[counter]["lastdayattended"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Phone Number </strong></td>'+'<td>'+details[counter]["phone"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Email Address </strong></td>'+'<td>'+details[counter]["email"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>No of Days Attended </strong></td>'+'<td>'+tillnow[counter]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Attendance in % </strong></td>'+'<td>'+percentage[counter]+'</td>'+'</tr>'+
         '</table>';
          newcard.innerHTML+='<div id="ex'+counter+'" class="modal">'+
         '<table class="modal-table">'+
           '<thead><tr class="head-row"><th class="date-head">Date</th><th class="status-head">Status</th></tr></thead>'+
           '<tbody id="modalbody"></tbody>'+
           '</table>'+
         '<a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a><br><br></div><a href="#ex'+counter+'" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>';
         counter+=1;
       }
     }
     else
     {
       for (var j=0;j<2;j++)
       {
         var newcard=document.createElement('div');
         newcard.classList.add('card-1');
         newset.appendChild(newcard);
         newcard.innerHTML+=
         '<table class="text-table">'+
         '<tr>'+'<td><strong>Full Name </strong></td>'+'<td>'+details[counter]["fname"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Standard </strong></td>'+'<td>'+details[counter]["class"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Scholar Number </strong></td>'+'<td>'+details[counter]["schlno"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Last Day Attended</strong></td>'+'<td>'+details[counter]["lastdayattended"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Phone Number </strong></td>'+'<td>'+details[counter]["phone"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Email Address </strong></td>'+'<td>'+details[counter]["email"]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>No of Days Attended </strong></td>'+'<td>'+tillnow[counter]+'</td>'+'</tr>'+
         '<tr>'+'<td><strong>Attendance in % </strong></td>'+'<td>'+percentage[counter]+'</td>'+'</tr>'+'</table>';

         newcard.innerHTML+='<div id="ex'+counter+'" class="modal">'+
         '<table class="modal-table">'+
           '<thead><tr class="head-row"><th class="date-head">Date</th><th class="status-head">Status</th></tr></thead>'+
           '<tbody id="modalbody"></tbody>'+
           '</table>'+
         '<a href="#" rel="modal:close"><button type="button" name="button" class="close-button">Close</button></a><br><br></div><a href="#ex'+counter+'" rel="modal:open"><button type="button" name="button" class="check-attendance" id="check-attendance-1" >Check Attendance</button></a>';
         counter+=1;
       }
     }
   }
   var monthnum={
     'january':'01',
     'february':'02',
     'march':'03',
     'april':'04',
     'may':'05',
     'june':'06',
     'july':'07',
     'august':'08',
     'september':'09',
     'october':'10',
     'november':'11',
     'december':'12'
   };
   // var date=['01','02','03','04','05','06','07','08','09','10','11','12','1']
   for (var i = 0; i < req; i++)
    {
      modalid=document.getElementById('ex'+parseInt(i));
      modaltable=modalid.querySelector("#modalbody");
     console.log(modaltable);
     for (var j = 1; j<=monthdays[month]; j++)
     {
       var x='';
       if (j<10)
       {
         x+='0';
       }
       var date='2022-'+monthnum[month]+'-'+x+(j).toString();
       console.log(date);
       // console.log()
       var trmodal=document.createElement('tr');
       trmodal.classList.add('tr-class');
       modaltable.appendChild(trmodal);
       var tdmodal=document.createElement('td');
       tdmodal.classList.add('date');
       tdmodal.innerHTML=date;
       trmodal.appendChild(tdmodal);
       var tdmodal=document.createElement('td');
       tdmodal.classList.add('status');
       if (details[i][date]==1)
       {
         tdmodal.innerHTML='✔️';
       }
       else
       {
         tdmodal.innerHTML='❌';
       }
       trmodal.appendChild(tdmodal);
     }
   }

           </script>
        </div>
        <br />
      </div><br><br>
    </section>
    <script src="teacher.js"></script>
    <script src="teacher-overall-attendance.js"></script>
  </body>
</html>
