<?PHP
	require_once('../../gen-lib/xses.php');
	include("../../gen-lib/xcfg.php");
?>

<?PHP
	function form_error(){
		echo"<h1>Not Found</h1> 
		<p>The requested URL was not found on this server.</p>";
	} 
	function form_install($action,$label,$button){
		echo"<div class='div-frm1' id='leftcolumn_top'>
			<form name='fuser' action='$action&usrid=$_GET[usrid]' method='post' enctype='multipart/form-data'
				onsubmit=\"return submitForm(this, 'gen-mod/gen-usr/tusr.php?$hal', 'centercolumn');\">";
?>
				<table width='50%' class='tbl-frm1' >
					<td colspan='7' class="tbl-title1"><u>INSTALL MODUL</u><br /></td>
					<tr>
						<td width='10%'>Path Tujuan</td>
						<td width='1%'>:</td>
						<td width='39%'>
							 <input type="text" name="txtPath">
						</td>
					</tr>
                    <tr>
						<td width='10%'>File Installasi</td>
						<td width='1%'>:</td>
						<td width='39%'>
							 <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" mozdirectory="">
						</td>
					</tr>					
				</table>
				<div class='div-submit1'>
					<?PHP
						echo"<input type='submit' value='Install' class='but-frm1' tabindex='7' />
						<input type='button' value='Tutup' class='but-frm1' tabindex='9'
							onclick=\"javascript:ajaxcenter('home.php', 'centercolumn');\">";
					?>
				</div>
			</form>
		</div>
<?PHP
	}
	switch ($_GET[page]){
		default:		
			form_install('gen-mod/gen-ins/xins.php?act=addins','Add Modul','Save');
		break;
	}
?>