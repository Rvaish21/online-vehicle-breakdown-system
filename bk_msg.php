<?php

include 'menu_staff.php';
ob_start();

?>
<?php

if(isset($_GET['upd']))
{
    $ac=$_GET['upd'];
    

    $upd1=mysql_query("update s_book set st='1'where id='$ac'");
    
   
    if($upd1>0)
    {
        header("location:bk_msg.php");
    }
    }


?>
<?php
if(isset($_GET['del']))
{
    $de=$_GET['del'];
    

    $upd1=mysql_query("update s_book set st='2'where id='$de'");
    
   
    
   
    if($upd1>0)
    {
        header("location:bk_msg.php");
    }
    }


?>
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
                     $mid=$_GET['mid'];      
                     
                            
                            
                            
                            $a=mysql_query("select * from s_help where id='$mid'");
                         
                            while($b=mysql_fetch_row($a))
                            {
                            
                            
                            ?>
      function initMap() {
        var uluru = {lat: <?php echo $b['1']?>, lng: <?php echo $b['2']?>};
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
                            
            ?>
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=initMap">
    </script>
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Message</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
			<div class="container">
				<div class="grid_3 grid_4">
                                    <div class="col-lg-2"></div>
                                     <div class="col-lg-8">
                                         
                                          <?php
                                        if(isset($_GET['t']))
                                        {
                                          if($_GET['t']==1)
                                          {
                                                                                        
                                              ?>
                                         
                                         <div class="panel panel-default panelD">
                <div class="panel-heading">
                    <ul class="list-inline">
                        <a href="sp_msg.php" class="glyphicon glyphicon-remove" style="float: right;color: red;width: 20px"></a>
                        <center>   <li>Client Location</li></center>
                        
                        
                    </ul>
                </div>
                <div class="panel-image">
                    <div id="map" style="width: 728px; height: 500px;"></div>
                </div>
                
                
               
            </div>
                                         
                                         
                  <?php
                                          }
                                        }
                                        else
                                        {
                                        ?>                        
                                         
                                         
                                         
                                         
 <table  class="table  table-responsive  table-striped table-bordered ">
    
                        
                       <tr>
                           <th>NAME</th>
                           <th>Date</th>
        <th>Car</th>
        <th>License</th>
       
        <th>Description</th>
        
        <th>more</th>
        
        
        
        
    </tr>
     
     <?php
                            
                                                       
                            $a=mysql_query("select * from s_book where sid='$_SESSION[username]'and st='0'order by id desc");
                            
                            $i=0;
                            while($b=mysql_fetch_row($a))
                            {
                            
                            
                            ?>
   
    <tr>
        <td><?php echo $b[6]?></td>
         <td><?php echo $b[1]?></td>
        <td><?php echo $b[2]?></td>
        
        <td><?php echo $b[3]?></td>
        <td><?php echo $b[4]?></td>
        
        
        <td> <a href="bk_msg.php?upd=<?php echo $b[0] ?>"><span class="glyphicon glyphicon-ok" style="color: lightgreen"></span></a> &nbsp;&nbsp; <a href="bk_msg.php?del=<?php echo $b[0] ?>"><span class="glyphicon glyphicon-remove" style="color: red"></span></a></td>
       <?php
    $i++;
    }
                           
    ?>
    </tr>
      
</table>
                                          <?php
                                        
                                        }
                                        ?>
 
			</div>
                                </div>		<!-- //container-wrap -->
	</div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>