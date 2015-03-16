<?php


include "Helper_page.php";
 
  $result = $helper_page->read_record("user_id","user", "is_active='1'");
//  print_r($result); exit();
  $result1 = $helper_page->read_record("user_id","user", "is_active='0'");
	//var_dump($result);
	global $rows;
	global $temp;
	global $table;
   $temp = array();
  $rows= array();
   $table = array();
  $table['cols'] = array(

    // Labels for your chart, these represent the column titles.
    /* 
        note that one column is in "string" format and another one is in "number" format 
        as pie chart only required "numbers" for calculating percentage 
        and string will be used for Slice title
    */

    array('label' => 'User Name', 'type' => 'string'),
	array('label' => 'Active', 'type' => 'number'),
    array('label' => 'In-Active', 'type' => 'number')

);
    /* Extract the information from $result */
    foreach($result1 as $r) {

    $user=$r['user_id']

      // The following line will be used to slice the Pie chart
      // Values of the each slice

      $temp = array_push('v=>',(int)$user); 
     $rows = array_merge($rows,array_push('c=>',$temp));
    }
	foreach($result1 as $r) {

    $temp = array_push('v' => (int) $r['user_id']); 
      $rows = array_push('c' => $temp);
    }

$table['rows'] =$rows;

// convert data into JSON format
$jsonTable = json_encode($table);
//echo $jsonTable;


?>


<html>
  <head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'My Product Cart',
		  is3D:true,
          width: 800,
          height: 600
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>

  <body>
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>