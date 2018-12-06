<?PHP require_once('../../gen-lib/xses.php'); ?>
<?PHP
	include("../../gen-lib/xcfg.php");
	$sqldt=mysql_query("SELECT NOW() AS tanggal");
	$xsqldt=mysql_fetch_row($sqldt);
	$now=$xsqldt[0];
	if ($_GET[act]=="addins") {				
		$count = 0;
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$folder_name="$txtPath";
			mkdir('upload/'.$folder_name);
			foreach ($_FILES['files']['name'] as $i => $name) {
				$sqlc="SELECT gn.Navigate_ID FROM gen_navigate gn WHERE Modul_URL='$folder_name/$name'";
				$xsqlc=mysql_query($sqlc);
				$nsqlc=mysql_num_rows($xsqlc);
				if ($nsqlc < 1){
					if (strlen($_FILES['files']['name'][$i]) > 1) {           
						if (move_uploaded_file($_FILES['files']['tmp_name'][$i], 'gen-mod/'.$folder_name.'/'.$name)) {
							$count++;
						}
						else{
							die('Installasi Gagal');
						}
					}
					if ($count > 0) {
						echo "<p class='msg'>{$count} files uploaded</p>\n\n";
					}
				}
				else{
					echo"Path sudah terisi !";
				}
			}
		}
	}
?>