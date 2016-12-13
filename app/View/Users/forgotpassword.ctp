<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create("User",array("novalidate"=>true)); ?>
<!-- SwankCook Signup Section-->
        <div class="top-space signup-container">
			<div class="login-inner">
			<h3 class="heading">Forgot Password</h3>
  			  
			  <div class="tab-content">
				<div id="cook-sign-up" class="tab-pane fade  in active">
					
					
					<?php if (isset($otp)) { ?>
						<div class="form-group">
							<?php echo $this->Form->input("otp",array("type"=>"text","maxlength"=>8,"class"=>"form-control email-icn","placeholder"=>"OTP", "label"=>false,"div"=>false)); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input("password",array("type"=>"password","maxlength"=>20,"class"=>"form-control password-icn","placeholder"=>"Password", "label"=>false,"div"=>false)); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input("confirmpassword",array("type"=>"password","maxlength"=>20,"class"=>"form-control password-icn","placeholder"=>"Confirm Password", "label"=>false,"div"=>false)); ?>
						</div>
					<?php } else { ?>
						<div class="form-group">
							<?php echo $this->Form->input("email",array("type"=>"text","maxlength"=>200,"class"=>"form-control email-icn","placeholder"=>"Email", "label"=>false,"div"=>false)); ?>
						</div>
					<?php } ?>
					<div class="form-group text-right border-top">
						<a href="<?php echo SITE_LINK."login"; ?>" title="Login">LOGIN</a> <button title="SUBMIT" class="btn btn1">SUBMIT</button>
					</div>
					
				</div>
				
				
			  </div>
			</div>
        </div>
        <!-- /SwankCook Signup Section-->
<?php echo $this->Form->end(); ?>