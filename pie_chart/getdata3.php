<?php

include "Helper_page.php";


?>
<?php 
echo "<table align='left' width=90% border='1'class='table table-striped'>";
?>

<tr>
<th width="80" >Sr No</th>
<th width="60" >User Name</th>
<th width="30" >Total Price</th>
</tr>

<?php
$result=$helper_page->read_record("u.user_name username ,o.total_price total_price","user_details u, order_details o","o.buy_id in (select buy_id from buy_details where user_id in 
(select user_id from user_details))");
	$counter=0;
   if(is_array($result))
   {
      foreach($result as $row)
      {
?>
       <td width="60" ><b><?=++$counter; ?></b></td>
       <td width="30" ><?=$row['username'] ?>              </td>
       <td width="80" ><?=$row['total_price'] ?>        </td>
       </tr>
	   
<?php     
    }
echo "</table>";						
   }