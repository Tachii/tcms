<div class="row">	
  <div class="col-md-6">
  	<h1 class="sub-header">Upload Logo</h1>
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
		Upload Logo 
	</li>
</ol>
<?php echo $error; ?>
<?php echo form_open_multipart('admin/settings/upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>