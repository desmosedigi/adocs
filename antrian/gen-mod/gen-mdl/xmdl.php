<?PHP
	session_start();
	include("../../gen-lib/xcfg.php");
	$now=date("Y-m-d h:i:sa");
	if ($_GET[act]=="addmdl") {
		extract($_POST);	
		if(!empty($txtNavigate)){
			$sql_mdl="SELECT Navigate FROM gen_navigate WHERE Parent_ID='$cmbParent' AND Navigate='$txtNavigate'";
			$xsql_mdl=mysqli_query($connect,$sql_mdl);
			$nmsql_mdl=mysqli_num_rows($xsql_mdl);
			if ($nmsql_mdl < 1){
				if (!empty($_FILES[txtIcoUrl])){
					$Date_Label=$xsqldt[1];
					$Folder='../../gen-ico/';
					$File_Type=$_FILES["txtIcoUrl"]["type"];
					$Extension=end(explode(".", $_FILES["txtIcoUrl"]["name"]));
					$Ico_URL=$txtNavigate . '_' . $Date_Label . '.' . $Extension;
					$URL=$Folder . $txtNavigate . '_' . $Date_Label . '.' . $Extension;
					move_uploaded_file($_FILES['txtIcoUrl']['tmp_name'], $URL);
				}
				else{
					$Ico_URL="";
				}
				if ($cmbParent==0){
					$Navigate_Type="NAV";
				}
				else{
					$Navigate_Type="NAC";
				}
				$sql="INSERT INTO gen_navigate(Parent_ID,Navigate,Navigate_Type,Description,Ico_URL,Modul_URL,Ajax_Type,Target,
					Index_No,Data_Active,Data_Create,User_Create) VALUES
					('$cmbParent','$txtNavigate','$Navigate_Type','$txtDescription','$Ico_URL','$txtModulUrl','$cmbAjaxType','$cmbTarget',
					'$txtIndexNo','$chkActive','$now','$_SESSION[oidisys]')";
				//echo"$sql";
				if(mysqli_query($connect,$sql)){
					$modul='Master Modul';
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
	else if ($_GET[act]=="edtmdl") {
		extract($_POST);
		if(!empty($txtNavigate) && !empty($_GET[mdlid])){			
			$sql_mdl="SELECT Navigate FROM gen_navigate WHERE Parent_ID='$cmbParent' AND Navigate='$txtNavigate' AND Data_Active='$chkActive'";
			$xsql_mdl=mysqli_query($connect,$sql_mdl);
			$nmsql_mdl=mysqli_num_rows($xsql_mdl);
			if ($nmsql_mdl < 1){
				if (!empty($_FILES[txtIcoUrl])){
					$Date_Label=$xsqldt[1];
					$Folder='../../gen-ico/';
					$File_Type=$_FILES["txtIcoUrl"]["type"];
					$Extension=end(explode(".", $_FILES["txtIcoUrl"]["name"]));
					$Ico_URL=$txtNavigate . '_' . $Date_Label . '.' . $Extension;
					$URL=$Folder . $txtNavigate . '_' . $Date_Label . '.' . $Extension;
					move_uploaded_file($_FILES['txtIcoUrl']['tmp_name'], $URL);
					$sql_ico="Ico_URL='$Ico_URL',";
				}
				else{
					$sql_ico="";
				}
				if ($cmbParent==0){
					$Navigate_Type="NAV";
				}
				else{
					$Navigate_Type="NAC";
				}
				$sql="UPDATE gen_navigate SET 
					Parent_ID='$cmbParent',
					Navigate='$txtNavigate',
					Navigate_Type='$Navigate_Type',
					Description='$txtDescription',
					$sql_ico
					Modul_URL='$txtModulUrl',
					Ajax_type='$cmbAjaxType',
					Target='$cmbTarget',
					Index_no='$txtIndexNo',
					Data_Active='$chkActive'
					WHERE Navigate_ID='$_GET[mdlid]'
				";
				//echo"$sql";
				if(mysqli_query($connect,$sql)) {
					$modul='Master Modul';
					$action='Edit';
					$hid=$_GET[mdlid];
					include("../../gen-lib/xhis.php");
					echo 'Succeeded : Data telah diupdate';
				}
				else {
					echo 'Data gagal diupdate';
				}
			}
			else{
				echo 'Data sudah ada !!!';
			}
		}
		else echo 'Silahkan lengkapi form,...!!!';
	}
?>