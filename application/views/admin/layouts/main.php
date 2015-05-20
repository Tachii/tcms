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
    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand active" >TCMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url(); ?>" target="_blank">View Site</a></li>
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>admin/users/logout">Logout</a></li>
          </ul>
          
		<!-- CodeIgniter Form Helper. Searchbox -->
		<?php $atrributes = array('class' => 'navbar-form navbar-right'); ?>
		<?php echo form_open('admin/articles/index', $atrributes); ?>
			<?php 
				$data = array(
					'name' => 'keywords',
					'class' => 'form-control',
					'placeholder' => 'Search Articles'
				);
				
				echo form_input($data);
			?>
		<?php echo form_close(); ?>
		<!-- End of Form Helper -->
			

        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url(); ?>">Overview</a></li>
            <li><a href="<?php echo base_url(); ?>admin/articles">Articles</a></li>
            <li><a href="<?php echo base_url(); ?>admin/categories.html">Categories</a></li>
            <li><a href="<?php echo base_url(); ?>admin/users">Users</a></li>
            <li><a href="<?php echo base_url(); ?>admin/settings">Settings</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          

          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th>Date</th>
                  <th>Actions</th>	
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                  <td><a href="edit_article.html" class="btn btn-primary">Edit</a> <a href="edit_article.html" class="btn btn-warning">Unpublish</a> <a href="edit_article.html" class="btn btn-danger">Delete</a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row">
          	<div class="col-md-6">
          		<h3>
          			Latest Categories
          		</h3>
          		<div class="table-responsive">
          			<table class="table table-striped">
	          			<thead>
	          				<tr>
	          					<th width="70">#</th>
	          					<th>Name</th>
	          					<th>Actions</th>
	          				</tr>
	          			</thead>
	          			<tbody>
	          				<tr>
	          					<td>1</td>
	          					<td>sit</td>
	          					<td><a href="edit_article.html" class="btn btn-primary">Edit</a> <a href="edit_article.html" class="btn btn-danger">Delete</a></td>
	          				</tr>
	          				<tr>
	          					<td>1</td>
	          					<td>sit</td>
	          					<td><a href="edit_article.html" class="btn btn-primary">Edit</a> <a href="edit_article.html" class="btn btn-danger">Delete</a></td>
	          				</tr>
	          				<tr>
	          					<td>1</td>
	          					<td>sit</td>
	          					<td><a href="edit_article.html" class="btn btn-primary">Edit</a> <a href="edit_article.html" class="btn btn-danger">Delete</a></td>
	          				</tr>
	          			</tbody>
          			</table>
          		</div>
          	</div>
          	<div class="col-md-6">
          		<h3>
          			Latest Users
          		</h3>
          		<div class="table-responsive">
          			<table class="table table-striped">
	          			<thead>
	          				<tr>
	          					<th width="70">#</th>
	          					<th>Username</th>
	          					<th>Actions</th>
	          				</tr>
	          			</thead>
	          			<tbody>
	          				<tr>
	          					<td>1</td>
	          					<td>sit</td>
	          					<td><a href="edit_article.html" class="btn btn-primary">Edit</a> <a href="edit_article.html" class="btn btn-danger">Delete</a></td>
	          				</tr>
	          				<tr>
	          					<td>1</td>
	          					<td>sit</td>
	          					<td><a href="edit_article.html" class="btn btn-primary">Edit</a> <a href="edit_article.html" class="btn btn-danger">Delete</a></td>
	          				</tr>
	          				<tr>
	          					<td>1</td>
	          					<td>sit</td>
	          					<td><a href="edit_article.html" class="btn btn-primary">Edit</a> <a href="edit_article.html" class="btn btn-danger">Delete</a></td>
	          				</tr>
	          			</tbody>
          			</table>
          		</div>
          	</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
