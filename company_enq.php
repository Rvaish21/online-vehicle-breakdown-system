<?php

include 'menu_admin.php';
ob_start();

?>
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2>Company Registration</h2>
				</div>
			</div>
		<!--end header-section-->
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
			<div class="container">
				<div class="grid_3 grid_4">
                         
 <table  class="table  table-responsive  table-striped table-bordered ">
                        
                       <tr>
        
        <th>Name</th>
        <th>State and District</th>
        <th>Address</th>
        <th>Contact</th>
        
        
        
        <th>Username</th>
        <th>Password</th>
        <th>Logo</th>
        <th>more</th>
        
    </tr>
     <?php
                            if(isset($_GET['del']))
{
    $del=mysql_query("delete from reg where id='".$_GET['del']."'");
    //echo mysql_error();
    if($del>0)
    {
       header("location:company_enq.php");
}
}
   if(isset($_GET['upd']))
{
    $upd=mysql_query("update reg set utype='company' where utype='pending' and id='".$_GET['upd']."'");
    //echo mysql_error();
    if($upd>0)
    {
       header("location:company_enq.php");
}
}                         
?>
                            
     <?php
                            
                            $a=mysql_query("select * from reg where utype='pending'");
                            
                            $i=0;
                            while($b=mysql_fetch_array($a))
                            {
                            
                            
                            ?>
   
    <tr>
       
        <td><?php echo $b['name']?></td>
        <td><?php  
                                                        
                                                      
      $n=$b['state'];
       $qry=mysql_query("select statename from state where stcode='$n'");
       
$sname=mysql_result($qry,0);
    
                                                        
                                                        
                                                        echo($sname)  ?>,<?php echo $b['district']?></td>
        <td><?php echo $b['address']?></td>
        <td><?php echo $b['contact']?></td>
        <td><?php echo $b['username']?></td>
        <td><?php echo $b['password']?></td>
        <td align="center"><a href="img1//<?php echo $b['photo']?>"target="_blank"><span class="glyphicon glyphicon-fullscreen"style="color: lightskyblue"></span></a></td>
        <td align="center"><a href="company_enq.php?del=<?php echo $b[0] ?>"><span class="glyphicon glyphicon-remove" style="color: red"></span>      </a><a href="company_enq.php?upd=<?php echo $b[0] ?>"><span class="glyphicon glyphicon-ok" style="color: lightgreen"></span></a></td>
       <?php
    $i++;
    }
    ?>
    </tr>
      
</table>
 
			</div>
			<!-- //container-wrap -->
	</div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>