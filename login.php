<?php

include 'menu.php';
ob_start();

?>
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>LOGIN</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
			<div class="container">
				<div class="col-lg-3"></div>
<div class="col-lg-7">
    
                         
 <table  class="table  table-responsive  table-striped table-bordered ">
        <?php
                        
                           session_start();
if(isset($_POST['b1']))
{
$t1=$_POST['t1'];
    $t2=$_POST['t2'];

$log=mysql_query("select * from reg where username='$_POST[t1]' and password='$_POST[t2]'");
if(mysql_num_rows($log)>0)
{
    $r=mysql_fetch_row($log);
if($r[15]=="admin")
{
    $_SESSION['username']=$t1;
    header("location:admin_home.php");
    
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
            
            <td colspan="2" align="center"><input type="submit"value="Login"name="b1"class="btn btn-success"></td>
            
        </tr>
        
        
    </table>
    
			</div>
			<!-- //container-wrap -->
	</div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>