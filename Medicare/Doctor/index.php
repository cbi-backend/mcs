<?php
    session_start();
    if (isset($_SESSION['DuserName']))
    {
        $userName=$_SESSION['DuserName'];
    }
    else 
    {
        echo '<script>location.href="../"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicare | Doctor</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
</head>
<body class="body">
  <header>
      <section class="header">
          <div class="head-body">
              <div class="logo">
                  <div class="title">
                      <h1><a href="">Medicare</a></h1>
                  </div>
                  <div class="menu">
                      <img  onclick="openMenu()" src="img/menu.svg" alt="">
                  </div>
              </div>
              <div class="menuContent">
                  <div class="close">
                      <img onclick="closeMenu()" src="img/close.svg" alt="">
                  </div>
                  <div class="content">
                      <ul>
                          <li><button>Dashboard</button></li>
                          <li><button onclick="logOut()">Log out</button></li>
                      </ul>
                  </div>
              </div>
              <div class="Maincontent">
                  <ul>
                        <li><button>Dashboard</button></li>
                        <li><button onclick="logOut()">Log out</button></li>
                  </ul>
              </div>
          </div>
      </section>
  </header>
    <main class="main">
        <section class="formUi">
            <div class="graph">
                <div id="patientGraph"></div>
            </div>
        </section>
    </main>
    <script src="js/style.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var width=document.getElementsByClassName("graph")[0].clientWidth;
        var height=document.getElementsByClassName("graph")[0].clientHeight;
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Patients'],
          <?php 
        $con = mysqli_connect("localhost","id14960749_mani","88=A9QaV9S+iXu!W","id14960749_medicare");
            $query="";
            $staff=$_SESSION['DuserName'];
            $query="SELECT data,count(id) FROM patients GROUP BY data";
            if ($res=mysqli_query($con, $query))
            {
                while($row=mysqli_fetch_row($res))
                {
                    echo '["'.$row[0].'",  '.$row[1].'],';
                }
                mysqli_free_result($res);
            }
            else 
            {
                echo '["0",0]';
            }
            echo '["Next Day",0]'
          ?>
        ]);

      var options = {
        chart: {
          title: 'Patient Graph',
          subtitle: 'Daily Count for this month'
        },
        width: width -30,
        height: height -30
      };

      var chart = new google.charts.Line(document.getElementById('patientGraph'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
    </script>
</body>
</html>