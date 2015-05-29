<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>TCMS | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/signin.css" rel="stylesheet">
    
    
    
  </head>

  <body>

    <div class="container">
    	<?php 
    		$attributes = array(
				'class' => 'form-signin'
			);
    	?>
    	<?php echo form_open('admin/authenticate/login',$attributes);?>
    		<h2 class ="form-signin-heading">TCMS Authorization</h2>
    		<?php echo validation_errors('<p class="alert alert-dismissable alert-danger" />'); ?>
    		<?php 
    			$data = array(
    				'name' => 'username',
					'class' => 'form-control',
					'placeholder' => 'Username'
				);
				echo form_input($data);
    		?>
    		<?php 
    			$data = array(
					'name' => 'password',
					'class' => 'form-control',
					'placeholder' => 'Password'
				);
				echo form_password($data);
    		?>
    		
    		<?php 
    			$data = array(
					'class' => 'btn btn-lg btn-primary btn-block',
					'content' => 'login',
					'placeholder' => 'Password',
					'type' => 'submit'
				);
				echo form_button($data);
    		?>
    	<?php echo form_close();?>
    </div> <!-- /container -->

  </body>
</html>
