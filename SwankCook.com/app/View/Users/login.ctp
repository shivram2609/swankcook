<?php echo $this->Form->create('User');  ?>
<div class="top-space login-container">
			<div class="login-inner">
			<h3 class="heading">Login</h3>
  			    <div class="tab-content">
				<div id="user" class="tab-pane fade in active">
					<div class="form-group">
						<?php echo $this->Form->input("email",array("div"=>false,"type"=>"text","placeholder"=>"Email", "class"=>"form-control cook-icn"));  ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('password',array("label"=>'Password',"type"=>'password',"div"=>false,"placeholder"=>"Password", "class"=>"form-control password-icn")); ?>
					</div>
					<div class="row">
						<div class="col-sm-6 form-group">
							<?php echo $this->Form->input("remember_me",array("type"=>"checkbox","label"=>"Remember Me")); ?>
						</div>
						<div class="col-sm-6 form-group text-right">
							<a href="<?php echo SITE_LINK."forgot-password" ?>" title="Forgot Password?">Forgot Password?</a>
						</div>
					</div>
					<div class="form-group text-right border-top">
						<a href="sign-up.html" title="SIGN UP">SIGN UP</a> <button title="Login" class="btn btn1">Login</button>
					</div>
                   
                    <div class="text-center border-top">
                     <div class="form-group clearfix"></div>
						<a href="<?php echo SITE_LINK."login_with_facebook" ?>" title="Login with Facebook" class="btn btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> &nbsp;Login with Facebook</a> &nbsp; <a href="<?php echo SITE_LINK."login_with_twitter" ?>" title="Login With Twitter" class="btn btn-info"><i class="fa fa-twitter" aria-hidden="true"></i> &nbsp;Login With Twitter</a>
					</div>
				 </div>
			</div>
			</div>
        </div>
<?php echo $this->Form->end(); ?>
<?php /*

<div class="login_outer">	
	<?php 
		echo $this->Form->create('User'); 
		echo $this->Session->flash(); 
		echo $this->Form->input("email",array("div"=>false,"type"=>"text","placeholder"=>"Email")); 
		echo $this->Form->input('password',array("label"=>'Password',"type"=>'password',"div"=>false,"placeholder"=>"Password")); 
	?>	
		<div class="input checkbox">
		<input id="UserRememberMe_" type="hidden" value="0" name="data[User][remember_me]">
		<input id="UserRememberMe" type="checkbox" value="1" name="data[User][remember_me]">
		<label class="lbl-login" for="UserRememberMe">Keep me logged in</label>
		</div>

<?php	echo $this->Form->submit(__d('label', 'LOGIN'));
		echo $this->Form->end();
	?>     
	<div class="login-as"><?php echo $this->Html->link(__('Forgot your Password?'), array('action' => 'forgotpassword')); ?></div>
	<div class="clear"></div>
</div> 

*/ ?>
