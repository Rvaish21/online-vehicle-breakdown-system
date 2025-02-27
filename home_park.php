<?php

include 'menu.php';
ob_start();

?>

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
    </script>
    <style type="text/css">
        @import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");

body {
    background-color: #FAFAFA !important;   
}

.panelD {
    margin: 20px 0px 20px 0px;
}

.panelD .panel-heading, .panelD .panel-footer {
    background-color: #fff !important;
}

.panel-image img.panel-image-preview {
    width: 100%;
	border-radius: 4px 4px 0px 0px;
}

.panel-heading ~ .panel-image img.panel-image-preview {
	border-radius: 0px;
}

.panel-heading .list-inline {
    margin: 0px 0px 0px -5px !important;
}

.panel-body {
    display: block;
}

.panel-body blockquote {
    margin: 10px 0 10px;    
}

.tagz {
    margin: 15px 0px 0px;
    display: block;    
}

.tagz a {
    cursor: pointer;
    color: rgb(100, 100, 100);
}

.panel-image ~ .panel-footer a {
	padding: 0px 10px;
	color: rgb(100, 100, 100);
}

.panel-image ~ .panel-footer span {
    color: rgb(100, 100, 100);    
}

.panel-footer .list-inline {
    margin: 0 0 0 -15px !important;
}

.panel-image.hide-panel-body ~ .panel-body {
	height: 0px;
	padding: 0px;
}

/*==========  Mobile First Method  ==========*/

/* Custom, iPhone Retina */ 
@media only screen and (max-width : 320px) {
    .level-line-up {
        position: relative;
        top: -4px;
    }
}

