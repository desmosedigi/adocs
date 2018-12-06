<?PHP
	session_start();
	include("../../gen-lib/xcfg.php");
?>
<div class="row">
	<div class="col-md-12">
            <h1 class="page-head-line">Call Number</h1>
            <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

        </div>
    </div>
    <!-- /. ROW  -->
    <?PHP if (!empty($_SESSION[owidisys])){  ?>
    <div class="col-md-3">
        <div class="panel normal-table panel-warning adjust-border-radius">
            <div class="panel-heading adjust-border">
                <h4 style="font-weight:bold;">
				<?PHP 
					echo"$_SESSION[ownmisys]";
					
					if ($_GET['act']=="add"){
						$now=date("Y-m-d h:i:sa");
						$cplus=$_GET[c]+1;
						if ($_GET[c] <= 0){
							$sql_add="INSERT INTO counter(Window_ID,Count_Number,Date_Time,Status) 
								VALUES ('$_SESSION[owidisys]','$cplus','$now','Call')";
							$xsql_add=mysqli_query($connect,$sql_add);
						}
						else{
							$sql_upd="UPDATE counter SET Count_Number='$cplus', Date_Time='$now', Status='Call' WHERE Status='Done'";
							$xsql_upd=mysqli_query($connect,$sql_upd);
							//echo"$cplus";
						}
					}
					else if ($_GET[act]=="don"){
						$now=date("Y-m-d h:i:sa");
						$sql_upd="UPDATE counter SET Status='Done' WHERE Window_ID='$_SESSION[owidisys]'";
						//echo"$sql_upd";
						$xsql_upd=mysqli_query($connect,$sql_upd);
					}
				?>
                </h4>
            </div>
            <div class="panel-body">
                <ul class="plan">
                        <?php            
                			$sql_con="SELECT * FROM counter c";
							$xsql_con=mysqli_query($connect,$sql_con);
							$arsql_con=mysqli_fetch_array($xsql_con);
							$tcounter=$arsql_con[Count_Number];
							if ($tcounter <= 0){ $tcounter = 0; }
                            $panjang=strlen($tcounter);
                            $antrian=$tcounter;
                			//echo"$panjang --> $antrian --> $tcounter";
                        ?>
                        <p>Klik pada nomor Untuk melakukan panggilan</p>
                        <div class="kontainer" style="padding-top:30px; padding-left:30px; margin-bottom:20px;">                        	
                        	<?PHP
                            echo"<a onclick=\"javascript:ajaxcenter('gen-mod/gen-win/fwin.php?act=add&c=$tcounter&winid=$_SESSION[owidisys]', 'centercolumn');\" id='konter' style='font-size:100px; cursor:pointer;' >$antrian</a>";
							?>
                        </div>
                        <!--
                        <div class="kontainer2">
                        	<input name="play" onclick="mulai();" type="button" value="Panggil" />
                        </div>
                        -->                    
                </ul>
                <hr>
                    <p style="font-size:14px">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
            </div>
            <div class="panel-footer">
                <!--<a onClick="mulai();" class="btn btn-warning btn-block btn-lg adjust-border-radius">Panggil</a>-->
                <?PHP
                	echo"<a onclick=\"javascript:ajaxcenter('gen-mod/gen-win/fwin.php?act=don&winid=$_SESSION[owidisys]', 'centercolumn');\" class='btn btn-warning btn-block btn-lg adjust-border-radius'>Submit</a>";
				?>
            </div>
        </div>
    </div>
    <?PHP } ?>
</div> 
             