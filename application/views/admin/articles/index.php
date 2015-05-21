<!-- Display Notification Message -->
<?php 
var_dump($this->session->flashdata);
	if($this->session->flashdata('article_saved')){
		echo ('<p class="alert alert-success>"'.$this->session->flashdata('article_saved')."</p>");
	}
	if($this->session->flashdata('article_published')){
		echo '<p class="alert alert-success>"'.$this->session->flashdata('article_published')."</p>";
	}
	if($this->session->flashdata('article_unpublished')){
		echo '<p class="alert alert-success>"'.$this->session->flashdata('article_unpublished')."</p>";
	}
	if($this->session->flashdata('article_deleted')){
		echo '<p class="alert alert-success>"'.$this->session->flashdata('article_deleted')."</p>";
	}
?>
<h1 class="sub-header">Articles</h2>
      	  <a href="<?php echo base_url() ?>admin/articles/add" class="btn btn-success pull-right">Add Article</a><br /><br />
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
	                  <td>
	                  	<a href="<?php echo base_url()?>admin/articles/edit/<?php echo $article->id; ?>" class="btn btn-primary">Edit</a> 
	                  	<?php if($article->is_published == 1): ?>
	                  		<a href="<?php echo base_url()?>admin/articles/unpublish/<?php echo $article->id; ?>" class="btn btn-warning">Unpublish</a> 
	                  	<?php else: ?>
	                  		<a href="<?php echo base_url()?>admin/articles/publish/<?php echo $article->id; ?>" class="btn btn-success">Publish</a> 
                  		<?php endif; ?>
	                  	<a href="<?php echo base_url()?>admin/articles/delete/<?php echo $article->id; ?>" class="btn btn-danger">Delete</a>
                  	</td>
	                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>