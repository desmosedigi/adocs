<?PHP 
session_start();
include("../../gen-lib/xcfg.php");
?>
<style type="text/css">
.parent-li{
	list-style-type: none;
	padding-left:25px;
	margin-bottom: 5px;
	background: white url(gen-ico/open.gif) no-repeat left 1px; padding-left:22px;
}
.child-li{
	list-style-type: none;
	padding-left:20px;
	margin-left:-10px;
	background: white url(gen-ico/list.gif) no-repeat left center;
}
.child-li:hover{
	color:#660000;
	font-weight:bold;
}
</style>
<?PHP
	$sql_prt="SELECT gn.Navigate_ID,gn.Navigate,gn.Description 
		FROM gen_navigate gn 
		WHERE gn.Data_Active='Yes' AND gn.Parent_ID=0 
		ORDER BY gn.Index_No ASC";
	$xsql_prt=mysqli_query($connect,$sql_prt);	
?>
<fieldset style="border:#666666 solid 1px; padding-top:13px; padding-bottom:5px;">
<legend style="background-color:#666666; color:#FFFFFF; padding:5px;">&nbsp;Menu Akses Default - <?PHP echo"$_GET[ocu]"; ?>&nbsp;</legend>
<?PHP
echo"<form name='fuser' action='gen-mod/gen-acc/xdef.php?act=setmdl&ocuid=$_GET[ocuid]&ocu=$_GET[ocu]' method='post' 
	onsubmit=\"return submitForm(this, 'gen-mod/gen-acc/tdef.php?$hal', 'centercolumn');\">";
?>
<ul>
	<?PHP
		if ($x==0){$x=0;} else{$x=$x;}
		while($arsql_prt=mysqli_fetch_array($xsql_prt)){
			$sql_val_prt="SELECT gad.Access_ID,gad.Data_Active 
				FROM gen_access_default gad 
				WHERE gad.Occupation_ID='$_GET[ocuid]' AND gad.Navigate_ID='$arsql_prt[Navigate_ID]'";
			//echo"$sql_val_prt";
			$xsql_val_prt=mysqli_query($connect,$sql_val_prt);
			$arsql_val_prt=mysqli_fetch_array($xsql_val_prt);
			$nmsql_val_prt=mysqli_num_rows($xsql_val_prt);
			if ($arsql_val_prt[Data_Active]=="Yes" ){ $cek_prt="Checked"; }
			else{ $cek_prt=""; }
			echo"<li class='parent-li' title='$arsql_prt[Description]'>
				<input type='checkbox' style='width:16px; height:16px; vertical-align:middle;' value='Yes' name='chkActiveX[$x]' $cek_prt />
				<input type='hidden' name='txtNavigateIDX[$x]' value='$arsql_prt[Navigate_ID]' />
				<input type='hidden' name='txtAccessIDX[$x]' value='$arsql_val_prt[Access_ID]' />
				$arsql_prt[Navigate]";
				echo"<ul>";
					$sql_cld="SELECT gn.Navigate_ID,gn.Navigate,gn.Description 
						FROM gen_navigate gn 
						WHERE gn.Data_Active='Yes' 
						AND gn.Parent_ID='$arsql_prt[Navigate_ID]' 
						ORDER BY gn.Index_No ASC";
					$xsql_cld=mysqli_query($connect,$sql_cld);
					if ($y==0){$y=0;} else{$y=$y;}
					while($arsql_cld=mysqli_fetch_array($xsql_cld)){
						$sql_val_cld="SELECT gad.Access_ID,gad.Data_Active FROM gen_access_default gad 
							WHERE gad.Occupation_ID='$_GET[ocuid]' AND gad.Navigate_ID='$arsql_cld[Navigate_ID]'";
						//echo"$sql_val_prt";
						$xsql_val_cld=mysqli_query($connect,$sql_val_cld);
						$arsql_val_cld=mysqli_fetch_array($xsql_val_cld);
						$nmsql_val_cld=mysqli_num_rows($xsql_val_cld);
						if ($arsql_val_cld[Data_Active]=="Yes"){ $cek_cld="Checked"; }
						else{ $cek_cld=""; }
						echo"<li class='child-li' title='$arsql_cld[Description]'>
							<input type='checkbox' style='width:16px; height:16px; vertical-align:middle;' value='Yes' name='chkActiveY[$y]' $cek_cld />
							<input type='hidden' name='txtNavigateIDY[$y]' value='$arsql_cld[Navigate_ID]' />
							<input type='hidden' name='txtAccessIDY[$y]' value='$arsql_val_cld[Access_ID]' />
							$arsql_cld[Navigate]
						</li>";
						$y++;
					}
				echo"</ul>
			</li>";
			$x++;
		}
	?>
</ul>
<div class='div-submit1' align="center" style="padding-top:10px;">
	<?PHP
		echo"<input type='submit' value='Simpan' class='but-frm1' tabbindex='7' />
		<input type='button' value='Memulai' class='but-frm1' tabbindex='8'
			onclick=\"javascript:ajaxcenter('gen-mod/gen-acc/tacc.php', 'centercolumn');\">";
	?>
</div>
<?PHP echo"</form>"; ?>
</fieldset>