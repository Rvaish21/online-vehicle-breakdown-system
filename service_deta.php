<?php

include 'menu_staff.php';
ob_start();

?>
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Enquiry Details</h2>
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
 <table  class="table  table-responsive  table-striped table-bordered ">
     <?php
     if(isset($_GET['upd']))
{
    $upd=mysql_query("update help set st='1' where id='".$_GET['upd']."'");
    //echo mysql_error();
    if($upd>0)
    {
        $selx=mysql_query("select lat,lon,time from help where id='".$_GET['upd']."'");
        $rx=mysql_fetch_row($selx);
        $la=$rx[0];
        $lo=$rx[1];
        $tim=$rx[2];
        echo"$la,$lo";
        $up1=mysql_query("update help set st=2 where id != '".$_GET['upd']."' and time='$tim'" );
        echo mysql_error();
        if($up1>0)
        {
                header("location:staff_msg.php");
        }
}
}                         
?>
                        
                       <tr>
        
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Date</th>
        <th>Time</th>
        
        
        
        
        
        
    </tr>
     
     <?php
                            
                                                       
                            $a=mysql_query("select * from help where shop_id='$_SESSION[username]'");
                            
                            $i=0;
                            while($b=mysql_fetch_array($a))
                            {
                            
                            
                            ?>
   
    <tr>
       
        
        <td><?php echo $b['lat']?></td>
        <td><?php echo $b['lon']?></td>
        <td><?php echo $b['date']?></td>
        <td><?php echo $b['time']?></td>
        
       <?php
    $i++;
    }
                           
    ?>
    </tr>
      
</table>
 
			</div>
                                </div>		<!-- //container-wrap -->
	</div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>