<div align="center" style="margin-top:-8px;">
<?PHP
$total_results = (($total_produk));
		
$total_pages = ceil($total_results / $max_results);
if ($total_pages > 18){
	$total_pages = 18;
} 
else if ($total_pages <= 18){
	$total_pages = $total_pages;
}

if ($total_pages>1){					
	// Build Prev Link 
	if($hal > 1)
	{
		$prev = ($page - 1);  
		echo"<input type='button' value='Sebelumnya' class='page-but'
			onclick=\"javascript:ajaxcenter('$pagex&hal=$prev', 'centercolumn');\">&nbsp;";
	} 
	
	for($i = 1; $i <= $total_pages; $i++)
	{ 
		if($hal == $i)
		{ 
			echo "<input type='button' value='$i' class='page-but' disabled >&nbsp;"; 
		} 
		else 
		{ 
			echo"<input type='button' value='$i' class='page-but'
			onclick=\"javascript:ajaxcenter('$pagex&hal=$i', 'centercolumn');\">&nbsp;";
		}
	}
		
	// Build Next Link 
	if($hal < $total_pages)
	{ 
		$next = ($page + 1); 
		echo"<input type='button' value='Berikutnya' class='page-but'
			onclick=\"javascript:ajaxcenter('$pagex&hal=$next', 'centercolumn');\">&nbsp;";
	}
}
?>
</div>