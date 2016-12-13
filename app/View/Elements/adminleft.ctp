<?php
if ($this->Session->read("AuthUser.User.id") && $this->Session->read("AuthUser.User.user_type_id") == 1) {
    $typeId = $this->Session->read("AuthUser.User.usertype_id");
    $userTypes = array(1, 2, 3);
    //pr($this->params['action']);
    //die;
?>
    <div id="adminMenu" class="ddsmoothmenu actions">
        <a class="side-bar" onclick="hidepanel();" id="btn" href="javascript:void(0);" title="Click to hide panel" >Click to hide panel</a>
        <?php if ($this->Session->read("AuthUser.User.id") && $this->Session->read("AuthUser.User.user_type_id") == 1 ) { ?>  
            <ul>
                <ul class="admintoggel">
				<li>
					<a href="<?php echo $this->Html->url(SITE_LINK.'admin/dashboard'); ?>" <?php if ($this->params['controller'] == 'users' && $this->params['action'] == 'admin_dashboard') { ?> class="active" <?php } ?> >Dashboard </a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url(SITE_LINK.'admin/change-password'); ?>" <?php if ($this->params['action'] == 'admin_changepassword') { ?> class="active" <?php } ?>>Change Password</a>
				</li> 
				<li>
					<a href="<?php echo $this->Html->url(SITE_LINK.'admin/categories'); ?>" <?php if ($this->params['controller'] == 'categories') { ?> class="active" <?php } ?>>Categories</a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url(SITE_LINK.'admin/cuisines'); ?>" <?php if ($this->params['controller'] == 'cuisines') { ?> class="active" <?php } ?>>Cuisines</a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url(SITE_LINK.'admin/cmsemails'); ?>" <?php if ($this->params['controller'] == 'cmsemails') { ?> class="active" <?php } ?>>Email Templates</a>
				</li>
				<li>
					<a href="<?php echo $this->Html->url(SITE_LINK.'admin/locations'); ?>" <?php if ($this->params['controller'] == 'locations') { ?> class="active" <?php } ?>>Locations</a>
				</li> 
				 
				 
		
			</ul>
		<?php } ?>
    </div>
<?php } ?>

