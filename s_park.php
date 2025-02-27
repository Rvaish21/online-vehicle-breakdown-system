<?php

include 'menu.php';
ob_start();

?>
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Check Nearby Parking Area</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
                        <div class="container">
                            
                            
				<div class="row">
                                    <div class="col-lg-6">
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
            google.maps.event.addListener(map, 'click', function (e) {
                //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                document.getElementById("la").value=e.latLng.lat();
                document.getElementById("lo").value=e.latLng.lng();
            });
        }
   
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
                                    <h3 id="qs">QUICK SEARCH</h3>
                                    <form method="post">
                                    <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                         <tr>
                                            <td>Latitude</td>
                                            <td><input type="text" name="la" id="la" class="form-control" required="required" /></td>
                                        </tr>
                                        <tr>
                                            <td>Longitude</td>
                                            <td><input type="text" name="lo" id="lo" class="form-control" required="required" /></td>
                                        </tr>
                                        

                                        <tr>
                                            <td colspan="2"><center><input type="submit" name="sub" value="Find Now" class="btn btn-success" /></center></td>
                                        </tr>
                                    </table>
                                    </form>
                                    <br/>
                                    
                                   
                                        <?php

if(isset($_POST['sub']))
{
   $date=date('Y-m-d');
    $t=date("h:m:a"); 
                          
    $la=substr($_POST['la'],0,7);
    $lo=substr($_POST['lo'],0,7);
    $sel=mysql_query("SELECT id,onme,lat,lon,addr,con,lid, SQRT( POW(69.1 * (lat - $la), 2) + POW(69.1 * ($lo - lon) * COS(lat / 57.3), 2)) AS distance FROM org_data where ot='4' HAVING distance < 60 ORDER BY distance");
    $i=0;
    if(mysql_affected_rows()>0)
{
   

    while($r=mysql_fetch_row($sel))
    {
         
        
        
        
        echo "<div onclick='dynamic_loc($r[2],$r[3],$i)'><h3>$r[1]</h3> <br/>$r[4]<br/>$r[5]</div>";
       
        ?>
                                        <br/>
                                        <a href="home_park.php?sid=<?php echo $r[0] ?>" class="btn btn-danger">More</a>
                                        
                                        <br/>
                                        <div class="zoomin frame">
     <div  id="dvMap<?php echo $i; ?>" style="width: 550px; height: 250px;"></div>
                                        </div>
    
<?php
$i++;
    }
    }
    
 else {
        header("location:error.php");
    }
    
}

?>
                                        
                               
                                    </div>
                                    <div class="col-lg-6">
                                    <div id="dvMap" style="width: 500px; height: 500px;"></div>
                                    
                                    </div>
                                    <form method="post">
                                    <div class="col-lg-6"> </div>
                                    
                                </div>	
			</div>
                        </div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>