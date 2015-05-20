          <h1 class="page-header">Dashboard</h1>

          <h2 class="sub-header">Latest Articles</h2>
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
              	<?php foreach($articles as $article) : ?>
	                <tr>
                	  <td><?php echo $article->id;?></td>
	                  <td><?php echo $article->title;?></td>
	                  <td><?php echo $article->category_name;?></td>
	                  <td><?php echo $article->username;?></td>
	                  <td><?php echo $article->created;?></td>
	                  <td>
	                  	<a href="<?php echo base_url();?>admin/articles/edit" class="btn btn-primary">Edit</a> 
	                  	<a href="<?php echo base_url();?>admin/articles/unpublish" class="btn btn-warning">Unpublish</a> 
	                  	<a href="<?php echo base_url();?>admin/articles/delete" class="btn btn-danger">Delete</a>
                  	</td>
	                </tr>
                <?php endforeach; ?>
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
	          				<?php foreach($categories as $category): ?>
		          				<tr>
		          					<td><?php echo $category->id;?></td>
		          					<td><?php echo $category->name;?></td>
		          					<td>
		          						<a href="<?php echo base_url();?>admin/categories/edit" class="btn btn-primary">Edit</a> 
	                  					<a href="<?php echo base_url();?>admin/categories/delete" class="btn btn-danger">Delete</a>
		          					</td>
		          				</tr>
	          				<?php endforeach ; ?>
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
	          					<td><?php echo $user->id; ?></td>
	          					<td><?php echo $user->username;?></td>
	          					<td>
	          						<a href="<?php echo base_url();?>admin/users/edit" class="btn btn-primary">Edit</a> 
                  					<a href="<?php echo base_url();?>admin/users/delete" class="btn btn-danger">Delete</a>
	          					</td>
	          				</tr>
	          			</tbody>
          			</table>
          		</div>
          	</div>
          	
          </div>