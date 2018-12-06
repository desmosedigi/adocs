<?PHP require_once('../../gen-lib/xses.php'); ?>
<?PHP
	include("../../gen-lib/xcfg.php");
	$sqldt=mysql_query("SELECT NOW() AS tanggal, DATE_FORMAT(NOW(),'%Y%m%d') AS DateLabel");
	$xsqldt=mysql_fetch_row($sqldt);
	$now=$xsqldt[0];
	
	$sql_usr="SELECT Personal_ID,User_ID FROM Gen_User_Personal WHERE User_ID='$_SESSION[oidisys]'";
	//echo"$sql_usr";
	$xsql_usr=mysql_query($sql_usr);
	$nmsql_usr=mysql_num_rows($xsql_usr);
	if ($nmsql_usr < 1){
		$act="addprf";
	}
	else{
		$act="edtprf";
		$prfid=$arsql_usr[Personal_ID];
	}
	//echo"$act";
	if ($act=="addprf") {
		extract($_POST);	
		if(!empty($txtFullName)){
			$Date_Label=$xsqldt[1];
			$Folder='../../gen-pic/';
			$File_Type=$_FILES["fleUpload"]["type"];
			$Extension=end(explode(".", $_FILES["fleUpload"]["name"]));
			$Size_Tmp=$_FILES["fleUpload"]["size"];
				if ($Size_Tmp >= 1048576){	$Size = ($Size_Tmp / 1048576.2); $Unit='MB'; }
				else if ($Size_Tmp >= 1024){ $Size = ($Size_Tmp / 1024.2); $Unit='KB'; }
				else if ($Size_Tmp < 1024){	$Size = ($Size_Tmp); $Unit='B'; }
			$Size=number_format($Size,2).' '.$Unit;
			$File_Name=$txtFullName . '_' . $Date_Label . '.' . $Extension;
			$URL=$Folder . $txtFullName . '_' . $Date_Label . '.' . $Extension;
			
			if (move_uploaded_file($_FILES['fleUpload']['tmp_name'], $URL)){
				$Picture_URL='gen-pic/'.$File_Name;
			}
			$sql="INSERT INTO Gen_User_Personal(User_ID,Full_Name,Place_Of_Birth,Date_Of_Birth,Address,City,Zip_Code,Other_Email,
				Phone_Area,Phone,Mobile_Phone,Social_Media,Emergency_Contact,Emergency_Phone,Account_No,Bank_Name,
				Date_Of_Join,Picture_URL,Data_Active,Data_Create,User_Create) VALUES
				('$_SESSION[oidisys]','$txtFullName','$txtPlaceOfBirth','$cmbYearOfBirth - $cmbMonthOfBirth - $cmbDayOfBirth','$txtAddress','$txtCity','$txtZipCode','$txtEmail',
				'$txtPhoneArea','$txtPhone','$txtMobilePhone','$txtSocialMedia','$txtEmergencyContact','$txtEmergencyPhone','$txtAccountNo','$txtBankName',
				'$cmbYearOfJoin - $cmbMonthOfJoin - $cmbDayOfJoin','$Picture_URL','Yes','$now','$_SESSION[oidisys]')";
			//echo"$sql";
			if(mysql_query($sql)){
				$modul='Master User Profile';
				$action='Add';
				$hid=mysql_insert_id();
				include("../../gen-lib/xhis.php");
				echo 'Succeeded : Data telah ditambahkan';
			}
			else{
				echo 'Data gagal diinput';
			}
		}
		else echo 'Silahkan lengkapi form,...!!!';
	}
	else if ($act=="edtprf") {
		extract($_POST);
		if(!empty($txtFullName) && !empty($_GET[prfid])){
			if (!empty($_FILES[fleUpload])){
				$Date_Label=$xsqldt[1];
				$Folder='../../gen-pic/';
				$File_Type=$_FILES["fleUpload"]["type"];
				$Extension=end(explode(".", $_FILES["fleUpload"]["name"]));
				$Size_Tmp=$_FILES["fleUpload"]["size"];
					if ($Size_Tmp >= 1048576){	$Size = ($Size_Tmp / 1048576.2); $Unit='MB'; }
					else if ($Size_Tmp >= 1024){ $Size = ($Size_Tmp / 1024.2); $Unit='KB'; }
					else if ($Size_Tmp < 1024){	$Size = ($Size_Tmp); $Unit='B'; }
				$Size=number_format($Size,2).' '.$Unit;
				$File_Name=$txtFullName . '_' . $Date_Label . '.' . $Extension;
				$URL=$Folder . $txtFullName . '_' . $Date_Label . '.' . $Extension;
				
				if (move_uploaded_file($_FILES['fleUpload']['tmp_name'], $URL)){
					$Picture_URL='gen-pic/'.$File_Name;
				}
				$update_pic=",Picture_URL='$Picture_URL'";
			}
			$sql="UPDATE Gen_User_Personal SET 
				Full_Name='$txtFullName',
				Place_Of_Birth='$txtPlaceOfBirth',
				Date_Of_Birth='$cmbYearOfBirth-$cmbMonthOfBirth-cmbDayOfBirth',
				Address='$txtAddress',
				City='$txtCity',
				Zip_Code='$txtZipCode',
				Other_Email='$txtEmail',
				Phone_Area='$txtPhoneArea',
				Phone='$txtPhone',
				Mobile_Phone='$txtMobilePhone',
				Social_Media='$txtSocialMedia',
				Emergency_Contact='$txtEmergencyContact',
				Emergency_Phone='$txtEmergencyPhone',
				Account_No='$txtAccountNo',
				Bank_Name='$txtBank',
				Date_Of_Join='$cmbYearOfJoin-$cmbMonthOfJoin-$cmbDayOfJoin'
				$update_pic
				WHERE Personal_ID='$_GET[prfid]'
			";
			//echo"$sql";
			if(mysql_query($sql)) {
				$modul='Master User Personal';
				$action='Edit';
				$hid=$_GET[prfid];
				include("../../gen-lib/xhis.php");
				echo 'Succeeded : Data telah dirubah';
			}
			else {
				echo 'Data gagal dirubah';
			}
		}
		else {
			echo 'Silahkan lengkapi form,...!!!';
		}
	}
?>