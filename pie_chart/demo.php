<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Pie Chart Demo (Google VAPI) - http://codeofaninja.com/</title>
    </head>
    
<body style="font-family: Arial;border: 0 none;">
    <!-- where the chart will be rendered -->
    <div id="visualization" style="width: 600px; height: 400px;"></div>
 
    <?php
 
    //include database connection
    include 'Helper_page.php';
 
    //query all records from the database
   $result=$helper_page->read_record("*","user","is_active='1'");


 
   if(is_array($result))
    {
 
    ?>
        <!-- load api -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Active Users', 'In-active Users'],
                    <?php
                    while( $row = $result->fetch_assoc() ){
                        extract($row);
                        echo "['{$is_active}', {$user_id}],";
                    }
                    ?>
                ]);
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"User List"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
 
    }else{
        echo "No programming languages found in the database.";
    }
    ?>
    
</body>
</html>