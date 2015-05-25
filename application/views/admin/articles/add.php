<!-- Display Validation errors -->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url() ?>admin/articles/add">
	<div class="row">	
	  <div class="col-md-6">
	  	<h1 class="sub-header">Add Article</h1>
	  </div>
	</div>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard">
						Dashboard
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>admin/articles">
						Articles
					</a>
				</li>
				<li>
					Add Article
				</li>
			</ol>
			
			<div class="form-group">
				<label>Article Title</label>
				<input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" placeholder="Enter Title" />
			</div>
			
			<div class="form-group">
				<label>Category</label>
				<select name="category_id" class="form-control ">
					<option selected>Select Category</option>
					<?php foreach($categories as $category): ?>
						<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
					<?php endforeach ; ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Article Text</label>
				<textarea class="form-control" name="body" rows="10" value="<?php echo set_value('title'); ?>" > </textarea>
			</div>
			
			
			<div class="form-group">
				<label>Access</label>
				<select name="access" class="form-control ">
					<option selected>Select Group</option>
					<option value="0">Everyone</option>
					<?php foreach($groups as $group) : ?>
						<option value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Author</label>
				<select name="user_id" class="form-control ">
					<option selected>Select Author</option>
					<?php foreach($users as $user): ?>
						<option value="<?php echo $user->id; ?>"><?php echo $user->username; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Published</label>
				<br />
				<label class="radio-inline">
				  <input type="radio" name="is_published" value="1"> Yes
				</label>
				<label class="radio-inline">
				  <input type="radio" name="is_published" value="0"> No
				</label>
			</div>
			
			<div class="form-group">
				<label>Add to Navbar</label>
				<br />
				<label class="radio-inline">
				  <input type="radio" name="in_navbar" value="1"> Yes
				</label>
				<label class="radio-inline">
				  <input type="radio" name="in_navbar" value="0"> No
				</label>
			</div>
			
			<div class="form-group">
				<label>Order</label>
				<input class="form-control" style="width:60px;" type="number" name="order" value="0" min="0" />
			</div>
			
	  	<div class="btn-group pull-left">
	  		<input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Add" />
	  		<a href="<?php echo base_url()?>admin/dashboard" class="btn btn-default">Back</a>
	  	</div>
</form>