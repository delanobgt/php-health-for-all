<!DOCTYPE html>
<html lang="en">
	<head>
  		<?php include __DIR__.'/head.php'; ?>
  	</head>
	<body role="document">
<header>
		<div class='container hidden-xs'>
          <div class='col-md-12 col-sm-12 col-xs-12 header'>
              <img src='<?php echo img("cpanel2.png");?>' class='img-responsive header-logo'/>
          </div>
     	</div>
    	<div class='container visible-xs'>
		<nav class="navbar navbar-default " id="main-nav">
		<div class="container">
			<div class="navbar-header text-center visible-xs">
				<img src='<?php echo img("admin.png");?>' class=''/>
			</div>
	
			
		</div>
    </nav>
    </div>
	</header>
   <?php include __DIR__.'/flash.php'; ?>
		<div class="container" role="main">

			<!--Content-->
			<div class='col-md-12 col-sm-12 col-xs-12 no-padding'>
					<div class='col-md-offset-4 col-md-4 col-sm-offset-6 col-sm-6 col-xs-12 text-center login-box'>
						<img src="<?php echo img('Login-logo.png');?>" width='100px'/>
						<h2>Login</h2>
						<form method='POST' action="<?php echo path('login_check.php'); ?>" class="form-horizontal" role="form">
						  <div class="form-group">
							<div class="col-sm-12">
							  <input type="text" class="form-control" id="username" name='username' placeholder="Username">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-12">
							  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-12">
							  <button type="submit" name="submit" class="btn btn-success">Login</button>
							</div>
						  </div>
						</form>
					</div>
			</div>
	        <!-- End Content -->
		</div>
		<?php include __DIR__.'/footer.php'; ?>
		<?php include __DIR__.'/js.php'; ?>
  </body>
</html>

