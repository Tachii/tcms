<form method="post" action="<?php echo base_url() ?>admin/users/add">
	<div class="row">	
      <div class="col-md-6">
      	<h1 class="sub-header">Add User</h1>
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
					Add User
				</li>
			</ol>
		</div>
		<div class="form-group">
			
			<label>First Name</label>
			<input type="text" class="form-control" name="firstname" />
			
			<br />
			<label>Last Name</label>
			<input type="text" class="form-control" name="lastname" />
			
			<br />
			<label>Email</label>
			<input type="email" class="form-control" name="email" />
			
			<br />
			<label>Username</label>
			<input type="text" class="form-control" name="username" />
			
			<br />
			<label>Password</label>
			<input type="password" class="form-control" name="password1" />
			
			<br />
			<label>Repeat Password</label>
			<input type="password" class="form-control" name="password2" />
			
			<br />
			<label>User Group</label>
			<select name="group" class="form-control ">
				<option selected value="">Select User Group</option>
				<?php foreach($groups as $group) : ?>
					<option value="<?php echo $group->id; ?>"><?php echo $group->name ?></option>
				<?php endforeach; ?>
			</select>
			
		</div>
      	<div class="btn-group pull-left">
      		<input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
      		<a href="#" class="btn btn-default">Close</a>
      	</div>
</form>