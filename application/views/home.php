<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome | <?php echo $this->global_data['site_title']; ?> </title>
    

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/jumbotron-narrow.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right navbar">
            <li role="presentation" ><a href="<?php echo base_url();?>">Home</a></li>
			<?php foreach($navbar_items as $item): ?>
            	<li role="presentation"><a href="<?php echo base_url();?>articles/view/<?php echo $item->id;?>"><?php echo $item->title; ?></a></li>
          	<?php endforeach ; ?>
          </ul>
        </nav>
        <h3 class="text-muted"><img class="logo" src="<?php echo base_url() ?>assets/img/<?php echo $this->global_data['logo']; ?>" /></h3>
      </div>

      <div class="jumbotron">
        <h1><?php echo $this->global_data['jumbotron_heading']; ?></h1>
        <p class="lead"><?php echo $this->global_data['jumbotron_text']; ?></p>
        <p><a class="btn btn-lg btn-success" href="#" role="button"><?php echo $this->global_data['jumbotron_button_text']; ?></a></p>
      </div>

      <ul class="home-content">
      	<?php foreach($articles as $article): ?>
	      	<li>
	      		<h4>
	      			<?php echo $article->title; ?>
	      		</h4>
	      		<p>
	      			<?php echo word_limiter($article->body, 20); ?>
	      			<a href="<?php echo base_url(); ?>articles/view/<?php echo $article->id; ?>">Read More</a>
      			</p>
	      	</li>
      	<?php endforeach; ?>
      </ul>

      <footer class="footer">
        <p>&copy; Gleb Zaveruha 2015</p>
      </footer>

    </div> <!-- /container -->
  </body>
</html>