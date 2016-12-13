<?php if ( $this->Session->read("Auth.User.id") ) {
	pr($this->Session->read("Auth.User"));
} echo $this->Session->flash();	?>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top headroom" >
	<div class="container">
		<div class="navbar-header">
			<!-- Button for smallest screens -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
			</button>
			<a class="navbar-brand" href="<?php echo SITE_LINK; ?>"><img src="<?php echo SITE_LINK; ?>img/logo.png" alt="SwankCook" width="207" height="48"></a>
		</div>
		<?php if (!$this->Session->read("AuthUser.User.id")) { ?>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav pull-right">
				<li class="active"><a href="javascript:void(0);" title="Join As a Cook">Join As a Cook</a></li>
				<li><a href="javascript:void(0);" title="How it Works">How it Works</a></li>
				<li><a href="<?php echo SITE_LINK."login"; ?>" title="SIGN IN">SIGN IN</a></li>
				<li class="sign-up"><a href="<?php echo SITE_LINK."signup"; ?>" title="SIGN UP  TODAY">SIGN UP  TODAY <span>Recieve fresh food tomorow</span></a></li>
			</ul>
		</div><!--/.nav-collapse -->
		<?php } else { ?>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav pull-right">
				<li><a href="javascript:void(0);" title="How it Works">How it Works</a></li>
				<li><a href="<?php echo SITE_LINK."dashboard"; ?>" title="SIGN UP  TODAY">Hello <?php echo $this->Session->read("AuthUser.Userdetail.first_name"); ?> </a>
				</li>
				<li><a href="<?php echo SITE_LINK."logout"; ?>">Logout</a></li>
			</ul>
		</div><!--/.nav-collapse -->
		<?php } ?>
	</div>
</div> 
<!-- /.navbar -->