<form>
	<div class="row">	
	  <div class="col-md-6">
	  	<h1 class="sub-header">Add Article</h1>
	  </div>
	</div>
			<ol class="breadcrumb">
				<li>
					<a href="#">
						Dashboard
					</a>
				</li>
				<li>
					<a href="#">
						Articles
					</a>
				</li>
				<li>
					Add Article
				</li>
			</ol>
		<div class="form-group">
			
			<label>Jumbotron Title</label>
			<input type="text" class="form-control" name="jtitle" />
			
			<br />
			<label>Jumbotron Text</label>
			<textarea class="form-control" name="jtext" rows="10"> </textarea>
			
			<br />
			<label>Access</label>
			<select class="form-control ">
				<option selected>Choose who will be able to access this article</option>
				<option>Everyone</option>
				<option>Admins</option>
				<option>Registered Users</option>
			</select>
			
			<br />
			<label>Author</label>
			<select class="form-control ">
				<option selected>Select Author</option>
				<option>Everyone</option>
				<option>Admins</option>
				<option>Registered Users</option>
			</select>
			
			<br />
			<label>Published</label>
			<label class="radio-inline">
			  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Yes
			</label>
			<label class="radio-inline">
			  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> No
			</label>
			
		</div>
	  	<div class="btn-group pull-left">
	  		<input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
	  		<a href="#" class="btn btn-default">Close</a>
	  	</div>
</form>