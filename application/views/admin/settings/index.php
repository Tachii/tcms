<!-- Display Notification Message -->
<?php
	if($this->session->flashdata('setting_saved')){
		echo ('<p class="alert alert-success">'.$this->session->flashdata('setting_saved')."</p>");
	}
	if($this->session->flashdata('setting_saved_error')){
		echo ('<p class="alert alert-danger">'.$this->session->flashdata('setting_saved_error')."</p>");
	}
	if($this->session->flashdata('setting_deleted')){
		echo '<p class="alert alert-success">'.$this->session->flashdata('setting_deleted')."</p>";
	}
	if($this->session->flashdata('setting_deleted_error')){
		echo '<p class="alert alert-danger">'.$this->session->flashdata('setting_deleted_error')."</p>";
	}
?>
<h1 class="sub-header">Settings</h2>
      	  <a href="<?php echo base_url() ?>admin/settings/add" class="btn btn-success pull-right">Add setting</a><br /><br />
          <div class="table-responsive">
          			<table class="table table-striped">
	          			<thead>
	          				<tr>
	          					<th width="70">ID</th>
	          					<th>Name</th>
	          					<th>Actions</th>
	          				</tr>
	          			</thead>
	          			<tbody>
	          				<?php foreach($settings as $setting): ?>
		          				<tr>
		          					<td><?php echo $setting->id; ?></td>
	          						<td><?php echo $setting->key; ?></td>
	          						<td><a href="<?php echo base_url()."admin/settings/edit/".$setting->id; ?>" class="btn btn-primary">Edit</a> <a href="<?php echo base_url()."admin/settings/delete/".$setting->id; ?>" class="btn btn-danger">Delete</a></td>
		          				</tr>
	          				<?php endforeach; ?>
	          			</tbody>
          			</table>
          		</div>