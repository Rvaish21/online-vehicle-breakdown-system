<?php

include 'menu.php';
ob_start();

?>

		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Company Login</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
			<div class="container">
				
                            <div class="col-lg-6">
                                
                                <img style="width: 100%;height: 300px" src="images/mercedes-benz-s63-amg-cabriolet-edition-130-mercedes-benz-car-wallpaper-preview.jpg">
                            </div>
                            <div class="col-lg-6">
                                <form method="post">
                                    <br/>
                                    <br/>
                                <table  class="table  table-responsive  table-striped table-bordered ">
        <?php
                        
                           session_start();
if(isset($_POST['sub']))
{
$t1=$_POST['t1'];
    $t2=$_POST['t2'];

$log=mysql_query("select * from reg where username='$_POST[t1]' and password='$_POST[t2]'");
if(mysql_num_rows($log)>0)
{
    $r=mysql_fetch_row($log);

if($r[15]=="staff")
{
    $_SESSION['username']=$t1;
    header("location:staff_home.php");
}

if($r[15]=="company")
{
    $_SESSION['username']=$t1;
    header("location:company_home.php");
}

}
else
{
    echo"invalid username or password";
}
    

}
                                    ?>
                            
        <tr>
            <td style="font: bold">Username</td>
            <td><input type="text"name="t1"class="form-control"></td>
        </tr>
        <tr>
            <td style="font: bold">Password</td>
            <td><input type="password"name="t2"class="form-control"></td>
        </tr>
        <tr>
            
            <td colspan="2" align="center"><input type="submit"value="Login"name="sub"class="btn btn-success"></td>
            
        </tr>
        
        
    </table>
                                </form>
                            </div>
			<!-- //container-wrap -->
	</div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>