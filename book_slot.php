<?php

include 'menu.php';
ob_start();

?>

<?php
if(isset($_POST['sub']))
{
    $la=$_POST['t6a'];
                          $lb=$_POST['t6b'];
                          $ld=$_POST['t6d'];
                           $lc=$_POST['t6c'];
    $t1=$_POST['t1'];
    $t2=$_POST['t2'];
    
    $t4=$_POST['t4'];
    $t5=$_POST['t5'];
    $mid=$_GET['mid'];
     $t=date("h:i:sa");
    $vs="select lid from org_data where id='$mid'";
                            $vs1=mysql_query($vs);
                            if(mysql_affected_rows()>0)
                           { 
                            $vs2=mysql_result($vs1,0);
   
    $ins=mysql_query("insert into park_add values('','$t1','$t2','$la-$lb-$ld-$lc','$t4','$t5','$vs2','3','$t')");
    if($ins>0)
    {
        
            
                header("location:book_slot.php?mid=$mid&suss=1");
            }
        }

}

?>

		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Parking Area</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
                        <div class="container">
                            
                            
                    <div class="row">
                        
                        
                                    <div class="col-md-12">
                                         <?php
                                            if(isset($_GET['suss']))
                                            {
                                            
                                            ?>
                            <center>
                                            <h4 style="color: green">Booking Complete-Only for 1 Hour</h4>
                            </center>
                                                <?php
                                            }
                                            ?>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <br/>
                                            <form method="post" enctype="multipart/form-data">
                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <tr>
                                                    <td colspan="2"><center><b>Add Vehicle</b></center></td>
                                                </tr>
                                                <tr>
                                                    <td>Vehicle Name</td>
                                                    <td><input type="text" name="t1" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Category</td>
                                                    <td>
                                                        <select name="t2"class="form-control">
					  <option value="-- Select Category --">-- Select Category --</option>
                                          <option>2-Wheeler</option>
                                          <option>4-Wheeler</option>
					</select>
                                                    </td>
                                                </tr>
                                                <tr>
                            <td>Vehicle's Number Plate</td>
                            <td><input type="text"name="t6a"class="form-control"equired="required"onblur="chka(this.value)" /><span id="n3"></span>--
                                <input type="text"name="t6b"class="form-control"required="required"onblur="chkb(this.value)" /><span id="m3"></span>--
                                <input type="text"name="t6d"class="form-control"required="required"onblur="chkd(this.value)" /><span id="q3"></span>--
                                <input type="text"name="t6c"class="form-control"required="required"onblur="chkc(this.value)" /><span id="o3"></span></td>
                        </tr>
                                                 <tr>
                                                    <td>Driver Name</td>
                                                    <td><input type="text" name="t4" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td><textarea class="form-control"name="t5"></textarea></td>
                                                </tr>
                                                
                                                
                                                
                                               
                                                
                                                <tr>
                                                    <td colspan="2"><center><input type="submit" name="sub" value="Add Now" class="btn btn-success" /></center></td>
                                                </tr>
                                            </table>
                                            </form>
                                            
                                        
                                        </div>
                                        
                                    </div>
					
					
				
                    </div>
		</div>
                        </div>
	<!-- //typography -->

		