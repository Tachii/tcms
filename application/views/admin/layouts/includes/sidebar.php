        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if(current_url()==base_url()."admin/dashboard"){echo 'class="active"';} ?>><a href="<?php echo base_url(); ?>admin/dashboard">Overview</a></li>
            <li><a href="<?php echo base_url(); ?>admin/articles">Articles</a></li>
            <li><a href="<?php echo base_url(); ?>admin/categories.html">Categories</a></li>
            <li><a href="<?php echo base_url(); ?>admin/users">Users</a></li>
            <li><a href="<?php echo base_url(); ?>admin/groups">User Groups</a></li>
            <li><a href="<?php echo base_url(); ?>admin/settings">Settings</a></li>
          </ul>
        </div>