<?php
  $q=$_GET["q"];
  $dbuser="database_username";
  $dbname="database_name";
  $dbpass="database_password";
  $dbserver="database_server";

	$sql_query="SELECT count('user_id') from user where is_active='1'  ";
  $con = mysql_connect($dbserver,$dbuser,$dbpass);
  if (!$con){ die('Could not connect: ' . mysql_error()); }
  mysql_select_db($dbname, $con);
  $result = mysql_query($sql_query);
  echo "{ \"cols\": [ {\"id\":\"\",\"label\":\"Name-Label\",\"pattern\":\"\",\"type\":\"string\"}, {\"id\":\"\",\"label\":\"PointSum\",\"pattern\":\"\",\"type\":\"number\"} ], \"rows\": [ ";
  $total_rows = mysql_num_rows($result);
  $row_num = 0;
  while($row = mysql_fetch_array($result)){
    $row_num++;
    if ($row_num == $total_rows){
      echo "{\"c\":[{\"v\":\"" . $row['name'] . "-" . $row['label'] . "\",\"f\":null},{\"v\":" . $row['pointsum'] . ",\"f\":null}]}";
    } else {
      echo "{\"c\":[{\"v\":\"" . $row['name'] . "-" . $row['label'] . "\",\"f\":null},{\"v\":" . $row['pointsum'] . ",\"f\":null}]}, ";
    }
  }
  echo " ] }";
  mysql_close($con);
?