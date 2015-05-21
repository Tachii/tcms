        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if(current_url()==base_url()."admin/dashboard"){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>admin/dashboard">Overview</a></li>
            <li <?php if(current_url()==base_url()."admin/articles"){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>admin/articles">Articles</a></li>
            <li <?php if(current_url()==base_url()."admin/categories"){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>admin/categories">Categories</a></li>
            <li <?php if(current_url()==base_url()."admin/users"){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>admin/users">Users</a></li>
            <li <?php if(current_url()==base_url()."admin/groups"){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>admin/groups">User Groups</a></li>
            <li <?php if(current_url()==base_url()."admin/settings"){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>admin/settings">Settings</a></li>
          </ul>
        </div>