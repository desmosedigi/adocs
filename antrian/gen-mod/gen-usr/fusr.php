<?PHP
	session_start();
	include("../../gen-lib/xcfg.php");
?>

<?PHP
	function form_error(){
		echo"<h1>Not Found</h1> 
		<p>The requested URL was not found on this server.</p>";
	} 
	if (!empty($_GET['usrid'])){
		$sql="SELECT 
			gu.User_ID,gu.NIK,gu.Name,gu.Email,gu.Occupation_ID,gu.Panel_Type,gu.Data_Active,gu.Data_Create,gu.User_Create
			FROM Gen_Users gu
			WHERE gu.User_ID='$_GET[usrid]'";
		//echo"$sql";
		$xsql=mysqli_query($connect,$sql);
		$arsql=mysqli_fetch_array($xsql);
	}
	if ($_GET['page']=="edtusr"){
		$action="gen-mod/gen-usr/xusr.php?act=edtusr&usrid=".$_GET['usrid']."";
	}
	else{
		$action="gen-mod/gen-usr/xusr.php?act=addusr";
	}
	echo"<div class='div-frm1' id='leftcolumn_top'>
		<form name='fuser' action='$action' method='post' 
			onsubmit=\"return submitForm(this, 'gen-mod/gen-usr/tusr.php?".$hal."', 'centercolumn');\">";
?>
			<table width='100%' class='tbl-frm1' >
				<td colspan='7' class="tbl-title1"><u>DATA USER</u><br /></td>
				<tr>
					<td width='10%'>No Induk</td>
					<td width='1%'>:</td>
					<td width='39%'>
						<input type='text' name='txtNIK' id='txtNIK' class="input-txt-1"
							onKeyUp="this.value = String(this.value).toUpperCase()" 
							value='<?PHP echo $arsql['NIK']; ?>' tabindex="1" required autofocus >
					</td>
					
					<td>&nbsp;&nbsp;</td>
					
					<td width='10%'>Level Sistem</td>
					<td width='1%'>:</td>
					<td width='39%'>
						<select name='cmbLevelID' id='cmbLevelID' class='input-cmb-1' tabindex="4" />
							<option value="0">&nbsp;</option>
							   <?PHP
								   $query = mysqli_query($connect,"SELECT go.Occupation_ID,go.Code,go.Label 
										FROM Gen_Occupation go WHERE go.Data_Active='Yes' ORDER BY go.Label ASC");
								   if($query && mysqli_num_rows($query) > 0){
									  while($row = mysqli_fetch_array($query, MYSQLI_BOTH)){
										 $Label=ucwords(strtolower($row[Label]));
										 echo '<option value="'.$row[Occupation_ID].'"';
										 if($row[Occupation_ID] == $arsql[Occupation_ID]) echo ' selected';
										 echo '>'.$Label.'</option>';
									  }
								   }
							   ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>
						<input name='txtNickName' class='input-txt-1' type='text' value='<?PHP echo"$arsql[Name]"; ?>' tabindex="2" />
					</td>
					
					<td>&nbsp;&nbsp;</td>
					
					<td>Tipe Menu</td>
					<td>:</td>
					<td>
						<select name='cmbMenuType' class='input-cmb-1' tabindex="5" />
							<option></option>
							<option value='DEF' <?PHP if ($arsql['Panel_Type']=='DEF'){ echo'selected'; } ?> >Default</option>
							<option value='CUS' <?PHP if ($arsql['Panel_Type']=='CUS'){ echo'selected'; } ?> >Custom</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Email </td>
					<td>:</td>
					<td>
						<input name='txtEmail' class='input-txt-1' type='email' value='<?PHP echo"$arsql[Email]"; ?>' tabindex="3" />							
					</td>
					
					<td>&nbsp;&nbsp;</td>
					
					<td>Data Aktif</td>
					<td>:</td>
					<td>
						<?PHP
							if ($arsql['Data_Active']=="Yes"){ $active="checked"; }
							else { $active=""; }
						?>
						<input type='checkbox' name='chkActive' class='input-chk-1' value="Yes" <?PHP echo"$active"; ?> tabindex="6" >					
					</td>
				</tr>
			</table>
			<div class='div-submit1'>
				<?PHP
					echo"<input type='submit' value='Simpan' class='but-frm1' tabindex='7' />
					<input type='button' value='Memulai' class='but-frm1' tabindex='8'
						onclick=\"javascript:ajaxcenter('gen-mod/gen-usr/tusr.php', 'centercolumn');\">
					<input type='button' value='Tutup' class='but-frm1' tabindex='9'
						onclick=\"javascript:ajaxcenter('home.php', 'centercolumn');\">";
				?>
			</div>
		</form>
	</div>
</body>
