<form>
    	<div class="row">	
	      <div class="col-md-6">
	      	<h1 class="sub-header">Settings</h1>
	      </div>
    	</div>
    			<ol class="breadcrumb">
    				<li>
						<a href="<?php echo base_url()?>admin/dashboard">
							Dashboard
						</a>
    				</li>
    				<li>
						<a href="<?php echo base_url()?>admin/settings">
							Settings
						</a>
    				</li>
    			</ol>
    		<div class="form-group">
    			<label>Jumbotron Title</label>
    			<input type="text" class="form-control" name="jtitle" />
    			<label>Jumbotron Text</label>
    			<textarea class="form-control" name="jtext" rows="10"> </textarea>
    		</div>
	      	<div class="btn-group pull-left">
	      		<input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
	      		<a href="#" class="btn btn-default">Close</a>
	      	</div>
	</form>