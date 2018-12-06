<?PHP
	require_once('../../gen-lib/xses.php');
	include("../../gen-lib/xcfg.php");
?>

<?PHP
	function form_view($action,$label,$button){
		if (!empty($_GET[ocuid])){
			$sql="SELECT goc.Occupation_ID,goc.Code,goc.Label AS Occupation,Goc.Data_Active
				FROM gen_occupation goc
				WHERE goc.Occupation_ID='$_GET[ocuid]'";
			//echo"$sql";
			$xsql=mysql_query($sql);
			$arsql=mysql_fetch_array($xsql);
		}

		echo"<div class='div-frm1' id='centercolumn' style='padding-top:-50px;'>";
?>
			<fieldset style="border:#666666 solid 1px; padding-top:25px; padding-bottom:10px;">
			<legend style="background-color:#666666; color:#FFFFFF; padding:5px;">&nbsp;Informasi Jabatan&nbsp;</legend>
				<table width='100%' class='tbl-frm1' >
					<tr>
						<td width='10%'>Kode</td>
						<td width='1%'>:</td>
						<td width='39%'>
							<?PHP echo"$arsql[Code]"; ?>
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
<?PHP
	}
	switch ($_GET[page]){
		default:		
			form_view('','','');
		break;
	}
?>
</body>
