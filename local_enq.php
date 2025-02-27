<?php

include 'menu_admin.php';
ob_start();

?>
<?php
if(isset($_GET['upd']))
{
                                $upid=$_GET['upd'];
                                $vs="select lid from local where id='$upid'";
                            $vs1=mysql_query($vs);
                            if(mysql_affected_rows()>0)
                           { 
                            $vs2=mysql_result($vs1,0);
      
    $upd1=mysql_query("update local set st='1'where id='$upid'");
    
   
    if($upd1>0)
    {
        $upd2=mysql_query("update user_log set st='1'where uid='$vs2'");
    
   
    if($upd2>0)
    {
       header("location:local_enq.php");
}
}                         
                            
}
}
?>
          <?php
                            if(isset($_GET['del']))
{
    $del1=mysql_query("delete from local where id='".$_GET['del']."'");
    //echo mysql_error();
    if($del1>0)
    {
       header("location:local_enq.php");
}
}
  


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
                                
                                
                                <?php
                            
                            $a=mysql_query("select * from local where st='0'");
                            if(mysql_num_rows($a)>0)
                            {
                                ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Email</th>
            
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
            <td><?php echo $b['3']?></td>
            <td><?php echo $b['4']?></td>
            <td><?php echo $b['5']?></td>
            
            <td>
                <a href="local_enq.php?upd=<?php echo $b[0] ?>"><span class="glyphicon glyphicon-ok" style="color: lightgreen"></span></a><a href="org_enq.php?del=<?php echo $b[0] ?>"><span class="glyphicon glyphicon-remove" style="color: red"></span>      </a>
            </td>
          </tr>
          
          
          
          <?php
    $i++;
    }
                            
 ?>
          
          
          
        </tbody>
      </table>
        <?php
                            }
else
{
    echo "No Data Found";
}

?>
                            </div>
			<!-- //container-wrap -->
	</div>
                        </div>
	<!-- //typography -->

		<?php

include 'footer.php';
ob_start();

?>