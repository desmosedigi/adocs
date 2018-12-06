<?PHP 
session_start();
include("../../gen-lib/xcfg.php");
include("../../gen-lib/hpge.php");
$sql="SELECT gu.User_ID,RTRIM(gu.NIK) AS NIK,gu.Name,gu.Email,gu.Level_ID,gu.Panel_Type,gu.Data_Active,gu.Data_Create
	FROM Gen_Users gu
	WHERE gu.Level_ID <> 'ROT'";
if (!empty($_GET['key'])){
	$sql="$sql AND (gu.NIK LIKE '%$_GET[key]%' OR gu.Name LIKE '%$_GET[key]%' OR gu.Email LIKE '%$_GET[key]%')";
}
$sql="$sql ORDER BY gu.NIK,gu.Name ASC LIMIT $from, $max_results";
//echo"$sql";
$xsql=mysqli_query($connect,$sql);
if (empty($_GET['con'])){
?>

<?PHP
	include("fusr.php");
?>

<div class='div-cari1'>
	<table width="100%" class="tbl-cari1" />
		<tr>
			<td>
				<input type="text" name='key' id='key' size='25' onkeyup="cari('gen-mod/gen-usr/tusr.php',key.value)" 
				style="width:100%; color:#888;" title=" Pencarian" value=" Pencarian" onfocus="inputFocus(this)" onblur="inputBlur(this)"/>
			</td>
		</tr>
	</table>
	</div>
<?PHP } ?>
<br>
<div class="div-tbl1" id='pencarian' />
	<table width="100%" cellpadding='0' cellspacing='0' class="tbl1">
		<tr>
			<th width='5%;'>No</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Level</th>
			<th>Menu</th>
			<th>Aktif</th>
		</tr>
		<?PHP
			$bgcolor='#E6E6F2';
			include("../../gen-lib/cpge.php");
			$no=1;
			while($arsql=mysqli_fetch_array($xsql)){
				$bgcolor=$bgcolor;
				if ($arsql['Data_Active']=="Yes"){ $Active="Yes"; }
				else { $Active="No"; }
				if ($arsql['Level_ID']=="ADM"){ $LevelID="Administrator"; }
				else if ($arsql['Level_ID']=="SPU"){ $LevelID="Super User"; }
				else if ($arsql['Level_ID']=="USR"){ $LevelID="User"; }
				else { $LevelID="Guest"; }
				if ($arsql['Panel_Type']=="CUS"){ $Menu="Custom"; }
				else if ($arsql['Panel_Type']=="DEF"){ $Menu="Default"; }
				echo"<tr bgcolor='$bgcolor' 
					onclick=\"javascript:ajaxleft_top('gen-mod/gen-usr/fusr.php?page=edtusr&usrid=$arsql[User_ID]', 'leftcolumn_top');\">
					<td align='right'>$no.&nbsp;&nbsp;</td>
					<td>$arsql[NIK]</td>
					<td>$arsql[Name]</td>
					<td>$arsql[Email]</td>
					<td>$LevelID</td>
					<td>$Menu</td>
					<td align='center'>$Active</td>
				</tr>";
				if ($bgcolor=='#E6E6F2'){ $bgcolor='#FFF'; } else { $bgcolor='#E6E6F2'; }
				$no++;
			}
		?>
	</table>
	<div class="div-pge1">
		<?PHP
			$pagex="gen-mod/gen-usr/tusr.php?";
			if (!empty($_GET['key'])){
				$sql_pge = "SELECT COUNT(*) as Num 
					FROM Gen_Users gu
					WHERE gu.User_ID >0 
					AND gu.NIK LIKE '%$_GET[key]%' OR gu.Name LIKE '%$_GET[key]%' OR gu.Email LIKE '%$_GET[key]%'";
				$xsql_pge = mysqli_query($connect, $sql_pge);
				$arsql_pge =mysqli_fetch_array($xsql_pge);
				$total_produk = $arsql_pge['Num'];
			}
			else {
				$sql_pge = "SELECT COUNT(*) as Num FROM Gen_Users gu";
				$xsql_pge = mysqli_query($connect, $sql_pge);
				$arsql_pge =mysqli_fetch_array($xsql_pge);
				$total_produk = $arsql_pge['Num'];
			}		
			include_once("../../gen-lib/bpge.php");
		?>
	</div>
</div>