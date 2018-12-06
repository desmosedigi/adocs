<?PHP 
session_start();
include("../../gen-lib/xcfg.php");
include("../../gen-lib/hpge.php");
?>
<?PHP
	if (!empty($_GET[usrid])){
		$UserID="AND gu.User_ID='$_GET[usrid]'";	
	}
	$sql="SELECT gu.User_ID,RTRIM(gu.NIK) AS NIK,gu.Name,gu.Email,
		gu.Panel_Type,gu.Level_ID,RTRIM(gu.Data_Active) AS Data_Active,gu.Data_Create,go.Label AS Occupation
		FROM gen_users gu
		LEFT JOIN gen_occupation go ON gu.Occupation_ID=go.Occupation_ID
		WHERE gu.Panel_Type='CUS'";
	if ($_GET[key]!=""){
		$sql="$sql AND (gu.NIK LIKE '%$_GET[key]%' OR gu.Name LIKE '%$_GET[key]%' 
			OR gu.Email LIKE '%$_GET[key]%' OR go.Label LIKE '%$_GET[key]%')";
	}
	$sql="$sql ORDER BY gu.NIK,gu.Name ASC LIMIT $from, $max_results";
	//echo"$sql";
	$xsql=mysqli_query($connect,$sql);
	if (empty($_GET[con])){
?>
<div class='div-cari1' style="width:40%;">
	<table width="100%" class="tbl-cari1" />
		<tr>
			<td>
				<input type="text" name='key' id='key' size='25' onkeyup="cari('gen-mod/gen-acc/tcus.php',key.value)" 
				style="width:100%; color:#888;" title=" Pencarian" value=" Pencarian" onfocus="inputFocus(this)" onblur="inputBlur(this)"/>
			</td>
		</tr>
	</table>
</div>
<?PHP } ?>
<div class="div-tbl1" id='pencarian' />
<table width='100%' >
	<tr>
		<td width="40%" valign="top">		
				<br />
				<table width="100%" cellpadding='0' cellspacing='0' class="tbl1">
					<tr>
						<th width='5%;'>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Active</th>
					</tr>
					<?PHP
						$bgcolor='#E6E6F2';
						include("../../gen-lib/cpge.php");
						$no=1;
						while($arsql=mysqli_fetch_array($xsql)){
							$bgcolor=$bgcolor;
							if ($arsql[Data_Active]=="Yes"){ $Active="Yes"; }
							else { $Active="No"; }
							if ($arsql[Level_ID]=="ADM"){ $LevelID="Administrator"; }
							else if ($arsql[Level_ID]=="SPU"){ $LevelID="Super User"; }
							else if ($arsql[Level_ID]=="USR"){ $LevelID="User"; }
							else { $LevelID="Guest"; }
							if ($arsql[Menu_ID]=="CUS"){ $Menu="Custom"; }
							else if ($arsql[Menu_ID]=="DEF"){ $Menu="Default"; }
							echo"<tr bgcolor='$bgcolor' 
								onclick=\"javascript:ajaxcenter('gen-mod/gen-acc/tcus.php?page=viwusr&usrid=$arsql[User_ID]', 'centercolumn');\">
								<td align='right'>$no.&nbsp;&nbsp;</td>
								<td>$arsql[NIK]</td>
								<td>$arsql[Name]</td>
								<td>$arsql[Occupation]</td>
								<td align='center'>$Active</td>
							</tr>";
							if ($bgcolor=='#E6E6F2'){ $bgcolor='#FFF'; } else { $bgcolor='#E6E6F2'; }
							$no++;
						}
					?>
				</table>
				<div class="div-pge1">
					<?PHP
						$pagex="gen-mod/gen-acc/tcus.php?";
						if (!empty($_GET['key'])){
							$sql_pge = "SELECT COUNT(*) as Num 
								FROM gen_users gu
								LEFT JOIN gen_occupation go ON gu.Occupation_ID=go.Occupation_ID
								WHERE gu.Panel_Type='CUS' AND 
								(gu.NIK LIKE '%$_GET[key]%' OR gu.Name LIKE '%$_GET[key]%' 
								OR gu.Email LIKE '%$_GET[key]%' OR go.Label LIKE '%$_GET[key]%'";
							$xsql_pge = mysqli_query($connect, $sql_pge);
							$arsql_pge =mysqli_fetch_array($xsql_pge);
							$total_produk = $arsql_pge['Num'];
						}
						else {
							$sql_pge = "SELECT COUNT(*) as Num 
								FROM gen_users gu
								LEFT JOIN gen_occupation go ON gu.Occupation_ID=go.Occupation_ID
								WHERE gu.Panel_Type='CUS' ";
							$xsql_pge = mysqli_query($connect, $sql_pge);
							$arsql_pge =mysqli_fetch_array($xsql_pge);
							$total_produk = $arsql_pge['Num'];
						}							
						include("../../gen-lib/bpge.php");
					?>
				</div>
			
		</td>
		
		<td width="28%" valign="top" style="padding-left:25px;">
			<?PHP
				include("fcus.php");
			?>
		</td>
		
		<td width="32%" valign="top" style="padding-left:5px;">
			<?PHP
				include("fusr.php");
			?>
		</td>
		
	</tr>
</table>
</div>