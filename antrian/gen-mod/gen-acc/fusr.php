<?PHP
	session_start();
	include("../../gen-lib/xcfg.php");
?>

<?PHP
if (!empty($_GET['usrid'])){
	$sql="SELECT gu.User_ID,gu.NIK,gu.Name,gu.Email,gu.Level_ID,gu.Panel_Type,gu.Data_Active,
		gu.Data_Create,gu.User_Create,go.Label AS Occupation
		FROM gen_users gu
		LEFT JOIN gen_occupation go ON gu.Occupation_ID=go.Occupation_ID
		WHERE gu.User_ID=".$_GET['usrid']."";
	//echo"$sql";
	$xsql=mysqli_query($connect,$sql);
	$arsql=mysqli_fetch_array($xsql);
}

echo"<div class='div-frm1' id='centercolumn' style='padding-top:-50px;'>";
?>
	<fieldset style="border:#666666 solid 1px; padding-top:25px; padding-bottom:10px;">
	<legend style="background-color:#666666; color:#FFFFFF; padding:5px;">&nbsp;Informasi User&nbsp;</legend>
		<table width='100%' class='tbl-frm1' >
			<tr>
				<td width='10%'>NIK</td>
				<td width='1%'>:</td>
				<td width='39%'>
					<?PHP echo"$arsql[NIK]"; ?>
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td>
					<?PHP echo"$arsql[Name]"; ?>
				</td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td>
					<?PHP echo"$arsql[Occupation]"; ?>
				</td>
			</tr>
			<tr>
				<td>Email </td>
				<td>:</td>
				<td>
					<?PHP echo"$arsql[Email]"; ?>							
				</td>
			</tr>
			<tr>
				<td width='10%'>Level Sistem</td>
				<td width='1%'>:</td>
				<td width='39%'>
					<?PHP
						if ($arsql[Level_ID]=='ADM'){ $SystemLevel="Administrator"; }
						else if ($arsql[Level_ID]=='SPU'){ $SystemLevel="Super User"; }
						else if ($arsql[Level_ID]=='USR'){ $SystemLevel="User"; }
						else if ($arsql[Level_ID]=='GST'){ $SystemLevel="Guest"; }
						echo"$SystemLevel";
					?>
				</td>
			</tr>
			<tr>
				<td>Panel Type</td>
				<td>:</td>
				<td>
					<?PHP
						if ($arsql[Panel_Type]=='DEF'){ $MenuType="Default"; }
						else if ($arsql[Panel_Type]=='CUS'){ $MenuType="Custom"; }
						echo"$MenuType";
					?>
				</td>
			</tr>
			<tr>
				<td>Activated</td>
				<td>:</td>
				<td>
					<?PHP
						if ($arsql[Data_Active]=="Yes"){ $active="Active"; }
						else { $active="Non Active"; }
					?>
					<?PHP echo"$active"; ?>			
				</td>
			</tr>
		</table>
	</fieldset>
</div>
