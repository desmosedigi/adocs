<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login :: Aplikasi Antrian</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div>
        <div class="row ">               
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">                           
                <div class="panel-body">
                    <form role="form" action="<?PHP echo'?act=login'; ?>" method="post">
                        <hr />
                        <h5>
                        	<?PHP		
								if ($_GET[errlog]==1){
									echo"<div class='message warning' align='center'>";
									echo"<span class='strong'>LOGIN GAGAL !!!<br/></span> Username/password anda salah.";
									echo"</div>";
								}
								else if ($_GET[errlog]==2){
									echo"<div class='message warning' align='center'>";
									echo"<span class='strong'>Koneksi ke Active Directory Gagal !!!<br/></span> Silahkan menghubungi administrator.";
									echo"</div>";
								}
								else{
									echo"Enter Details to Login";
								}
							?>                            
                        </h5>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" class="form-control" placeholder="Your Username " name="nik" />
                        </div>
						<div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" class="form-control"  placeholder="Your Password" name="password" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil-square"  ></i></span>
                            <select class="form-control" name="txtWindow">
                            	<option value="0" style="color:#999">Your Window</option>
                                <?PHP
								   include_once("../../gen-lib/xcfg.php");
								   $sql = "SELECT w.Window_ID, w.Code,w.Label FROM window w 
										WHERE w.Data_Active='Yes' ORDER BY w.Label ASC";
								   $xsql = mysqli_query($connect, $sql);
								   if($xsql && mysqli_num_rows($xsql) > 0){
									  while($row = mysqli_fetch_object($xsql)){
										 $Label=ucwords(strtolower($row->Label));
										 echo '<option value="'.$row->Window_ID.'"';
										 if($row->Window_ID == $arsql[Window_ID]) echo ' selected';
										 echo '>'.$Label.'</option>';
									  }
								   }
							   ?>                              
                            </select>
                        </div>
                        <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" /> Remember me
                                </label>
                                <span class="pull-right">
                                       <a href="index.html" >Forget password ? </a> 
                                </span>
                            </div>
                         
                         <button type="submit" class="btn btn-primary ">Login Now</button>
                        <hr />                        
                        </form>
                </div>                           
            </div>
        </div>
    </div>
</body>
</html>
