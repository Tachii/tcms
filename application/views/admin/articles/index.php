<h1 class="sub-header">Articles</h2>
      	  <a href="add_article.html" class="btn btn-success pull-right">Add Article</a><br /><br />
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th>Date</th>
                  <th>Actions</th>	
                </tr>
              </thead>
              <tbody>
              	<?php foreach ($articles as $article): ?>
                	<tr>
	                  <td><?php echo $article->id ?></td>
	                  <td><?php echo $article->title ?></td>
	                  <td><?php echo $article->category_name ?></td>
	                  <td><?php echo $article->username ?></td>
	                  <td><?php echo $article->created ?></td>
	                  <td><a href="edit_article.html" class="btn btn-primary">Edit</a> <a href="edit_article.html" class="btn btn-warning">Unpublish</a> <a href="edit_article.html" class="btn btn-danger">Delete</a></td>
	                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>