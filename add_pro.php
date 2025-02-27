<?php

include 'menu_staff.php';
ob_start();

?>
<?php

$a=$_SESSION['username'];
$se=  mysql_query("select * from reg where username='$a'");
$se1=  mysql_fetch_row($se);


?>
<?php
if(isset($_POST['sub']))
{
    $t1=$_POST['t1'];
    $t2=$_POST['t2'];
    
    $t3=$_POST['t3'];
    
    

$a=mysql_query("select max(id) from pro");
$id=mysql_result($a,0);
$id++;
$f=$_FILES['f1']['name'];
$ext=strchr($f,'.');
$fname="$id$ext";
if(move_uploaded_file($_FILES['f1']['tmp_name'],getcwd()."\\pro\\$fname"))
{   

    $ins=mysql_query("insert into pro values('','$t1','$t2','$t3','$se1[2]','$fname','$_SESSION[username]','0')");
    if($ins>0)
    {
       
            
                header("location:add_pro.php?success=1");
            }
        }
    }

?>
<?php
if(isset($_GET['del1']))
{
    $del1=mysql_query("delete from pro where id='".$_GET['del1']."'");
    //echo mysql_error();
    if($del1>0)
    {
       header("location:add_pro.php");
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
                     
                            
                            
                            
                            $a=mysql_query("select * from help where id='$mid'");
                         
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
					<h2>Add Product</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
			<div class="container">
                            <a href="enq_pro.php"><span style="float: right" class="btn btn-primary">Product Enquiry</span></a>
                            <div class="grid_3 grid_4">
                                
                              <div class="col-lg-7">  
                                <form method="post" enctype="multipart/form-data">
                                            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                                                <tr>
                                                    <td colspan="2"><center><b>SELL YOUR PRODUCTS</b></center></td>
                                                </tr>
                                                <tr>
                                                    <td>Product</td>
                                                    <td><input type="text" name="t1" class="form-control" required="required" /></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Car Name</td>
                                                    <td><input type="text" name="t2" class="form-control" required="required" /></td>
                                                </tr>
                                                
                         
                         
                                                <tr>
                                                    <td>Price</td>
                                                    <td><input type="text" name="t3" class="form-control" required="required" /></td>
                                                </tr>
                                                
                                                
                                                 <tr>
                                                    <td>Photo</td>
                                                    <td><input type="file" name="f1" class="form-control" required="required" /></td>
                                                </tr>
                                                
                                                
                                               
                                                
                                                <tr>
                                                    <td colspan="2"><center><input type="submit" name="sub" value="Sell Now" class="btn btn-success" /></center></td>
                                                </tr>
                                            </table>
                                            </form>
                              </div>
                                <div class="col-lg-5">
                                    
                                    <?php
                            
                            $a=mysql_query("select * from pro");
                            if(mysql_num_rows($a)>0)
                            {
                                ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Name</th>
            <th>Car name</th>
            <th>Price</th>
            
            
            <th style="width:30px;"></th>
          </tr>
          <?php
                            $i=0;
                            while($b=mysql_fetch_row($a))
                            {
                            
?>
        </thead>
        <tbody>
         
          <tr>
           
            <td><?php echo $b['1']?></td>
            <td><?php echo $b['2']?></td>
            <td><?php echo $b['3']?> Rs/-</td>
          
            
            <td>
                <a href="add_pro.php?del1=<?php echo $b[0] ?>"><span class="glyphicon glyphicon-trash" style="color: red"></span>      </a>
            </td>
          </tr>
          
          
          
          <?php
    $i++;
    }
                            }                         
 ?>
          
         
                                    
                                </div>
                            </div>		<!-- //container-wrap -->
	</div>
	<!-- //typography -->
                        </div>
		