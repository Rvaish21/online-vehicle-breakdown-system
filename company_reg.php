<?php

include 'menu.php';
ob_start();

?>

		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Company Registration</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
			<div class="container">
				
<div class="col-lg-6">
                         
 <?php
                    
                            
                            if(isset($_POST['b1']))
                                
                            {
                                $a=mysql_query("select * from reg where username='$_POST[t4]'");
	if(mysql_num_rows($a)>0)
	{
		echo"username already excits";
	}
	else
	{
                                $b=mysql_query("select max(id) from reg");
$id=mysql_result($b,0);
$id++;
$p=$_FILES['p1']['name'];
$ext=strchr($p,'.');
$pname="$id$ext";
if(move_uploaded_file($_FILES['p1']['tmp_name'],getcwd()."\\img1\\$pname"))
{
    $msg=$_POST['t2'];
$msg1=  addslashes($msg);
$msg2=  nl2br($msg1);
                          
     mysql_query("insert into reg(name,state,district,address,contact,username,password,photo,utype)values('$_POST[t1]','$_POST[stat]','$_POST[dist]','$msg2','$_POST[t3]','$_POST[t4]','$_POST[t5]','$pname','pending')");
    
    if(mysql_affected_rows()>0)
    
{
echo"Complete";
}
else 
{
echo mysql_error();       
}
}
 
                            }                  

                            }
                            
                            
    ?>                                  

                          

    <form method="post">     
                    
                   <table  class="table  table-responsive  table-striped table-bordered ">
                        <tr>
                            <td>Name</td>
                            <td><input type="text"name="t1"class="form-control"required="required"></td>
                        </tr>
                        
                        
                        <tr>
                                <td>Choose State</td>
                                <td>
                                    <select name="stat" id="stat" class="form-control" required="required" onchange="loaddistrict(this.value);loadst_hos(this.value)">
                                        <option value="">Choose One</option>
                                        <?php
                                        $sel_state=mysql_query("select * from state");
                                        while($r_state=mysql_fetch_row($sel_state))
                                        {
                                            ?>
                                        <option value="<?php echo $r_state[0] ?>"><?php echo $r_state[1] ?></option>
                                       <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                                      <script type="text/javascript">
                               function loaddistrict(x)
                               {
                                   var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                                            document.getElementById("dis").innerHTML = xmlhttp.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET", "load_districtindex.php?x=" + x, true);
                                    xmlhttp.send();
                               }
                               
                            </script>
                         <tr>
                                <td>Choose District</td>
                                <td>
                                    <span id="dis">
                                        <select name="dist" class="form-control" required="required">
                                        <option value="">Choose One</option>
                                        </select>
                                    </span>
                                </td>
                            </tr>          
                        
                         <tr>
                        <tr>
                            <td>Address</td>
                            <td><textarea name="t2"class="form-control"cols="5"rows="5"required="required"></textarea></td>
                        </tr>
                        
                        <tr>
                            <td>Contact</td>
                            <td><input type="text"name="t3"class="form-control"required="required"onkeyup="chkc(this.value)" /><span id="o3"></span></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text"name="t4"class="form-control"required="required"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password"name="t5"class="form-control"required="required"></td>
                        </tr>
                        
                        
                        <tr>
                            <td>Logo Photo</td>
                            <td><input type="file"name="p1"required="required"></td>
                        </tr>
                        
                        
                         <tr>
                            
                             <td colspan="2"align="center"><input type="submit"value="Register Company"name="b1"class="btn btn-success"></td>
                        </tr>
                    </table>
    
    </form>
			</div>
                            <div class="col-lg-6">
                            
                                <img style="width: 100%;height: 650px" src="images/comp1.jpg">
                            
                            </div>
			<!-- //container-wrap -->
	</div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>