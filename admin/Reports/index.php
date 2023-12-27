<?php
  $con = mysqli_connect("localhost","root","","ovas_db");
  if($con){
    echo "";
  }
?>
<html>
<ul>
    <li>
        <a class="btn btn-light border btn-flat btn-sm"href="./Reports/generate_pdf.php" target="_blank" rel="noopener noreferrer"><i class="fa fa-chart"></i>Generate Report...</a>
    </li>
</ul>
  <head><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['stock', 'contribution'],
         <?php
         $sql = "SELECT * FROM contribution";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['stock']."',".$result['contribution']."],";
          }

         ?>
        ]);

        var options = {
          title: 'PUPZ VET CLINIC REPORTS....'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 2000px; height: 400px;"></div>
  </body>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['month', 'pets', 'customers', 'stocks'],
          ['july', 2500, 1300, 5000],
          ['august', 1500, 1300, 7500],
          ['september', 1200, 1500, 6200],
          
        ]);

        var options = {
         
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 1650px; height: 400px;"></div>
  </body>
  
</html>
