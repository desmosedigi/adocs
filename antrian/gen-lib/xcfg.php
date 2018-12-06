<?PHP
	error_reporting(E_ERROR | E_PARSE);
	//$dbhost = 'IA-DIV010\MSSQLEXPRESS';
	$dbhost = "localhost";
	$dbuser = "root";	
	$dbpass = "";
	$dbname = "antrian_db";
	$connect = mysqli_connect("localhost","root","","antrian_db");
	if (!$connect) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}
?>