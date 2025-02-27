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
    $del=mysql_query("delete from reg where id='".$_GET['del']."'");
    //echo mysql_error();
    if($del>0)
    {
       header("location:company_view.php");
}
}
         
?>
                                <?php
                            
                            
                            $a=mysql_query("select * from reg where utype='company'");
                            
                            $i=0;
                            while($b=mysql_fetch_array($a))
                            {
                            
                            
                            ?>
                                <td style="width:20%"><a href="img1//<?php echo $b['photo']?>"</a><img src="img1//<?php echo $b['photo']?>" style="width:100%; height:260px;" /></a><br />
                                
                                
                                        <h3 style="text-align: center;color: #1b6d85"><?php echo $b['name']?></h3>
                                <br/>
                               
                                <h4 style="text-align: center">
                                    <?php  
                                                        
                                                      
      $n=$b['state'];
       $qry=mysql_query("select statename from state where stcode='$n'");
       
$sname=mysql_result($qry,0);
    
                                                        
                                                        
                                                        echo($sname)  ?>,<?php echo $b['district']?>
                                </h4>
                                
                                <br/>
                                
                                        <h4 style="text-align: center"> <?php echo $b['contact']?></h4>
                                
                                <br/>
                                <center><a href="company_view.php?del=<?php echo $b['id']?>"class="btn btn-danger">Delete Company </a></center></td>
                                
                                
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