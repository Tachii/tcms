<!-- Display Validation errors -->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url() ?>admin/settings/edit/<?php echo $setting->id ?>"?>
	<div class="row">	
	  <div class="col-md-6">
	  	<h1 class="sub-header">Edit <?php echo $setting->key; ?></h1>
	  </div>
	</div>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard">
						Dashboard
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/settings">
						Settings
					</a>
				</li>
				<li>
					Edit 
				</li>
			</ol>
			
			<div class="form-group col-xs-3">
				<label>Setting Content</label>
				<input type="text" class="form-control" name="value" value="<?php echo $setting->value; ?>" placeholder="Enter Setting Value" />
				<br />
				<div class="btn-group pull-left">
		  			<input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save">
		  			<a href="<?php echo base_url()?>admin/settings" class="btn btn-default">Back</a>
		  		</div>
			</div>
		  	
</form>