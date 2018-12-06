<?PHP
session_start();
if(!isset($_SESSION[onikisys])){
include "./gen-mod/gen-log/flog.php";
exit;
}
?>