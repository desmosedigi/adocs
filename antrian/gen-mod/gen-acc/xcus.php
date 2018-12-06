<?PHP
	session_start();
	include("../../gen-lib/xcfg.php");
	$now=date("Y-m-d h:i:sa");
	if ($_GET[act]=="setmdl") {
		extract($_POST);
		if(!empty($_GET[usrid])){			
			$nsql=0;
			$sqlc="SELECT gac.User_ID FROM gen_access_custom gac WHERE gac.User_ID='$_GET[usrid]'";
			//echo"$sqlc <br/>";
			$xsqlc=mysqli_query($connect,$sqlc);
			$nsqlc=mysqli_num_rows($xsqlc);
			//echo"$nsqlc";
			if ($nsqlc >= 1){
				/*====================== SUB NAVIGATE ============================*/
				for ($x=0;$x<count($txtNavigateIDX);$x++){
					$sqlrx="SELECT gac.Navigate_ID FROM gen_access_custom gac 
						WHERE gac.User_ID='$_GET[usrid]' AND gac.Navigate_ID='$txtNavigateIDX[$x]'";
					//echo"$sqlrx <br/>";
					$xsqlrx=mysqli_query($connect,$sqlrx);
					$nsqlrx=mysqli_num_rows($xsqlrx);
					if ($nsqlrx >= 1){
						$sqlux="UPDATE gen_access_custom SET Data_Active='$chkActiveX[$x]'
							WHERE Access_ID='$txtAccessIDX[$x]'";
						//echo"$sqlux <br>";
						$xsqlux=mysqli_query($connect,$sqlux);
					}
					else if ($nsqlrx <= 0){
						$sqlix="INSERT INTO gen_access_custom(User_ID,Navigate_ID,Data_Active,Data_Create,User_Create) VALUES 
							('$_GET[usrid]','$txtNavigateIDX[$x]','$chkActiveX[$x]','$now','$_SESSION[oidisys]')";
						//echo"$sqli <br>";
						$xsqlix=mysqli_query($connect,$sqlix);
					}
					//$xsqlux=mysqli_query($connect,$sqlux);
				}
				/*====================== SUB NAVIGATE ============================*/
				for ($y=0;$y<count($txtNavigateIDY);$y++){
					$sqlry="SELECT gac.Navigate_ID FROM gen_access_custom gac 
						WHERE gac.User_ID='$_GET[usrid]' AND gac.Navigate_ID='$txtNavigateIDY[$y]'";
					$xsqlry=mysqli_query($connect,$sqlry);
					$nsqlry=mysqli_num_rows($xsqlry);
					if ($nsqlry >= 1){	
						$sqluy="UPDATE gen_access_custom SET Data_Active='$chkActiveY[$y]'
							WHERE Access_ID='$txtAccessIDY[$y]'";
						//echo"$sqluy <br>";
						$xsqluy=mysqli_query($connect,$sqluy);
					}
					else if ($nsqlry <= 0){
						$sqliy="INSERT INTO gen_access_custom(User_ID,Navigate_ID,Data_Active,Data_Create,User_Create) VALUES 
							('$_GET[usrid]','$txtNavigateIDY[$y]','$chkActiveY[$y]','$now','$_SESSION[oidisys]')";
						//echo"$sqli <br>";
						$xsqliy=mysqli_query($connect,$sqliy);
					}
					//$xsqlux=mysqli_query($connect,$sqlux);
				}
			}
			else if ($nsqlc <= 0){
				for ($x=0;$x<count($txtNavigateIDX);$x++){
					$sqlix="INSERT INTO gen_access_custom(User_ID,Navigate_ID,Data_Active,Data_Create,User_Create) VALUES 
						('$_GET[usrid]','$txtNavigateIDX[$x]','$chkActiveX[$x]','$now','$_SESSION[oidisys]')";
					//echo"$sqli <br>";
					$xsqlix=mysqli_query($connect,$sqlix);
				}
				
				for ($y=0;$y<count($txtNavigateIDY);$y++){
					$sqliy="INSERT INTO gen_access_custom(User_ID,Navigate_ID,Data_Active,Data_Create,User_Create) VALUES 
						('$_GET[usrid]','$txtNavigateIDY[$y]','$chkActiveY[$y]','$now','$_SESSION[oidisys]')";
					//echo"$sqli <br>";
					$xsqliy=mysqli_query($connect,$sqliy);
				}
			}

			//=======================================================================================================//
			
			if($xsqlix or xsqliy or xsqliz or $xsqlux or $xsqluy or $xsqluz){
				$modul='Akses Modul Custom';
				$action='Update';
				$hid=$_GET[usrid];
				include("../../gen-lib/xhis.php");
				echo 'Succeeded : Menu user telah diupdate !';
			}
			else{
				echo 'Update gagal !';
			}
		}
		else echo 'Silahkan lengkapi form,...!!!';
	}
	else{
		echo"The requested URL was not found on this server.";
	}
?>