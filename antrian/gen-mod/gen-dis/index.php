<?PHP
	session_start();
	include("../../gen-lib/xcfg.php");
	$loket=$_SESSION[owinisys];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Call :: Aplikasi Antrian</title>
<meta http-equiv="refresh" content="25" > 
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

<script type="text/javascript" >
$(document).ready(function(){
	$("#play").load(function(){
		document.getElementById('suarabel').play();		
	});	
});
</script>
</head>
<body onLoad="mulai();">        
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
			$antrian=$tcounter;
			$Label_Window=strtoupper($arsql_con[Label]);
			?>
            
            <audio id="suarabel" src="../../Airport_Bell.mp3"></audio>
            <audio id="suarabelnomorurut" src="../../rekaman/nomor-urut.mp3"  ></audio> 
            <audio id="suarabelsuarabelloket" src="../../rekaman/konter.mp3"  ></audio>
        
            <audio id="belas" src="../../rekaman/belas.mp3"  ></audio> 
            <audio id="sebelas" src="../../rekaman/sebelas.mp3"  ></audio> 
            <audio id="puluh" src="../../rekaman/puluh.mp3"  ></audio> 
            <audio id="sepuluh" src="../../rekaman/sepuluh.mp3"  ></audio> 
            <audio id="ratus" src="../../rekaman/ratus.mp3"  ></audio> 
            <audio id="seratus" src="../../rekaman/seratus.mp3"  ></audio>
            
            <audio id="suarabelloket<?PHP echo $loket; ?>" src="../../rekaman/<?php echo"$arsql_con[Window_Number]"; ?>.mp3"  ></audio> 
            
            <?PHP
		}
		else{
			$sql_con="SELECT * FROM counter c 
				LEFT JOIN window w ON c.Window_ID=w.Window_ID
				WHERE c.Status='Done'";
			$xsql_con=mysqli_query($connect,$sql_con);
			$arsql_con=mysqli_fetch_array($xsql_con);
			$Label_Window=strtoupper($arsql_con[Label]);
			$antrian=$arsql_con[Count_Number];
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
			
			<div class="col-md-4 w3-banner-right" style="background-color:#000;">
                <div class="w3-heading-all">
                    <h3 style="font-size:45px;"><u><?PHP echo"$Label_Window"; ?></u></h3>
                </div>
				<div class=" w3ls-agile-left">
                	<p align="center" style="font-size:250px; color:#FFF; font-weight:bold;">
					<?PHP
						if ($nmsql_con > 0){
							for($i=0;$i<$panjang;$i++){
								?>
								<audio id="suarabel<?php echo $i; ?>" src="../../rekaman/<?php echo substr($tcounter,$i,1); ?>.mp3" ></audio>   	        
								<?php
							}
							echo"$antrian";
						}
						else{
							echo"$antrian";
						}
					?>
					</p>
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

	<script type="text/javascript">
		function mulai(){
			//MAINKAN SUARA BEL PADA SAAT AWAL
			document.getElementById('suarabel').pause();
			document.getElementById('suarabel').currentTime=0;
			document.getElementById('suarabel').play();
					
			//SET DELAY UNTUK MEMAINKAN REKAMAN NOMOR URUT		
			totalwaktu=document.getElementById('suarabel').duration*1000;	
		
			//MAINKAN SUARA NOMOR URUT		
			setTimeout(function() {
					document.getElementById('suarabelnomorurut').pause();
					document.getElementById('suarabelnomorurut').currentTime=0;
					document.getElementById('suarabelnomorurut').play();
			}, totalwaktu);
			totalwaktu=totalwaktu+1500;
			
			<?php
				//JIKA KURANG DARI 10 MAKA MAIKAN SUARA ANGKA1
				if($antrian<10){					
			?>
					
					setTimeout(function() {
							document.getElementById('suarabel0').pause();
							document.getElementById('suarabel0').currentTime=0;
							document.getElementById('suarabel0').play();
						}, totalwaktu);
					
					totalwaktu=totalwaktu+1000;
			<?php		
				}elseif($antrian ==10){
					//JIKA 10 MAKA MAIKAN SUARA SEPULUH
			?>  
						setTimeout(function() {
								document.getElementById('sepuluh').pause();
								document.getElementById('sepuluh').currentTime=0;
								document.getElementById('sepuluh').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
				<?php		
					}elseif($antrian ==11){
						//JIKA 11 MAKA MAIKAN SUARA SEBELAS
				?>  
						setTimeout(function() {
								document.getElementById('sebelas').pause();
								document.getElementById('sebelas').currentTime=0;
								document.getElementById('sebelas').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
				<?php		
					}elseif($antrian < 20){
						//JIKA 12-20 MAKA MAIKAN SUARA ANGKA2+"BELAS"
				?>  				
						setTimeout(function() {
								document.getElementById('suarabel1').pause();
								document.getElementById('suarabel1').currentTime=0;
								document.getElementById('suarabel1').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						setTimeout(function() {
								document.getElementById('belas').pause();
								document.getElementById('belas').currentTime=0;
								document.getElementById('belas').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
				<?php		
					}elseif($antrian < 100){				
						//JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
				?>  
						setTimeout(function() {
								document.getElementById('suarabel0').pause();
								document.getElementById('suarabel0').currentTime=0;
								document.getElementById('suarabel0').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						setTimeout(function() {
								document.getElementById('puluh').pause();
								document.getElementById('puluh').currentTime=0;
								document.getElementById('puluh').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						setTimeout(function() {
								document.getElementById('suarabel1').pause();
								document.getElementById('suarabel1').currentTime=0;
								document.getElementById('suarabel1').play();
							}, totalwaktu);
						totalwaktu=totalwaktu+1000;
						
				<?php
					}else{
						//JIKA LEBIH DARI 100 
						//Karena aplikasi ini masih sederhana maka logina konversi hanya sampai 100
						//Selebihnya akan langsung disebutkan angkanya saja 
						//tanpa kata "RATUS", "PULUH", maupun "BELAS"
				?>
				
				<?php 
					for($i=0;$i<$panjang;$i++){
				?>
				
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
								document.getElementById('suarabel<?php echo $i; ?>').pause();
								document.getElementById('suarabel<?php echo $i; ?>').currentTime=0;
								document.getElementById('suarabel<?php echo $i; ?>').play();
							}, totalwaktu);
				<?php
					}
					}
				?>
				
				
				totalwaktu=totalwaktu+500;
				setTimeout(function() {
								document.getElementById('suarabelsuarabelloket').pause();
								document.getElementById('suarabelsuarabelloket').currentTime=0;
								document.getElementById('suarabelsuarabelloket').play();
							}, totalwaktu);
				
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
								document.getElementById('suarabelloket<?php echo $loket; ?>').pause();
								document.getElementById('suarabelloket<?php echo $loket; ?>').currentTime=0;
								document.getElementById('suarabelloket<?php echo $loket; ?>').play();
							}, totalwaktu);	
		}
    </script>

</body>
</html>