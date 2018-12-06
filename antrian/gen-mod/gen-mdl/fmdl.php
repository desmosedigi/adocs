<?PHP
	session_start();
	include("../../gen-lib/xcfg.php");
?>

<?PHP		
	if (!empty($_GET[mdlid])){
		$sql="SELECT gn.Parent_ID,gn.Navigate,gn.Navigate_Type,gn.Description,
			gn.Ico_URL,gn.Modul_URL,gn.Ajax_Type,gn.Target,gn.Index_No,gn.Data_Active
			FROM gen_navigate gn
			WHERE gn.Navigate_ID=$_GET[mdlid]";
		//echo"$sql";
		$xsql=mysqli_query($connect,$sql);
		$arsql=mysqli_fetch_array($xsql,MYSQLI_ASSOC);
	}
	if ($_GET['page']=="edtmdl"){
		$action="gen-mod/gen-mdl/xmdl.php?act=edtmdl&mdlid=$_GET[mdlid]&$access_btn";
	}
	else{
		$action="gen-mod/gen-mdl/xmdl.php?act=addmdl";
	}
	echo"<div class='div-frm1' id='leftcolumn_top'>
		<form name='fuser' action='$action' method='post' 
			onsubmit=\"return submitForm(this, 'gen-mod/gen-mdl/tmdl.php?$hal&$access_btn', 'centercolumn');\">";
?>
			<table width='100%' class='tbl-frm1' >
				<td colspan='7' class="tbl-title1"><u>MODUL PROGRAM</u><br /></td>
				<tr>
					<td width='14%'>Parent</td>
					<td width='1%'>:</td>
					<td width='35%'>						
                        <select name='cmbParent' id='cmbParent' class='input-cmb-1' tabindex="4" />
							<option value="0">&nbsp;</option>
							   <?PHP
								   $query = mysqli_query($connect,"SELECT gn.Navigate_ID,gn.Navigate
										FROM gen_navigate gn WHERE gn.Data_Active='Yes' AND gn.Parent_ID=0 ORDER BY gn.Index_No ASC");
								   if($query && mysqli_num_rows($query) > 0){
									  while($row = mysqli_fetch_array($query, MYSQLI_BOTH)){
										 $Label=ucwords(strtolower($row[Navigate]));
										 echo '<option value="'.$row[Navigate_ID].'"';
										 if($row[Navigate_ID] == $arsql[Parent_ID]) echo ' selected';
										 echo '>'.$Label.'</option>';
									  }
								   }
							   ?>
						</select>
					</td>
					
					<td>&nbsp;&nbsp;</td>
					
					<td width='14%'>Index No</td>
					<td width='1%'>:</td>
					<td width='35%'>
						<input type='number' name='txtIndexNo' class='input-txt-min' required value='<?PHP echo"$arsql[Index_No]"; ?>' tabindex="6" >
					</td>
				</tr>
				<tr>
					<td>Navigate</td>
					<td>:</td>
					<td>
						<input type='text' name='txtNavigate' class='input-txt-1' required value='<?PHP echo"$arsql[Navigate]"; ?>' tabindex="2" >
					</td>
					
					<td>&nbsp;&nbsp;</td>
					
					<td>Modul URL</td>
					<td>:</td>
					<td>
						<input type='text' name='txtModulUrl' class='input-txt-1' required value='<?PHP echo"$arsql[Modul_URL]"; ?>' tabindex="7" >
					</td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td>:</td>
					<td>
						<input type='text' name='txtDescription' class='input-txt-1' required value='<?PHP echo"$arsql[Description]"; ?>' tabindex="3" >
					</td>
					
					<td>&nbsp;&nbsp;</td>
					
					<td>Data Aktif</td>
					<td>:</td>
					<td>
						<?PHP
							if ($arsql[Data_Active]=="Yes"){ $active="checked"; }
							else { $active=""; }
						?>
						<input type='checkbox' name='chkActive' class='input-chk-1' value="Yes" <?PHP echo"$active"; ?> tabindex="8" >
					</td>
				</tr>
				<tr valign="top">
					<td>Ajax Type / Target</td>
					<td>:</td>
					<td>
						<select name='cmbAjaxType' class='input-cmb-1' tabindex='4' />
							<option></option>
							<option value='TOP' <?PHP if ($arsql[Ajax_Type]=='TOP'){ echo'selected'; } ?> title='Top Position'>Top</option>
							<option value='CTR' <?PHP if ($arsql[Ajax_Type]=='CTR'){ echo'selected'; } ?> title='Center Position' >Center</option>
							<option value='BTM' <?PHP if ($arsql[Ajax_Type]=='BTM'){ echo'selected'; } ?> title='Center Position' >Bottom</option>
						</select>
						&nbsp;/&nbsp;
						<select name='cmbTarget' class='input-cmb-1' tabindex='5' />
							<option></option>
							<option value='BLK' <?PHP if ($arsql[Target]=='BLK'){ echo'selected'; } ?> title='Top Position'>Blank</option>
							<option value='SLF' <?PHP if ($arsql[Target]=='SLF'){ echo'selected'; } ?> title='Center Position' >Self</option>
						</select>
					</td>
					
					<td>&nbsp;&nbsp;</td>
					
					<td>ICO URL 32 x 32 (Pixel)</td>
					<td>:</td>
					<td>
						<input type="file" name="txtIcoUrl" class='input-txt-1' value="" tabindex="9" /><br />
						<img style="background:#FFF;" src="<?PHP if (!empty($arsql[Ico_URL])){ echo"gen-ico/$arsql[Ico_URL]"; } ?>" />
					</td>
				</tr>
			</table>
			
			<div class='div-submit1'>
				<?PHP
					echo"<input type='submit' value='Simpan' class='but-frm1' tabindex='12' />
					<input type='button' value='Memulai' class='but-frm1' tabindex='13'
						onclick=\"javascript:ajaxcenter('gen-mod/gen-mdl/tmdl.php', 'centercolumn');\">
					<input type='button' value='Tutup' class='but-frm1' tabindex='14'
						onclick=\"javascript:ajaxcenter('home.php', 'centercolumn');\">";
				?>
			</div>
		</form>
		</div>
</body>
