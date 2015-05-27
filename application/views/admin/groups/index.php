<!-- Display Notification Message -->
<?php
	if($this->session->flashdata('group_saved')){
		echo ('<p class="alert alert-success">'.$this->session->flashdata('group_saved')."</p>");
	}
	if($this->session->flashdata('group_saved_error')){
		echo ('<p class="alert alert-danger">'.$this->session->flashdata('group_saved_error')."</p>");
	}
	if($this->session->flashdata('group_deleted')){
		echo '<p class="alert alert-success">'.$this->session->flashdata('group_deleted')."</p>";
	}
	if($this->session->flashdata('group_deleted_error')){
		echo '<p class="alert alert-danger">'.$this->session->flashdata('group_deleted_error')."</p>";
	}
?>
<h1 class="sub-header">groups</h2>
      	  <a href="<?php echo base_url() ?>admin/groups/add" class="btn btn-success pull-right">Add Group</a><br /><br />
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
	          				<?php foreach($groups as $group): ?>
		          				<tr>
		          					<td><?php echo $group->id; ?></td>
	          						<td><?php echo $group->name; ?></td>
	          						<td><a href="<?php echo base_url()."admin/groups/edit/".$group->id; ?>" class="btn btn-primary">Edit</a> <a href="<?php echo base_url()."admin/groups/delete/".$group->id; ?>" class="btn btn-danger">Delete</a></td>
		          				</tr>
	          				<?php endforeach; ?>
	          			</tbody>
          			</table>
          		</div>