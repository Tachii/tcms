<!-- Display Validation errors -->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url() ?>admin/users/edit/<?php echo $user->id; ?>">
	<div class="row">	
      <div class="col-md-6">
      	<h1 class="sub-header">Edit User</h1>
      </div>
	</div>
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url() ?>admin/dashboard">
						Dashboard
					</a>
				</li>
				<li>
					<a href="<?php echo base_url() ?>admin/users">
						Users
					</a>
				</li>
				<li>
					Edit User
				</li>
			</ol>
		</div>
		<div class="form-group">
			
			<label>First Name</label>
			<input type="text" class="form-control" name="firstname" value="<?php echo $user->first_name; ?>"/>
			
			<br />
			<label>Last Name</label>
			<input type="text" class="form-control" name="lastname" value="<?php echo $user->last_name; ?>"/>
			
			<br />
			<label>Email</label>
			<input type="email" class="form-control" name="email" value="<?php echo $user->email; ?>"/>
			
			<br />
			<label>Username</label>
			<input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>"/>
			
			<br />
			<label>Password</label>
			<input type="password" class="form-control" name="password1" value="<?php echo $user->email;?>"/>
			
			<br />
			<label>Repeat Password</label>
			<input type="password" class="form-control" name="password2" value="<?php echo $user->email;?>"/>
			
			<br />
			<label>User Group</label>
			<select name="group" class="form-control ">
				<?php foreach($groups as $group) : ?>
					<option <?php if($group->id == $user->group_id) echo 'selected'; ?> value="<?php echo $group->id; ?>"><?php echo $group->name ?></option>
				<?php endforeach; ?>
			</select>
			
		</div>
      	<div class="btn-group pull-left">
      		<input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
      		<a href="#" class="btn btn-default">Close</a>
      	</div>
</form>