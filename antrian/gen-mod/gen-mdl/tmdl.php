<?PHP 
session_start();
include("../../gen-lib/xcfg.php");
include("../../gen-lib/hpge.php");
$sql="SELECT gn.Navigate_ID,gn.Parent_ID,gp.Navigate AS Parent,gn.Navigate,gn.Description,gn.Ajax_Type,gn.Data_Create,gn.Data_Active,
	CASE
		WHEN gn.Navigate_Type='NAV' THEN 'Parent'
		WHEN gn.Navigate_Type='NAC' THEN 'Child'
	END AS Navigate_Type,
	CASE
		WHEN gn.Target='BLK' THEN 'Blank'
		WHEN gn.Target='SLF' THEN 'Self'
	END AS Target
	FROM gen_navigate gn 
	LEFT JOIN gen_navigate gp ON gn.Parent_ID=gp.Navigate_ID
	WHERE gn.Navigate_ID > 0";
if (!empty($_GET['key'])){
	$sql="$sql AND (gp.Navigate LIKE '%$_GET[key]%' OR gn.Navigate LIKE '%$_GET[key]%')";
}
$sql="$sql ORDER BY gp.Navigate,gn.Navigate ASC LIMIT $from, $max_results";
//echo"$sql";
$xsql=mysqli_query($connect,$sql);
if (empty($_GET['con'])){
?>

<?PHP
	include("fmdl.php");
?>

<div class='div-cari1'>
	<table width="100%" class="tbl-cari1" />
		<tr>
			<td>
				<input type="text" name='key' id='key' size='25' onKeyUp="cari('gen-mod/gen-mdl/tmdl.php',key.value)" 
				style="width:100%; color:#888;" title=" Pencarian" value=" Pencarian" onFocus="inputFocus(this)" onBlur="inputBlur(this)"/>
			</td>
		</tr>
	</table>
	</div>
<?PHP } ?>
<br>
<div class="div-tbl1" id='pencarian' />
	<table width="100%" cellpadding='0' cellspacing='0' class="tbl1">
		<tr>
			<th width="4%">No</th>
			<th>Parent</th>
			<th>Navigate</th>
			<th>Navigate Type</th>
			<th>Ajax Type</th>
			<th>Target</th>
			<th>Install Date</th>
			<th width="10%">Data Aktif</th>
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
					onclick=\"javascript:ajaxleft_top('gen-mod/gen-mdl/fmdl.php?page=edtmdl&mdlid=$arsql[Navigate_ID]', 'leftcolumn_top');\">
					<td align='right'>$no.&nbsp;&nbsp;</td>
					<td>$arsql[Parent]</td>
					<td>$arsql[Navigate]</td>
					<td>$arsql[Navigate_Type]</td>
					<td>$arsql[Ajax_Type]</td>
					<td>$arsql[Target]</td>
					<td>$arsql[Data_Create]</td>
					<td align='center'>$Active</td>
				</tr>";
				if ($bgcolor=='#E6E6F2'){ $bgcolor='#FFF'; } else { $bgcolor='#E6E6F2'; }
				$no++;
			}
		?>
	</table>
	<div class="div-pge1">
		<?PHP
			$pagex="gen-mod/gen-mdl/tmdl.php?";
			if (!empty($_GET['key'])) {
				$sql_pge = "SELECT COUNT(*) as Num 
					FROM gen_navigate gn 
					LEFT JOIN gen_navigate gp ON gn.Parent_ID=gp.Navigate_ID
					WHERE gp.Navigate LIKE '%$_GET[key]%' OR gn.Navigate LIKE '%$_GET[key]%'";
				$xsql_pge = mysqli_query($connect, $sql_pge);
				$arsql_pge =mysqli_fetch_array($xsql_pge);
				$total_produk = $arsql_pge['Num'];
			}
			else {
				$sql_pge = "SELECT COUNT(*) as Num 
					FROM gen_navigate gn 
					LEFT JOIN Gen_Navigate gp ON gn.Parent_ID=gp.Navigate_ID";
				$xsql_pge = mysqli_query($connect, $sql_pge);
				$arsql_pge =mysqli_fetch_array($xsql_pge);
				$total_produk = $arsql_pge['Num'];
			}
			include_once("../../gen-lib/bpge.php");	
		?>
	</div>
</div>