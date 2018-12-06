<?PHP
	require_once('../../gen-lib/xses.php');
	include("../../gen-lib/xcfg.php");
?>

<?PHP
	function form_error(){
		echo"<h1>Not Found</h1> 
		<p>The requested URL was not found on this server.</p>";
	} 
	function form_user($action,$label,$button){
		if (!empty($_SESSION[oidisys])){
			$sql="SELECT gup.Personal_ID,RTRIM(gu.NIK) AS NIK,gup.Full_Name,gup.Place_Of_Birth,gup.Address,gup.City,gup.Zip_Code,gup.Other_Email,gup.Phone_Area,gup.Phone,
				gup.Mobile_Phone,gup.Social_Media,gup.Emergency_Contact,gup.Emergency_Phone,gup.Account_No,gup.Bank_Name,gup.Picture_URL,
				DAY(Date_Of_Birth) AS DayOfBirth, MONTH(Date_Of_Birth) AS MonthOfBirth, YEAR(Date_Of_Birth) AS YearOfBirth, 
				DAY(Date_Of_Join) AS DayOfJoin,MONTH(Date_Of_Join) AS MonthOfJoin,YEAR(Date_Of_Join) AS YearOfJoin,
				goc.Abbreviation
				FROM Gen_User_Personal gup
				LEFT JOIN Gen_Users gu ON gup.User_ID=gu.User_ID
				LEFT JOIN Gen_Occupation goc ON gu.Occupation_ID=goc.Occupation_ID
				WHERE gup.User_ID='$_SESSION[oidisys]'";
			//echo"$sql";
			$xsql=mysql_query($sql);
			$arsql=mysql_fetch_array($xsql);
		}
		$sql_usr="SELECT gu.NIK,gu.Name FROM Gen_Users gu WHERE gu.User_ID='$_SESSION[oidisys]'";
		$xsql_usr=mysql_query($sql_usr);
		$arsql_usr=mysql_fetch_array($xsql_usr);

		echo"<div class='div-frm1' id='leftcolumn_top'>
			<form name='fuser' action='$action&prfid=$arsql[Personal_ID]' method='post' enctype='multipart/form-data'  
				onsubmit=\"return submitForm(this, 'gen-mod/gen-usr/fprf.php', 'centercolumn');\">";
?>
				<table width='75%' class='tbl-frm1' >
					<td colspan='8' class="tbl-title1"><u>PROFIL AUDITOR</u><br /></td>
					<tr>
						<td width='15%'>NIK/Jabatan</td>
						<td width='1%'>:</td>
						<td width='25%'>
                        	<?PHP
								if (!empty($arsql[Abbreviation])){
									$Jabatan="/". $arsql[Abbreviation];
								}
								else{
									$Jabatan="";
								}
							?>
							<input type='text' name='txtNIK' id='txtNIK' 
								onKeyUp="this.value = String(this.value).toUpperCase()" 
								value='<?PHP echo"$arsql_usr[NIK] $Jabatan"; ?>' style="width:84%;" disabled >
						</td>
						
						<td width="1%">&nbsp;&nbsp;</td>
						
						<td width="15%">Telepon</td>
						<td width="1%">:</td>
						<td width="25%">
							<input name='txtPhoneArea' type='text' value='<?PHP echo"$arsql[Phone_Area]"; ?>' style="width:20%;" tabindex="12" />&nbsp;
							<input name='txtPhone' type='text' value='<?PHP echo"$arsql[Phone]"; ?>' style="width:60%;" tabindex="13" />
						</td>
						
						<td rowspan="9" valign="top">
							<?PHP
								if (!empty($arsql[Picture_URL])){
									echo"<img src='$arsql[Picture_URL]' width='128px' height='170px' style='border:1px #666 solid;' />";
								}
								else{
									echo"<img src='gen-ico/placeholder-pic.png' width='85px' height='113px' />";
								}
							?>
						</td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td>
							<input name='txtFullName' type='text' value='<?PHP echo"$arsql[Full_Name]"; ?>' style="width:84%;" tabindex="1" required />
						</td>
						
						<td>&nbsp;&nbsp;</td>
						
						<td>No Handphone</td>
						<td>:</td>
						<td> 
							<input name='txtMobilePhone' type='text' value='<?PHP echo"$arsql[Mobile_Phone]"; ?>' style="width:84%;" tabindex="14" />
						</td>
					</tr>
					<tr>
						<td>Tanggal Bergabung</td>
						<td>:</td>
						<td>
							<select name="cmbDayOfJoin" id="cmbDayOfJoin" tabindex="2" />
								<?PHP
								echo"<option value='00'></option>";
								for($day=1; $day<=31; $day++){
								$tgl=$arsql[DayOfJoin];
								echo "<option value='$day'"; if ($tgl==$day){ echo"selected"; } echo">$day</option>";}
								?>
							</select>
							<select name="cmbMonthOfJoin" id="cmbMonthOfJoin" tabindex="3" />
								<?PHP
								//array yang digunakan pada ComboBox bulan
								$month=array(1=>"January","February","March","April","May",
								"June","July","August","September","October",
								"November","December");
								echo"<option value='00'></option>";
								for($bulan=1; $bulan<=12; $bulan++){
								$bln=$arsql[MonthOfJoin];
								echo "<option value='$bulan'"; if ($bln==$bulan){ echo"selected"; } echo">$month[$bulan]</option>";}
								?>
							</select>
							<select name="cmbYearOfJoin" id="cmbYearOfJoin" tabindex="4" />
								<?PHP
								echo"<option value='0000'></option>";
								$now=date("Y");
								$alfa=$now-10;
								$omega=$now;
								for($yrs=$alfa; $yrs<=$omega; $yrs++){
								$thn=$arsql[YearOfJoin];
								echo "<option value='$yrs'"; if ($thn==$yrs){ echo"selected"; } echo">$yrs</option>";}
								?>
							</select>						
						</td>
						
						<td>&nbsp;&nbsp;</td>
						
						<td valign="top" rowspan="2">Media Sosial</td>
						<td rowspan="2" valign="top">:</td>
						<td rowspan="2" valign="top"><textarea name='txtSocialMedia' style="width:84%;" tabindex="15" ><?PHP echo"$arsql[Social_Media]"; ?></textarea></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td><input name='txtPlaceOfBirth' type='text' value='<?PHP echo"$arsql[Place_Of_Birth]"; ?>' style="width:84%;" tabindex="5" /></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>
							<select name="cmbDayOfBirth" id="cmbDayOfBirth" tabindex="6" />
								<?PHP
								echo"<option value='00'></option>";
								for($day=1; $day<=31; $day++){
								$tgl=$arsql[DayOfBirth];
								echo "<option value='$day'"; if ($tgl==$day){ echo"selected"; } echo">$day</option>";}
								?>
							</select>
							<select name="cmbMonthOfBirth" id="cmbMonthOfBirth" tabindex="7" />
								<?PHP
								//array yang digunakan pada ComboBox bulan
								$month=array(1=>"January","February","March","April","May",
								"June","July","August","September","October",
								"November","December");
								echo"<option value='00'></option>";
								for($bulan=1; $bulan<=12; $bulan++){
								$bln=$arsql[MonthOfBirth];
								echo "<option value='$bulan'"; if ($bln==$bulan){ echo"selected"; } echo">$month[$bulan]</option>";}
								?>
							</select>
							<select name="cmbYearOfBirth" id="cmbYearOfBirth" tabindex="8" />
								<?PHP
								echo"<option value='0000'></option>";
								$now=date("Y");
								$alfa=$now-50;
								$omega=$now-22;
								for($yrs=$alfa; $yrs<=$omega; $yrs++){
								$thn=$arsql[YearOfBirth];
								echo "<option value='$yrs'"; if ($thn==$yrs){ echo"selected"; } echo">$yrs</option>";}
								?>
							</select>
						</td>
						
						<td>&nbsp;</td>
						
						<td>Kontak Darurat</td>
						<td>:</td>
						<td>
							<input name='txtEmergencyContact' type='text' value='<?PHP echo"$arsql[Emergency_Contact]"; ?>' style="width:84%;" tabindex="16" />									
						</td>
					</tr>
					<tr>
						<td rowspan="2" valign="top">Alamat</td>
						<td rowspan="2" valign="top">:</td>
						<td rowspan="2" valign="top">
							<textarea name='txtAddress' style="width:84%;" tabindex="9" ><?PHP echo"$arsql[Address]"; ?></textarea>
						</td>
												
						<td>&nbsp;</td>
						
						<td>Telepon Darurat</td>
						<td>:</td>
						<td><input name='txtEmergencyPhone' type='text' value='<?PHP echo"$arsql[Emergency_Phone]"; ?>' style="width:84%;" tabindex="17" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						
						<td>No Rekening</td>
						<td>:</td>
						<td><input name='txtAccountNo' type='text' value='<?PHP echo"$arsql[Account_No]"; ?>' style="width:84%;" tabindex="18" /></td>
					</tr>
					<tr>
						<td>Kode Pos</td>
						<td>:</td>
						<td><input name='txtZipCode' type='text' value='<?PHP echo"$arsql[Zip_Code]"; ?>' style="width:84%;" tabindex="10" /></td>
												
						<td>&nbsp;</td>
						
						<td>Bank</td>
						<td>:</td>
						<td><input name='txtBankName' type='text' value='<?PHP echo"$arsql[Bank_Name]"; ?>' style="width:84%;" tabindex="19" /></td>
					</tr>
					<tr>
						<td>Email Lain</td>
						<td>:</td>
						<td><input name='txtEmail' type='text' value='<?PHP echo"$arsql[Other_Email]"; ?>' style="width:84%;" tabindex="11" /></td>
						
						<td>&nbsp;</td>
						
						<td>Upload Foto</td>
						<td>:</td>
						<td><input type="file" name="fleUpload" tabindex="20" value="Pilih File" /></td>
					</tr>
				</table>
				<div class='div-submit1'>
					<?PHP
						echo"<input type='submit' value='Simpan' class='but-frm1' tabindex='21' />
						<input type='button' value='Tutup' class='but-tbl1' tabindex='22'
							onclick=\"javascript:ajaxcenter('home.php', 'centercolumn');\">";
					?>
				</div>
			</form>
		</div>
<?PHP
	}
	switch ($_GET[page]){
		default:		
			form_user('gen-mod/gen-usr/xprf.php?','Add Master User Profile','Save');
		break;
	}
?>
</body>
