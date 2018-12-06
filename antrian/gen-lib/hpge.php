<?PHP
	$hal = $_GET['hal'];
	$gol = $_GET['gol'];
	if(empty($_GET['hal']))
	{ 
		$page = 1; 
	} 
	else 
	{ 
		$page = $_GET['hal']; 
	} 
	$max_results = 10; 
	$from = (($page * $max_results) - $max_results);
?>