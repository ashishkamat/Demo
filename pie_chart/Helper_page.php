<?php
include('Helper.php');
class Helper_page extends Helper
{
function __construct($databasename)
	{
		parent::__construct($databasename);
	}
function read_page($field,$table ,$condition)
	{
		$sql="SELECT $field FROM $table $condition";
		$result=$this->con->query($sql) or die($this->con->error);
		if($result->num_rows==0)
		{
			return "No rows found";
			}
			else
			{
				while($row=$result->fetch_array(MYSQL_ASSOC))
				{
					$data[]=$row;
					}
					return $data;
				}
	}
	function __destruct()
	{
		 parent::__destruct();
	}
}
$helper_page=new Helper_page("ecomm");
?>