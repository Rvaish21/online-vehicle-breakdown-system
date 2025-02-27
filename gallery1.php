<!--
Au<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

include 'conection.php';
ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $title ?></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Bikes  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/bootstrap.js"></script>
<!--lightbox-->
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox.css">
<script src="js/jquery.lightbox.js"></script>
<script>

  $(function() {
    $('.gallery a').lightbox(); 
  });
</script>
<!--lightbox-->


</head>
<body>
		<!--start-header-section-->
	<div class="header">
		<div class="container">
				<div class="header-top">
					<div class="logo">
						<h1><a href="index.html"><?php echo $title ?></a></h1>
					</div>
					<div class="phone">
						<h5><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> +984 515 4945 </h5>
					</div>
					<div class="clearfix"></div>
				</div>
			<div class="header-bottom">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
        <!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav cl-effect-16">
							<li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
							
                                                        <li><a href="company_reg.php">Company Registration</a></li>
							 
								<li><a href="gallery.php">Gallery</a></li>
                                                                <li><a href="service_check.php">Check Service Station</a></li>
								<li><a href="login.php">login</a></li>
								
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	</div>
		<!--end header-section-->
			<div class="header-banner">
				<div class="container">
					<h2> gallery </h2>
				</div>
			</div>
		<!--end header-section-->
		<!--gallery-->
		<div class="content">
			<div class="gallery-section">
					<div class="container">
                                            
					<div class="gallery-grids">
                                            <?php
                                                        $sel_gal=mysql_query("select * from reg where utype='staff'");
                                                        if(mysql_num_rows($sel_gal)>0)
                                                        {
                                                            while($r_gal=mysql_fetch_row($sel_gal))
                                                            {
                                                                ?>
                                             
				<div class="col-md-4 gallery-grid">
                                     
					<div class="gallery">
                                            <a class="mask" href="img1/<?php echo $r_gal[16] ?>"><img src="img1/<?php echo $r_gal[16] ?>" width="340px"height="530px"class="img-responsive zoom-img" alt="/" title="image-name"></a>
					</div>
                                   
				</div>
                                             
				
				<div class="clearfix"> </div>
                                 <?php
                                                            }
                                                        
                                                            
                                                        }
                                                        ?>
			</div>
                                           
			
		</div>
	</div>
<!--gallery-->

		<?php

include 'footer.php';

?>