<?PHP session_start(); ?>
<?PHP
	include("../../gen-lib/xcfg.php");
	$now=date("Y-m-d h:i:sa");
	if ($_GET[act]=="addusr") {
		extract($_POST);	
		if(!empty($txtNIK)){
			$sql_usr="SELECT NIK FROM Gen_Users WHERE NIK='$txtNIK' AND Level_ID <> 'ROT' AND Data_Active = 'Yes'";
			//echo"$sql_usr";
			$xsql_usr=mysqli_query($connect,$sql_usr);
			$nmsql_usr=mysqli_num_rows($xsql_usr);
			if ($nmsql_usr < 1){
				$SysPass=md5($txtNIK);
				$sql="INSERT INTO Gen_Users(NIK,Name,Email,Occupation_ID,Panel_Type,SysPass,Data_Active,Data_Create,User_Create) VALUES
					('$txtNIK','$txtNickName','$txtEmail','$cmbLevelID','$cmbMenuType','$SysPass','$chkActive','$now','$_SESSION[oidisys]')";
				//echo"$sql";
				if(mysqli_query($connect,$sql)){
					$modul='Master Users';
					$action='Add';
					$hid=mysqli_insert_id();
					include("../../gen-lib/xhis.php");
					echo 'Succeeded : Data telah ditambahkan';
				}
				else{
					echo 'Data gagal diinput';
				}
			}
			else{
				echo 'Data sudah ada !!!';
			}
		}
		else echo 'Silahkan lengkapi form,...!!!';
	}
	else if ($_GET[act]=="edtusr") {
		extract($_POST);
		if(!empty($txtNIK) && !empty($_GET[usrid])){			
			$sql_usr="SELECT NIK FROM Gen_Users WHERE RTRIM(NIK)='$txtNIK' AND Data_Active='$chkActive'";
			//echo"$sql_usr";
			$xsql_usr=mysqli_query($connect,$sql_usr);
			$nmsql_usr=mysqli_num_rows($xsql_usr);
			if ($nmsql_usr < 1){
				$sql="UPDATE Gen_Users SET 
					NIK='$txtNIK',
					Name='$txtNickName',
					Email='$txtEmail',
					Occupation_ID='$cmbLevelID',
					Panel_Type='$cmbMenuType',
					Data_Active='$chkActive'
					WHERE User_ID='$_GET[usrid]'
				";
				//echo"$sql";
				if(mysqli_query($connect,$sql)) {
					$modul='Master Users';
					$action='Edit';
					$hid=$_GET[usrid];
					include("../../gen-lib/xhis.php");
					echo 'Succeeded : Data telah dirubah';
				}
				else {
					echo 'Data gagal dirubah';
				}
			}
			else{
				echo 'Data sudah ada !!!';
			}
		}
		else echo 'Silahkan lengkapi form,...!!!';
	}
?>