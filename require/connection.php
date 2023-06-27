<?php

mysqli_report(MYSQLI_REPORT_OFF);
 

$connection = mysqli_connect("localhost","root","","crude_app");

if(mysqli_connect_errno())   
	{
		echo "Error No: ".mysqli_connect_errno();
		echo "<br />";
		echo "Error Msg: ".mysqli_connect_error();
		echo "<br />";
		die("Database Connection Failed !...");	

	}






?>