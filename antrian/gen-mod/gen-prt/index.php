<?PHP
	session_start();
	include("../../gen-lib/xcfg.php");
	$loket=$_SESSION[owinisys];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Print :: Nomor Antrian</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Connect CV Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">   
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->   

<!-- //Custom Theme files --> 
<!-- js -->
<script type="text/javascript" src="jquery-1.7.2.js"></script>
<!-- //js -->

</head>
<body>
    
    <?PHP
		$sql_con="SELECT * FROM counter c 
			LEFT JOIN window w ON c.Window_ID=w.Window_ID
			WHERE c.Status='Call'";
		$xsql_con=mysqli_query($connect,$sql_con);
		$arsql_con=mysqli_fetch_array($xsql_con);
		$nmsql_con=mysqli_num_rows($xsql_con);
		if ($nmsql_con > 0){
			$tcounter=$arsql_con[Count_Number];
			$panjang=strlen($tcounter);
			$antrian=$tcounter +1;
			$Label_Window=$arsql_con[Label];
		}
	?>
		
	<div class="w3-banner">		
		<div class="w3-banner-grid1">
			<div class="col-md-8 w3-banner-left">
				<div class="w3-banner-left_txt">
					<h3>&nbsp;</h3>
					<p>&nbsp;</p>
				</div>
				<div class="social-wthree-icons bnragile-icons">
					<div class="clearfix"> </div>
				</div>
			</div>
			
			<div class="col-md-4 w3-banner-right">
                <div class="w3-heading-all">
                    <h3>AMBIL NOMOR ANTRIAN</h3>
                </div>
				<div class=" w3ls-agile-left" align="center">
                	<p align="center" style="font-size:200px; color:#FFF">
					<?PHP
					echo"$antrian";
					?>
					</p>
					 <button type="submit" class="btn btn-primary" style="font-size:40px; font-weight:bold">Cetak</button>
				</div>                        	
			</div>
			<div class="clearfix"></div>
		</div>
        
		<div class="w3-banner-grid2">
			<div class="col-md-4 w3-banner_bottom1">
				<div class="w3-banner_bottom_txt">
				   
				</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-4 w3-banner_bottom2">
			<div class="w3-banner_bottom_txt">
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-4 w3-banner_bottom3">
			<div class="w3-banner_bottom_txt">

			</div>
		</div>
	</div>
</body>
</html>