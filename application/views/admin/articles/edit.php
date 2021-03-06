<!-- Display Validation errors -->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url() ?>admin/articles/edit/<?php echo $article->id ?>">
	<div class="row">	
	  <div class="col-md-6">
	  	<h1 class="sub-header">Add Article</h1>
	  </div>
	</div>
		<div class="col-lg-12">
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
					Edit Article
				</li>
			</ol>
		</div>
			
			<div class="form-group">
				<label>Article Title</label>
				<input type="text" class="form-control" name="title" value="<?php echo $article->title; ?>" placeholder="Enter Title" />
			</div>
			
			<div class="form-group">
				<label>Category</label>
				<select name="category_id" class="form-control ">
					<option>Select Category</option>
					<?php foreach($categories as $category): ?>
						<option <?php if($article->category_id == $category->id){echo 'selected';} ?> value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
					<?php endforeach ; ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Article Text</label>
				<textarea class="form-control" name="body" rows="10" value="<?php echo set_value('body'); ?>" > <?php echo $article->body; ?> </textarea>
			</div>
			
			
			<div class="form-group">
				<label>Access</label>
				<select name="access" class="form-control ">
					<option>Select Group</option>
					<option value="0">Everyone</option>
					<?php foreach($groups as $group) : ?>
						<option <?php if($article->access == $group->id) ?> value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Author</label>
				<select name="user_id" class="form-control ">
					<option selected>Select Author</option>
					<?php foreach($users as $user): ?>
						<option <?php if($user->id == $article->id){echo 'selected';} ?> value="<?php echo $user->id; ?>"><?php echo $user->username; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Published</label>
				<br />
				<label class="radio-inline">
				  <input <?php if($article->is_published) echo 'checked="checked"'; ?> type="radio" name="is_published" value="1"> Yes
				</label>
				<label class="radio-inline">
				  <input <?php if(!$article->is_published) echo 'checked="checked"'; ?> type="radio" name="is_published" value="0"> No
				</label>
			</div>
			
			<div class="form-group">
				<label>Add to Navbar</label>
				<br />
				<label class="radio-inline">
				  <input <?php if($article->in_navbar) echo 'checked="checked"'; ?> type="radio" name="in_navbar" value="1"> Yes
				</label>
				<label class="radio-inline">
				  <input <?php if(!$article->in_navbar) echo 'checked="checked"'; ?> type="radio" name="in_navbar" value="0"> No
				</label>
			</div>
			
			<div class="form-group">
				<label>Order</label>
				<input class="form-control" style="width:60px;" type="number" name="order" value="<?php echo $article->order; ?>" min="0" />
			</div>
			
	  	<div class="btn-group pull-left">
	  		<input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
	  		<a href="<?php echo base_url()?>admin/dashboard" class="btn btn-default">Back</a>
	  	</div>
</form>