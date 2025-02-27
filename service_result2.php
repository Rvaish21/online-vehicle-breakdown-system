<?php

include 'menu.php';
ob_start();

?>
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Service Center in your State </h2>
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
                            
                            $st=$_GET['st'];
                            $br=$_GET['br'];
                             $a=mysql_query("select * from reg where state='$st' and brand='$br'");
                            
                            $i=0;
                            while($b=mysql_fetch_array($a))
                            {
                            
                            
                            ?>
                                <td style="width:20%"><a href="img1//<?php echo $b['photo']?>"</a><img src="img1//<?php echo $b['photo']?>" style="width:100%; height:260px;" /></a><br />
                                
                                
                                    <a href="service_details.php?bid=<?php echo $b['id']?>"> <h3 style="text-align: center;color: #1b6d85;background-color: #afd9ee" ><?php echo $b['name']?></h3></a>
                                <br/>
                               
                                        <h4 style="text-align: center"><?php  
                                                        
                                                      
      $n=$b['state'];
       $qry=mysql_query("select statename from state where stcode='$n'");
       
$sname=mysql_result($qry,0);
    
                                                        
                                                        
                                                        echo($sname)  ?></h4>
                                
                                <br/>
                                
                                        <h4 style="text-align: center"> <?php echo $b['contact']?></h4>
                                
                               
                                
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