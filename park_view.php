<?php

include 'menu_admin.php';
ob_start();

?>
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Manage Company</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
					<div class="container">
				
                            
                            
                                <div class="thumbnail">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                              
                            <table class="table table-condensed table-responsive img-responsive ">
                                <?php
                            if(isset($_GET['del']))
{
    $del=mysql_query("delete from org_data where id='".$_GET['del']."'");
    //echo mysql_error();
    if($del>0)
    {
       header("location:company_view.php");
}
}
         
?>
                                <?php
                            
                            
                            $a=mysql_query("select * from org_data where st='1'");
                            
                            $i=0;
                            while($b=mysql_fetch_array($a))
                            {
                            
                            
                            ?>
                                <td style="width:20%"><a href="picture/<?php echo $b['logo']?>"</a><img src="picture//<?php echo $b['logo']?>" style="width:100%; height:260px;" /></a><br />
                                
                                
                                        <h3 style="text-align: center;color: #1b6d85"><?php echo $b['onme']?></h3>
                                <br/>
                               
                                
                                
                                <br/>
                                
                                        <h4 style="text-align: center"> <?php echo $b['con']?></h4>
                                
                                <br/>
                                <center><a href="park_view.php?del=<?php echo $b['id']?>"class="btn btn-danger">Delete Parking></td>
                                
                                
                                <?php
                                $i++;
                              if($i>2)
                              {
                                  echo"</tr>";
                                  $i=0;
                              }
                                  
                            }    
                            
                            ?>
                                
                                
                            </table>
                            
                            
                            
                           
                        </div>
                                
                                      
                                  
                </div>
</div> 
				
			
				</div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>