 <!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <!--<img src="assets/img/user.png" class="img-thumbnail" />-->
            
                    <div class="inner-text">
                        <?PHP echo"Hi, $_SESSION[onmeisys]"; ?>
                    <br />
                        <u>Your place in : <?PHP echo"$_SESSION[ownmisys]"; ?></u>
                    </div>
                </div>
            </li>    
            <li>
                <a class="active-menu" href="index.html"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>
            <?PHP
				$Pointer="cursor:pointer";
				if ($_SESSION[otypisys]=="CUS"){
					$sql_nav="SELECT gac.Access_ID,gac.Navigate_ID,gn.Navigate,gn.Description,gn.Ico_URL,Modul_URL
						FROM gen_access_custom gac
						LEFT JOIN gen_navigate gn ON gac.Navigate_ID=gn.Navigate_ID
						WHERE gn.Data_Active='Yes' AND gac.Data_Active='Yes' AND gac.User_ID='$_SESSION[oidisys]' AND gn.Parent_ID=0 
						AND gn.Navigate_Type='NAV'
						ORDER BY gn.Index_No ASC";
					//echo"$sql_nav";
					$xsql_nav=mysqli_query($connect,$sql_nav);
					if ($xsql_nav){
						while($arsql_nav=mysqli_fetch_array($xsql_nav)){
							echo"<li>";
							if($arsql_nav[Target]=="BLK"){
								echo"<a style='$Pointer' ";
								if (!empty($arsql_nav[Modul_Url])){
									echo"onclick=\"window.location='gen-mod/$arsql_nac[Modul_URL]?mid=$arsql_nac[Navigate_ID]&".$access_btn."&hal=$hal';\" "; 
								}
									echo"target='_Blank'><i class='fa fa-desktop'></i>$arsql_nav[Navigate] <span class='fa arrow'></span></a>";
							}
							else{
								echo"<a style='$Pointer' ";
								if (!empty($arsql_nav[Modul_Url])){
									echo"onclick=\"javascript:ajaxcenter('gen-mod/$arsql_nac[Modul_URL]?mid=$arsql_nac[Navigate_ID]&".$access_btn."&hal=$hal', 'centercolumn');\" ";
								}
								echo"target='_Self'><i class='fa fa-desktop'></i>$arsql_nav[Navigate] <span class='fa arrow'></span></a>";
							}
							
							$sql_nac="SELECT gac.Access_ID,gac.Navigate_ID,gn.Navigate,gn.Description,gn.Target,
								gn.Ico_URL,gn.Ajax_Type,gn.Modul_URL
								FROM gen_access_custom gac
								LEFT JOIN gen_navigate gn ON gac.Navigate_ID=gn.Navigate_ID
								WHERE gn.Data_Active='Yes' AND gac.Data_Active='Yes' 
								AND gac.User_ID='$_SESSION[oidisys]' AND gn.Parent_ID='$arsql_nav[Navigate_ID]' 
								AND gn.Navigate_Type='NAC' ORDER BY gn.Index_No ASC";
							//echo"$sql_nac";
							$xsql_nac=mysqli_query($connect,$sql_nac);
							echo"<ul class='nav nav-second-level'>";
								if ($xsql_nac){
									while($arsql_nac=mysqli_fetch_array($xsql_nac)){
										echo"<li>";
											if($arsql_nac[Target]=="BLK"){
												echo"<a style='$Pointer' onclick=\"window.location='gen-mod/$arsql_nac[Modul_URL]?mid=$arsql_nac[Navigate_ID]&".$access_btn."&hal=$hal';\" target='_Blank'><i class='fa fa-bug '></i>$arsql_nac[Navigate]</a>";
											}
											else{
												echo"<a  style='$Pointer' onclick=\"javascript:ajaxcenter('gen-mod/$arsql_nac[Modul_URL]?mid=$arsql_nac[Navigate_ID]&".$access_btn."&hal=$hal', 'centercolumn');\" target='_Self'><i class='fa fa-bug '></i>$arsql_nac[Navigate]</a>";
											}
										echo"</li>";
									}
								}
							echo"</ul>";
							echo"</li>";	
						}
					}
				}

				else if ($_SESSION[otypisys]=="DEF"){
					$sql_nav="SELECT gac.Access_ID,gac.Navigate_ID,gn.Navigate,gn.Description,gn.Ico_URL,Modul_URL
						FROM gen_access_custom gac
						LEFT JOIN gen_navigate gn ON gac.Navigate_ID=gn.Navigate_ID
						WHERE gn.Data_Active='Yes' AND gac.Data_Active='Yes' AND gac.User_ID='$_SESSION[oidisys]' AND gn.Parent_ID=0 
						AND gn.Navigate_Type='NAV'
						ORDER BY gn.Index_No ASC";
					//echo"$sql_nav";
					$xsql_nav=mysqli_query($connect,$sql_nav);
					if ($xsql_nav){
						?>
                        <li>
                        <?PHP
						while($arsql_nav=mysqli_fetch_array($xsql_nav)){
							if($arsql_nav[Target]=="BLK"){
								echo"<a style='$Pointer' ";
								if (!empty($arsql_nav[Modul_Url])){
									echo"onclick=\"window.location='gen-mod/$arsql_nac[Modul_URL]?mid=$arsql_nac[Navigate_ID]&".$access_btn."&hal=$hal';\" "; 
								}
									echo"target='_Blank'><i class='fa fa-desktop'></i>$arsql_nav[Navigate] <span class='fa arrow'></span></a>";
							}
							else{
								echo"<a style='$Pointer' ";
								if (!empty($arsql_nav[Modul_Url])){
									echo"onclick=\"javascript:ajaxcenter('gen-mod/$arsql_nac[Modul_URL]?mid=$arsql_nac[Navigate_ID]&".$access_btn."&hal=$hal', 'centercolumn');\" ";
								}
								echo"target='_Self'><i class='fa fa-desktop'></i>$arsql_nav[Navigate] <span class='fa arrow'></span></a>";
							}
							
							$sql_nac="SELECT gac.Access_ID,gac.Navigate_ID,gn.Navigate,gn.Description,gn.Target,
								gn.Ico_URL,gn.Ajax_Type,gn.Modul_URL
								FROM gen_access_custom gac
								LEFT JOIN gen_navigate gn ON gac.Navigate_ID=gn.Navigate_ID
								WHERE gn.Data_Active='Yes' AND gac.Data_Active='Yes' 
								AND gac.User_ID='$_SESSION[oidisys]' AND gn.Parent_ID='$arsql_nav[Navigate_ID]' 
								AND gn.Navigate_Type='NAC' ORDER BY gn.Index_No ASC";
							//echo"$sql_nac";
							$xsql_nac=mysqli_query($connect,$sql_nac);
							echo"<ul class='nav nav-second-level'>";
								if ($xsql_nac){
									while($arsql_nac=mysqli_fetch_array($xsql_nac)){
										echo"<li>";
											if($arsql_nac[Target]=="BLK"){
												echo"<a style='$Pointer' onclick=\"window.location='gen-mod/$arsql_nac[Modul_URL]?mid=$arsql_nac[Navigate_ID]&".$access_btn."&hal=$hal';\" target='_Blank'><i class='fa fa-bug '></i>$arsql_nac[Navigate]</a>";
											}
											else{
												echo"<a  style='$Pointer' onclick=\"javascript:ajaxcenter('gen-mod/$arsql_nac[Modul_URL]?mid=$arsql_nac[Navigate_ID]&".$access_btn."&hal=$hal', 'centercolumn');\" target='_Self'><i class='fa fa-bug '></i>$arsql_nac[Navigate]</a>";
											}
										echo"</li>";
									}
								}
							echo"</ul>";
							
						}
						?>
                        </li>
                        <?PHP
					}
				}
			?>            
        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->