<?php

include 'menu.php';
ob_start();

?>

<script>
    <?php
date_default_timezone_set('asia/kolkata');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo '';
} else {
    echo '';
}
?>
    function dynamic_loc(a,b,i)
        {
            var mapOptions = {
                center: new google.maps.LatLng(a, b),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"+i), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                //document.getElementById("la").value=e.latLng.lat();
                //document.getElementById("lo").value=e.latLng.lng();
            });
        }
</script>
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Check Near By Service Station</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
			<div class="container">
				
<div class="col-lg-6">
    
    <h3 style="font-style: italic;color: lightskyblue;text-align: center">Search By Your Current Location</h3>
    <br/>
 <table  class="table  table-responsive  table-striped table-bordered ">
        
                            
        
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=myMap"></script>

    <script type="text/javascript">
        window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(8.493865786553638, 76.94784119725227),
                zoom: 20,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                document.getElementById("la").value=e.latLng.lat();
                document.getElementById("lo").value=e.latLng.lng();
            });
        }        
    </script>     
        <?php
                    
                            
                           if(isset($_GET['send']))
                                
                            {
                          
    
   $date=date('Y-m-d');
    $t=date("h:m:a"); 
                          
    $la=substr($_POST['la'],0,7);
    $lo=substr($_POST['lo'],0,7);
    $sel=mysql_query("SELECT name,lat,lon,address,contact,username, SQRT( POW(69.1 * (lat - $la), 2) + POW(69.1 * ($lo - lon) * COS(lat / 57.3), 2)) AS distance FROM reg where brand='$_POST[t1]' HAVING distance < 60 ORDER BY distance");
    $i=0;
    if(mysql_affected_rows()>0)
{
   

    while($r=mysql_fetch_row($sel))
    {
         
        
        mysql_query("insert into help (lat,lon,brand,date,time,shop_id,st)values('$la','$lo','$_POST[t1]','$date','$t','$r[5]','0')");
        
        
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
  


        <tr>
            <td>Latitude</td>
            <td><input type="text" name="la" id="la" maxlength="7" class="form-control" /></td>
        </tr>
        <tr>
            <td>Longitude</td>
            <td><input type="text" name="lo" id="lo" maxlength="7" class="form-control"/></td>
        </tr>
        <tr>
            <td>Brand</td>
            <td><input type="text" name="t1" class="form-control"/></td>
        </tr>
        <tr>
            <td colspan="2"align="center"><input type="submit" name="sub" value="Check Service Station"class="btn btn-primary" /></td>
        </tr>
        
    </table>
    
    <?php

if(isset($_POST['sub']))
{
   $date=date('Y-m-d');
    $t=date("h:m:a"); 
                          
    $la=substr($_POST['la'],0,7);
    $lo=substr($_POST['lo'],0,7);
    $sel=mysql_query("SELECT name,lat,lon,address,contact,username,id, SQRT( POW(69.1 * (lat - $la), 2) + POW(69.1 * ($lo - lon) * COS(lat / 57.3), 2)) AS distance FROM reg where brand='$_POST[t1]' HAVING distance < 60 ORDER BY distance");
    $i=0;
    if(mysql_affected_rows()>0)
{
   

    while($r=mysql_fetch_row($sel))
    {
         
        
        
        echo "<div onclick='dynamic_loc($r[1],$r[2],$i)'><h3>$r[0]</h3> <br/>$r[3]<br/>$r[4] </div>";
        
        
        ?>
    <a href="service_check2.php?send=<?php echo $r[5] ?>"class="btn btn-sucess">Send Help</a>
     
     <div id="dvMap<?php echo $i; ?>" style="width: 150px; height: 150px;"></div>
<?php
$i++;
    }
    }
    
    else
{
 header("location:service_none.php");   
}
    
}

?>
    
			</div>
                            
                <div class="col-lg-6">
                    <div id="dvMap" style="width: 500px; height: 500px"></div>
                </div>
			<!-- //container-wrap -->
	</div>
	<!-- //typography -->

		<?php

include 'footer.php';

?>