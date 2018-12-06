<?PHP
	if (!empty($_GET['hal'])){
		$hal=$_GET['hal'];
		$no=(($max_results*$hal)-$max_results)+1;
	}
	else{
		$no=1;
	}
?>