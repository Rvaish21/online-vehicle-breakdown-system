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
                zoom: 36,
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
        
  


        <tr>
            <td>Latitude</td>
            <td><input type="text" name="la" id="lat1" maxlength="7" class="form-control" /></td>
        </tr>
        <tr>
            <td>Longitude</td>
            <td><input type="text" name="lo" id="lng1" maxlength="7" class="form-control"/></td>
        </tr>
        <tr>
            <td>Brand</td>
            <td><input type="text" name="t1" class="form-control"/></td>
        </tr>
        <tr>
            <td>Mobile No:</td>
            <td><input type="text" placeholder="Enter Your Mobile Number...."name="t2" class="form-control"onkeyup="chkc(this.value)" /><span id="o3"></span></td>
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
       $br=$_POST['t1'];                   
    $la=substr($_POST['la'],0,7);
    $lo=substr($_POST['lo'],0,7);
    $sel=mysql_query("SELECT name,lat,lon,address,contact,username, SQRT( POW(69.1 * (lat - $la), 2) + POW(69.1 * ($lo - lon) * COS(lat / 57.3), 2)) AS distance FROM reg where brand like '$br%' HAVING distance < 60 ORDER BY distance");
    $i=0;
    if(mysql_affected_rows()>0)
{
   

    while($r=mysql_fetch_row($sel))
    {
         
        
        mysql_query("insert into help (lat,lon,brand,date,time,shop_id,st,ph)values('$la','$lo','$_POST[t1]','$date','$t','$r[5]','0','$_POST[t2]')");
        
        
        echo "<div onclick='dynamic_loc($r[1],$r[2],$i)'><h3>$r[0]</h3> <br/>$r[3]<br/>$r[4]</div>";
        
        ?>
     
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
                   <div id="map_x">
                        <div class="label label-danger" style="cursor: pointer;" onclick="shomap(); initialiseMap(); initialise()"><span class="glyphicon glyphicon-map-marker"></span> UPDATE MY LOCATION</div>
                        <div id="abcmap" style="display: none;">
                       
    <body><div class="row">
                      
                    <div class="box-body">
                <center>
                    <div class="button button2" id="map_canvas" style="width:600px; height:350px ;"></div>
                    <div id="current">Initializing...</div>
                    
                </center>
                        <script  src="https://code.jquery.com/jquery-3.2.1.js"  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

                <script src="js/geoPosition.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/geoPositionSimulator.js" type="text/javascript" charset="utf-8"></script>
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=myMap"></script>


		<script>
                    function shomap()
                {
                    
                    $("#abcmap").show(1000);
                }
		function initialiseMap()
		{
                     var myOptions = {
			      zoom: 4,
			      mapTypeControl: true,
			      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
			      navigationControl: true,
			      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
			      mapTypeId: google.maps.MapTypeId.ROADMAP      
			    }	
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		}
		function initialise()
		{
			var locations=new Array({ coords: {
										latitude: 	30.2847664,
										longitude: -97.7264275
									} 
								});
			geoPositionSimulator.init(locations);
			if(geoPosition.init())
			{
				document.getElementById('current').innerHTML="Click on the map to Update your Location";
				geoPosition.getCurrentPosition(showPosition,function(){document.getElementById('current').innerHTML="Couldn't get location"},{enableHighAccuracy:true});
			}
			else
			{
				document.getElementById('current').innerHTML="Functionality not available";
			}
		}
		function showPosition(p)
		{
			var latitude = parseFloat( p.coords.latitude );
			var longitude = parseFloat( p.coords.longitude );
                        //var latitude = 8.4938174;
			//var longitude = 76.9480406;
			//document.getElementById('current').innerHTML="latitude=" + latitude + " longitude=" + longitude;
			var pos=new google.maps.LatLng( latitude , longitude);
			map.setCenter(pos);
			map.setZoom(14);

			var infowindow = new google.maps.InfoWindow({
			    content: "<strong>yes</strong>"
			});

			var marker = new google.maps.Marker({
			    position: pos,
			    map: map,
			    title:"You are here"
			});

			google.maps.event.addListener(marker, 'click', function() {
			  infowindow.open(map,marker);
			});
			google.maps.event.addListener(map, 'click', function (e) {
                        //var x=confirm("Latitude: " + e.latLng.lat() + "\rLongitude: " + e.latLng.lng()+"\nCorrect?");
                        document.getElementById("lat1").value=e.latLng.lat();
                        document.getElementById("lng1").value=e.latLng.lng();
                        
            });
		}
		</script>
                
                      <div class="chart-responsive">
                       
                        
                      </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      
                    </div><!-- /.col -->
                  </div><!-- /.row --></body>
                  <div id="frmdata">
                    
                  </div>
                    </div>
                    </div>
                </div>
			<!-- //container-wrap -->
	</div>
	<!-- //typography -->

		