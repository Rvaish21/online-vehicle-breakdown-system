<?php
include './conection.php';
?>

<?php

include 'menu.php';
ob_start();

?>


<?php
                    
                            
                            if(isset($_POST['b1']))
                                
                            {
                             
    
                          
     mysql_query("insert into msg values('','$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','0')");
    
    if(mysql_affected_rows()>0)
    
{
echo"Complete";
}
else 
{
echo mysql_error();       
}
                

                            }
                            
                            
    ?>  
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
						<h2>contact us</h2>
				</div>
			</div>
		<!--end header-section-->
		<div class="content">
			<div class="contact">
				<div class="container">
					
					<div class="contact-grids">
						<div class="col-md-6 contact-right">
							<form>
								<h5>name</h5>
								<input type="text" name="t1"onkeyup="nme(this.value)" /><span id="np3"></span>
								<h5>Contact no</h5>
								<input type="text" name="t2"onkeyup="chkc(this.value)" /><span id="o3"></span>
                                                                
                                                                <h5>email address</h5>
								<input type="text" name="t3"onkeyup="vem(this.value)" /><span id="em"></span>
								<h5>message</h5>
								 <textarea name="t4"></textarea >
                                                                 <input type="submit" name="b1" value="send">
						 	 </form>
						</div>
						<div class="col-md-6 contact-left">
                                                    <img style="width: 100%;height: 400px" src="images/istockphoto-1168945108-612x612.jpg">
								
						</div>
						<div class="clearfix"></div>
				</div>
				</div>
			</div>


		
	</div>
			<!--footer-->
			
			<!--footer-->
</body>
</html> 