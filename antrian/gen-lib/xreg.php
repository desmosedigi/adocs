<?PHP
	if ($_GET[act]=='login') {
		$txtUser=$_POST[nik];
		$txtPassword=$_POST[password];
		require_once("gen-mod/gen-log/xlog.php");
	}	
	if ($_GET[act]=='logout'){
		$UserID=$_SESSION[oidisys];
		require_once("./gen-mod/gen-log/xout.php");
	}
	if ($_GET[errlog]=='1'){
		require_once("./gen-mod/gen-log/xlog.php");
	}
?>