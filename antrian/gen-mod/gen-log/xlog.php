<?PHP
	session_start();
	if ($_GET[act]=="login") {
		$now=date("Y-m-d h:i:sa");
		$UsrName = $_POST[nik];
		$LdpPass = $_POST[password];
		$Window  = $_POST[txtWindow];
		$SysPass = md5($_POST[password]);
		
		$sql_win="SELECT w.Code,w.Label,w.Window_Number FROM Window w WHERE w.Window_ID='$_POST[txtWindow]'";
		$xsql_win=mysqli_query($connect,$sql_win);
		$arsql_win=mysqli_fetch_array($xsql_win);
		
		$sql="SELECT gu.User_ID,gu.NIK,gu.Name,gu.Email,gu.Panel_Type,
			gu.Occupation_ID,gu.Level_ID,gu.Occupation_ID,gu.Data_Active
			FROM gen_users gu
			WHERE (gu.NIK='$UsrName' OR gu.Email='$UsrName') AND gu.SysPass='$SysPass' 
			AND gu.Data_Active='Yes'";
		//echo"$sql";
		$txtsql=$sql;
		$xsql=mysqli_query($connect,$sql);
		$nmsql=mysqli_num_rows($xsql);
		$arsql=mysqli_fetch_array($xsql);
		if ($nmsql >= 1 ) {
			$oidisys=$arsql[User_ID];
			$onikisys=$arsql[NIK];
			$onmeisys=$arsql[Name];
			$oemlisys=$arsql[Email];
			$otypisys=$arsql[Panel_Type];
			$olvlisys=$arsql[Level_ID];
			$oocuisys=$arsql[Occupation_ID];
			$owidisys=$Window;
			$owinisys=$arsql_win[Window_Number];
			$ownmisys=$arsql_win[Label];
			$_SESSION['oidisys']=$oidisys;
			$_SESSION['onikisys']=$onikisys;
			$_SESSION['onmeisys']=$onmeisys;
			$_SESSION['oemlisys']=$oemlisys;
			$_SESSION['otypisys']=$otypisys;
			$_SESSION['olvlisys']=$olvlisys;
			$_SESSION['oocuisys']=$oocuisys;
			$_SESSION['owidisys']=$owidisys;
			$_SESSION['owinisys']=$owinisys;
			$_SESSION['ownmisys']=$ownmisys;
			header('location:index.php');			
		}
		else{							
			$status_log='Error';
			header('location:?&errlog=1');
		}
	}	
?>