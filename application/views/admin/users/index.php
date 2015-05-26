<!-- Display Notification Message -->
<?php
	if($this->session->flashdata('user_saved')){
		echo ('<p class="alert alert-success">'.$this->session->flashdata('user_saved')."</p>");
	}
	if($this->session->flashdata('user_saved_error')){
		echo ('<p class="alert alert-danger">'.$this->session->flashdata('user_saved_error')."</p>");
	}
	if($this->session->flashdata('user_published')){
		echo '<p class="alert alert-success">'.$this->session->flashdata('user_published')."</p>";
	}
	if($this->session->flashdata('user_published_error')){
		echo '<p class="alert alert-danger">'.$this->session->flashdata('user_published_error')."</p>";
	}
	if($this->session->flashdata('user_unpublished')){
		echo '<p class="alert alert-success">'.$this->session->flashdata('user_unpublished')."</p>";
	}
	if($this->session->flashdata('user_unpublished_error')){
		echo '<p class="alert alert-danger">'.$this->session->flashdata('user_unpublished_error')."</p>";
	}
	if($this->session->flashdata('user_deleted')){
		echo '<p class="alert alert-success">'.$this->session->flashdata('user_deleted')."</p>";
	}
	if($this->session->flashdata('user_deleted_error')){
		echo '<p class="alert alert-danger">'.$this->session->flashdata('user_deleted_error')."</p>";
	}
?>
<h1 class="sub-header">users</h2>
      	  <a href="<?php echo base_url() ?>admin/users/add" class="btn btn-success pull-right">Add user</a><br /><br />
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Group ID</th>
                  <th>Group</th>
                </tr>
              </thead>
              <tbody>
              	<?php foreach ($users as $user): ?>
                	<tr>
	                  <td><?php echo $user->id ?></td>
	                  <td><?php echo $user->first_name ?></td>
	                  <td>
	                  	<a href="<?php echo base_url()?>admin/users/edit/<?php echo $user->id; ?>" class="btn btn-primary">Edit</a> 
	                  	<?php if($user->is_published == 1): ?>
	                  		<a href="<?php echo base_url()?>admin/users/unpublish/<?php echo $user->id; ?>" class="btn btn-warning">Unpublish</a> 
	                  	<?php else: ?>
	                  		<a href="<?php echo base_url()?>admin/users/publish/<?php echo $user->id; ?>" class="btn btn-success">Publish</a> 
                  		<?php endif; ?>
	                  	<a href="<?php echo base_url()?>admin/users/delete/<?php echo $user->id; ?>" class="btn btn-danger">Delete</a>
                  	</td>
	                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>