<!-- Display Validation errors -->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url() ?>admin/groups/edit/<?php echo $group->id ?>"?>
	<div class="row">	
	  <div class="col-md-6">
	  	<h1 class="sub-header">Edit Group</h1>
	  </div>
	</div>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard">
						Dashboard
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/groups">
						Groups
					</a>
				</li>
				<li>
					Add Group
				</li>
			</ol>
			
			<div class="form-group col-xs-3">
				<label>Group Name</label>
				<input type="text" class="form-control" name="name" value="<?php echo $group->name; ?>" placeholder="Enter Group Name" />
				<br />
				<div class="btn-group pull-left">
		  			<input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Add">
		  			<a href="<?php echo base_url()?>admin/groups" class="btn btn-default">Back</a>
		  		</div>
			</div>
		  	
</form>