/* Extra Small Devices, Phones */ 
@media only screen and (max-width : 480px) {
    .level-line-up {
        position: relative;
        top: -4px;
    }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 480px) and (max-width : 768px) {
    .level-line-up {
        position: relative;
        top: -4px;
    }
}
        
    </style>
    <script type="text/javascript">
        
        /*$(function() {
    $('.panel-image').on('click', function(e) {
	    $(this).next('.panel-body').slideToggle();
    });
});*/
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=myMap"></script>
  <script type="text/javascript">
       <?php
                     $oid=$_GET['sid'];      
                      $vs="select lid from org_data where id='$oid'";
                            $vs1=mysql_query($vs);
                            if(mysql_affected_rows()>0)
                           { 
                            $vs2=mysql_result($vs1,0); 
                            
                            
                            
                            $a=mysql_query("select * from park where park_id='$vs2'");
                         
                            while($b=mysql_fetch_row($a))
                            {
                            
                            
                            ?>
        function initMap() {
        var uluru = {lat: <?php echo $b['5']?>, lng: <?php echo $b['6']?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    
    <?php
                            }
                           }  
            ?>
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=initMap">
    </script>

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
                            
                            
                            
	<div class="col-md-1"></div>
    <div class="col-md-10">
            <div class="panel panel-default panelD">
                <div class="panel-heading">
                    <ul class="list-inline">
                         <?php
                     $oid=$_GET['sid'];      
                      $vs="select lid from org_data where id='$oid'";
                            $vs1=mysql_query($vs);
                            if(mysql_affected_rows()>0)
                           { 
                            $vs2=mysql_result($vs1,0); 
                            
                            
                            
                            $c=mysql_query("select * from park where park_id='$vs2'and ty='2-Wheeler'");
                         
                            while($d=mysql_fetch_row($c))
                            {
                            
                            
                            ?>
                        
                        <center>   <li><?php echo $d['3']?></li></center>
                        
                    </ul>
                </div>
                <div class="panel-image">
                    <div id="map" style="width: 918px; height: 500px;"></div>
                </div>
                <div class="panel-body">
                    <blockquote>
                      <p><?php echo $d['4']?></p>
                    </blockquote>
                    <span class="tagz">Parking Slot</span>
                </div>
                <div class="panel-footer">
                    <ul class="list-inline clearfix">
                        <h4>   <li class="col-sm-4 col-md-4 col-lg-4 level-line-up"><a href=""><span class="fa fa-motorcycle"></span> Bikes:</a><span><?php echo $d['1']?></span></li></h4>
                       <?php
                       
                            }
                           }
                           ?>
                        
                        
                        
                        <?php
                     $oid=$_GET['sid'];      
                      $vs="select lid from org_data where id='$oid'";
                            $vs1=mysql_query($vs);
                            if(mysql_affected_rows()>0)
                           { 
                            $vs2=mysql_result($vs1,0); 
                            
                            
                            
                            $e=mysql_query("select * from park where park_id='$vs2'and ty='4-Wheeler'");
                         
                            while($f=mysql_fetch_row($e))
                            {
                            
                            
                            ?>
                        <li class="col-sm-4 col-md-4 col-lg-4 level-line-up"><center><a href=""><span class="fa fa-hdd-o"></span> </a><span></span></center></li>
                    <h4> <li class="col-sm-4 col-md-4 col-lg-4" style="padding-right: 0;"><span class="pull-right"><?php echo $f['1']?></span><a class="pull-right" href=""><span class="fa fa-car"></span> Cars:</a></li></h4>
                    </ul>
                </div>
                <?php
                            }
                           }
                           ?>
            </div>
            <div class="panel panel-default panelD">
                <div class="panel-heading">
                    <ul class="list-inline">
                        <li><a target="_blank" href="book_slot.php?mid=<?php echo $_GET['sid']  ?>">Book Plot(Only 1 hour Duration)</a></li>
                        <li class="pull-right" style="padding-right: 0;"></li>
                    </ul>
                </div>
                <div class="panel-image">
                    <!--<img src="http://mars-2035432769.us-west-1.elb.amazonaws.com/arcgis/rest/services/Mars_Viking_MDIM21_ClrMosaic_global_232m_sp/MapServer/tile/1/0/2?blankTile=false" class="panel-image-preview" />-->
                </div>
                <div class="panel-body">
                    <blockquote>
                      <p>Available Parking Slot</p>
                    </blockquote>
                    
                </div>
                
                
                <?php
                     $oid=$_GET['sid'];      
                      $vs="select lid from org_data where id='$oid'";
                            $vs1=mysql_query($vs);
                            if(mysql_affected_rows()>0)
                           { 
                            $vs2=mysql_result($vs1,0);
                                    
                                    
                                 $ms="select plot from park where park_id='$vs2'and ty='2-Wheeler'";   
                            $ms1=mysql_query($ms);
                            
                            $ms2=mysql_result($ms1,0); 
                            
                            
                            $e=mysql_query("select * from park_add where pid='$vs2'and ty='2-Wheeler'");
                                $v_n2= mysql_num_rows($e);
                                $tot1=$ms2-$v_n2;
                                
                            
                         ?>
                            
                           
                <div class="panel-footer">
                    <ul class="list-inline clearfix">
                        <h4>   <li class="col-sm-4 col-md-4 col-lg-4 level-line-up"><a href=""><span class="fa fa-motorcycle"></span> Bikes:</a><span><?php echo $tot1;?></span></li></h4>
                       <?php
                       
                            }
                           
                           ?>
                        
                        
                        
                         <?php
                     $oid=$_GET['sid'];      
                      $vs="select lid from org_data where id='$oid'";
                            $vs1=mysql_query($vs);
                            if(mysql_affected_rows()>0)
                           { 
                            $vs2=mysql_result($vs1,0);
                                    
                                    
                                 $ns="select plot from park where park_id='$vs2'and ty='4-Wheeler'";   
                            $ns1=mysql_query($ns);
                            
                            $ns2=mysql_result($ns1,0); 
                            
                            
                            $g=mysql_query("select * from park_add where pid='$vs2'and ty='4-Wheeler'");
                                $v_n4= mysql_num_rows($g);
                                $tot2=$ns2-$v_n4;
                                
                           
                         ?>
                        <li class="col-sm-4 col-md-4 col-lg-4 level-line-up"><center><a href=""><span class="fa fa-hdd-o"></span> </a><span></span></center></li>
                    <h4> <li class="col-sm-4 col-md-4 col-lg-4" style="padding-right: 0;"><span class="pull-right"><?php echo $tot2 ?></span><a class="pull-right" href=""><span class="fa fa-car"></span> Cars:</a></li></h4>
                    </ul>
                </div>
                <?php
                            }
                           
                           ?>
            </div>
	</div>
    <div class="col-md-3"></div>

                        </div>
	<!-- //typography -->

		