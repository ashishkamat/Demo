<?php
$var1=$_REQUEST['json'];
//$var2=$_REQUEST['value2'];
echo $var1."<br/>". $var2;
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
		var a= <?php echo $var1;?>
		var b= <?php echo $var2;?>
		alert(a);
        var data = google.visualization.arrayToDataTable([
          ['Active Users',  a],
          ['Inactive Users', b],
          ['Sleep',    a]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
	  
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>