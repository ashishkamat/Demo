
	
<?php 

session_start();
include "Helper_page.php";

$query=$helper_page->read_record("count(user_id) as active_users","user","is_active='1'");
   if(is_array($query))
    {
       foreach($query as $row)
       {
	  // print_r($row);
		$json = json_encode($row);
	 }
    }

	echo $json;
	$_SESSION['json']=$json;
	?>

<?php
 /*
$query1=$helper_page->read_record("count(user_id) as inactive_users","user","is_active='0'");
   if(is_array($query))
    {
       foreach($query1 as $row)
       {
	   ?>
      <input type="hidden" id="inactive" value="<?php echo $row['inactive_users']; ?>">*/
/*$query2=$helper_page->read_record("user_name,total_price","user_details u, order_details o,buy_details b","u.user_id=b.user_id and b.buy_id=o.buy_id");
   if(is_array($query2))
    {
       foreach($query2 as $row)
       {
       $user_name = $row['user_name'];
	   $total_price=$row['total_price'];
       }
	  print_r( $user_name);
    }
*/
?>


