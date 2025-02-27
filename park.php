<?php

include 'menu.php';
ob_start();

?>
<?php


if(isset($_POST['sub']))
{
    $onm=$_POST['onm'];
    $lid=$_POST['lid'];
    $pas=$_POST['pas'];
    $addr=$_POST['addr'];
    $con=$_POST['con'];
    $em=$_POST['em'];
    $up=$_FILES['up']['name'];
    $nfn=$lid."".substr($up,strrpos($up,"."));
    
    $la=$_POST['la'];
    $lo=$_POST['lo'];
    $usrc=mysql_query("select * from org_data where lid='$lid'");
	if(mysql_num_rows($usrc)>0)
	{
		echo"Username already excits";
	}
	else
	{
            
    $ins=mysql_query("insert into org_data values('','$onm','$lid','$addr','$con','$em','$nfn','4','$la','$lo','0')");
    if($ins>0)
    {
        $ins1=mysql_query("insert into user_log values('','$lid','$pas','local','0')");
        if($ins1>0)
        {
            if(move_uploaded_file($_FILES['up']['tmp_name'],getcwd()."\\picture\\$nfn"))
            {
                header("location:park.php?suss=1");
            }
        }
    }
}
}

?>
    <?php
                                             
                           session_start();
if(isset($_POST['sub1']))
{
$t1=$_POST['uid1'];
    $t2=$_POST['pas1'];

$log=mysql_query("select * from user_log where uid='$t1' and pas='$t2'and st='1'");
if(mysql_num_rows($log)>0)
{
    $r=mysql_fetch_row($log);

if($r[3]=="4")
{
    $_SESSION['uid1']=$t1;
    header("location:park/home.php");
}


}
else
{
    header("location:org.php?Fail=1");
}
    

}
                                    ?>
<script type="text/javascript">
    
    
    function chkc(b2)
{
var k5=b2.length;
var ch2=/([0-9])$/;
if(ch2.test(b2)==false)
{
document.getElementById("o3").innerHTML="<font color='red'>*Only Numbers*</font>";
$("#btn").hide();
return false;
}
else if(k5!=10)
{
document.getElementById("o3").innerHTML="<font color='red'>*Please Check Your Mobile Number*</font>";
$("#btn").hide();
return false;
}
else
{
  document.getElementById("o3").innerHTML="";  
  $("#btn").show();
}
}
  
 function chkp(c)
{
var s=document.getElementById("p10").value;

if(s==c)
{
document.getElementById("p").innerHTML="<font color='Green'>*Password is Correct*</font>";
$("#btn").show();
return false;
}
else
{
document.getElementById("p").innerHTML="<font color='red'>*Verfy Password*</font>";
$("#btn").hide();
}
}





function validateemail(a)  
     {  
          //var a = document.myform.email.value;  
          var atposition = a.indexOf("@");  
          var dotposition = a.lastIndexOf(".");  
          if (atposition<1 || dotposition<atposition+2 || dotposition+2>=a.length) 
          {  
               document.getElementById("em").innerHTML="<font color='red'>*Please Check Your Email Address*</font>";
                $("#btn").hide();  
          }  
          else
{
                document.getElementById("em").innerHTML="";  
  $("#btn").show();
}
     }  
    </script>
  </head>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=myMap"></script>

    <script type="text/javascript">
        window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(8.493865786553638, 76.94784119725227),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'dblclick', function (e) {
                //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                document.getElementById("la").value=e.latLng.lat();
                document.getElementById("lo").value=e.latLng.lng();
            });
        }
    </script>
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
                            
                                    <div class="col-md-12">
                                         <?php
                                            if(isset($_GET['suss']))
                                            {
                                            
                                            ?>
                            <center>
                                            <h4 style="color: green">Registration Complete/,Please Wait for Confirmation</h4>
                            </center>
                                                <?php
                                            }
                                            ?>
                                        <br/>
                                        <div class="col-md-6">
                                            <form method="post" enctype="multipart/form-data"onsubmit="return validateemail();">
                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <tr>
                                                    <td colspan="2"><center><b>CREATE A NEW ACCOUNT HERE</b></center></td>
                                                </tr>
                                                <tr>
                                                    <td>Organization Name</td>
                                                    <td><input type="text" name="onm" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Login ID</td>
                                                    <td><input type="text" name="lid" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td><input type="password" id="p10" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Confirm Password</td>
                                                    <td><input type="password" name="pas" class="form-control" required="required"onblur="chkp(this.value)" /><span id="p"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td><textarea name="addr" class="form-control" required="required"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Number</td>
                                                    <td><input type="text" name="con" class="form-control" required="required"onkeyup="chkc(this.value)" /><span id="o3"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Email Address</td>
                                                    <td><input type="text" name="em" class="form-control" required="required"onblur="validateemail(this.value)" /><span id="em"></span></td>
                                                </tr>
                                                 <tr>
                                                    <td>Organization Logo</td>
                                                    <td><input type="file" name="up" class="form-control" required="required" /></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="2"><center><b>CHOOSE GEO LOCATION</b></center></td>
                                                </tr>
                                                <tr>
                                                    <td>Latitude</td>
                                                    <td><input type="text" name="la" id="la" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td><input type="text" name="lo" id="lo" class="form-control" required="required" /></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="2"><center><input type="submit" name="sub"id="btn" value="Register Now" class="btn btn-success" /></center></td>
                                                </tr>
                                            </table>
                                            </form>
                                        </div>
                                        <form method="post">
                                        <div class="col-md-6">
                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <tr>
                                                    <td colspan="2"><center><b>LOGIN HERE</b></center></td>
                                                </tr>
                                                 <tr>
                                                    <td>User ID</td>
                                                    <td><input type="text" name="uid1" class="form-control" required="required" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td><input type="password" name="pas1" class="form-control" required="required" /></td>
                                                </tr>                                                
                                                <tr>
                                                    <td colspan="2"><center><input type="submit" name="sub1" value="Login Here" class="btn btn-danger" /></center></td>
                                                </tr>
                                                <?php
                                                if(isset($_GET['Fail']))
                                                {
                                                
                                                ?>
                                                
                                                <tr>
                                                    <td colspan="2"align="center"><b style="color: red">Invalid Username/Password</b>
                                             </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                                
                                            </table>
                                             <div id="dvMap" style="width: 100%; height: 500px"></div>
                                        </div>
                                        </form>
                                    </div>
					
					
				
                        </div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>