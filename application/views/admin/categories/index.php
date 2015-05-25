<h1 class="sub-header">Categories</h2>
      	  <a href="<?php echo base_url() ?>admin/categories/add" class="btn btn-success pull-right">Add Category</a><br /><br />
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
		          					<td><?php echo $category->id; ?></td>
	          						<td><?php echo $category->name; ?></td>
	          						<td><a href="<?php echo base_url()?>/admin/categories/edit/$category->id" class="btn btn-primary">Edit</a> <a href="edit_article.html" class="btn btn-danger">Delete</a></td>
		          				</tr>
	          				<?php endforeach; ?>
	          			</tbody>
          			</table>
          		</div>