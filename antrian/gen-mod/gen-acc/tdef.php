<?PHP 
	session_start(); 
	include("../../gen-lib/xcfg.php");
	include("../../gen-lib/hpge.php");

	if (!empty($_GET[usrid])){
		$UserID="AND gu.User_ID='$_GET[usrid]'";	
	}
	$sql="SELECT goc.Occupation_ID,goc.Code,goc.Label AS Occupation,RTRIM(goc.Data_Active) AS Data_Active,goc.Data_Create
		FROM gen_occupation goc
		WHERE goc.Data_Active='Yes'";
	if ($_GET[key]!=""){
		$sql="$sql AND (goc.Code LIKE '%$_GET[key]%' OR goc.Label LIKE '%$_GET[key]%')";
	}
	$sql="$sql ORDER BY goc.Code,goc.Label ASC LIMIT $from, $max_results";
	//echo"$sql";
	$xsql=mysqli_query($connect,$sql);
	if (empty($_GET[con])){
?>
<div class='div-cari1' style="width:40%;">
	<table width="100%" class="tbl-cari1" />
		<tr>
			<td>
				<input type="text" name='key' id='key' size='25' onKeyUp="cari('gen-mod/gen-acc/tdef.php',key.value)" 
				style="width:100%; color:#888;" title=" Pencarian" value=" Pencarian" onFocus="inputFocus(this)" onBlur="inputBlur(this)"/>
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
						<th>Kode</th>
						<th>Jabatan</th>
						<th>Status Aktif</th>
					</tr>
					<?PHP
						$bgcolor='#E6E6F2';
						include("../../gen-lib/cpge.php");
						$no=1;
						while($arsql=mysqli_fetch_array($xsql)){
							$bgcolor=$bgcolor;
							if ($arsql[Data_Active]=="Yes"){ $Active="Yes"; }
							else { $Active="No"; }
							echo"<tr bgcolor='$bgcolor' 
								onclick=\"javascript:ajaxcenter('gen-mod/gen-acc/tdef.php?page=viwusr&ocuid=$arsql[Occupation_ID]&ocu=$arsql[Occupation]', 'centercolumn');\">
								<td align='right'>$no.&nbsp;&nbsp;</td>
								<td>$arsql[Code]</td>
								<td>$arsql[Occupation]</td>
								<td align='center'>$arsql[Data_Active]</td>
							</tr>";
							if ($bgcolor=='#E6E6F2'){ $bgcolor='#FFF'; } else { $bgcolor='#E6E6F2'; }
							$no++;
						}
					?>
				</table>
				<div class="div-pge1">
					<?PHP
						$pagex="gen-mod/gen-acc/tdef.php?";
						if (!empty($_GET['key'])){
							$sql_pge = "SELECT COUNT(*) as Num 
								FROM gen_occupation goc
								WHERE goc.Data_Active='Yes' 
								AND (goc.Code LIKE '%$_GET[key]%' OR goc.Label LIKE '%$_GET[key]%'";
							$xsql_pge = mysqli_query($connect, $sql_pge);
							$arsql_pge =mysqli_fetch_array($xsql_pge);
							$total_produk = $arsql_pge['Num'];
						}
						else {
							$sql_pge = "SELECT COUNT(*) as Num FROM gen_occupation goc WHERE goc.Data_Active='Yes'";
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
				include("fdef.php");
			?>
		</td>
		
		<td width="32%" valign="top" style="padding-left:5px;">
			<?PHP
				//include("focu.php");
			?>
		</td>
		
	</tr>
</table>
</div>