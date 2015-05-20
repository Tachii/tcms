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

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core ../css -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search Articles...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.html">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="articles.html">Articles</a></li>
            <li><a href="categories.html">Categories</a></li>
            <li><a href="users.html">Users</a></li>
            <li><a href="user_groups.html">User Groups</a></li>
            <li><a href="settings.html">Settings</a></li>
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
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
