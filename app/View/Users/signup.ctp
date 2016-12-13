<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create("User",array("novalidate"=>true)); ?>
<!-- SwankCook Signup Section-->
        <div class="top-space signup-container">
			<div class="login-inner">
			<h3 class="heading">Sign Up</h3>
  			  <!-- ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#cook-sign-up"><img src=" img/cook-icon.png" alt="sign up as cook" width="32" height="37">sign up as cook</a></li>
				  <li><a data-toggle="tab" href="#user-sign-up"><img src=" img/user-icon.png" alt="sign up as user" width="34" height="37">sign up as user</a></li>				
				</ul --> 

			  <div class="tab-content">
				<div id="cook-sign-up" class="tab-pane fade  in active">
					<?php echo $this->Form->input("identifier",array("type"=>"hidden","div"=>false,"label"=>false)); ?>
					<?php echo $this->Form->input("provider",array("type"=>"hidden","div"=>false,"label"=>false)); ?>
					<div class="form-group">
						<?php echo $this->Form->input("name",array("type"=>"text","maxlength"=>100,"class"=>"form-control cook-icn","placeholder"=>"Name", "label"=>false,"div"=>false)); ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input("email",array("type"=>"text","maxlength"=>200,"class"=>"form-control email-icn","placeholder"=>"Email", "label"=>false,"div"=>false)); ?>
					</div>
					<?php if ( !isset($this->request->data['User']['identifier']) || empty($this->request->data['User']['identifier']) ) { ?>
						<div class="form-group">
							<?php echo $this->Form->input("password",array("type"=>"password","maxlength"=>20,"class"=>"form-control password-icn","placeholder"=>"Password", "label"=>false,"div"=>false)); ?>
						</div>
						<div class="form-group">
							<?php echo $this->Form->input("confirmpassword",array("type"=>"password","maxlength"=>20,"class"=>"form-control password-icn","placeholder"=>"Confirm Password", "label"=>false,"div"=>false)); ?>
						</div>
					<?php } ?>
					<div class="form-group">
						<?php echo $this->Form->input("phone",array("type"=>"text","maxlength"=>15,"class"=>"form-control phone-icn","placeholder"=>"Phone No", "label"=>false,"div"=>false)); ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input("user_type_id",array("options"=>array("2"=>"Cook","3"=>"Customer"),"empty"=>"Select Account Type","class"=>"form-control", "label"=>false,"div"=>false)); ?>
						
					</div>
					
					<div class="form-group text-right border-top">
						<a href="<?php echo SITE_LINK."login"; ?>" title="Login">LOGIN</a> <button title="SIGN UP" class="btn btn1">SIGN UP</button>
					</div>
					<div class="text-center border-top">
                     <div class="form-group clearfix"></div>
						<a href="<?php echo SITE_LINK."login_with_facebook" ?>" title="Login with Facebook" class="btn btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> &nbsp;Login with Facebook</a> &nbsp; <a href="<?php echo SITE_LINK."login_with_twitter" ?>" title="Login With Twitter" class="btn btn-info"><i class="fa fa-twitter" aria-hidden="true"></i> &nbsp;Login With Twitter</a>
					</div>

				</div>
				
				
			  </div>
			</div>
        </div>
        <!-- /SwankCook Signup Section-->
<?php echo $this->Form->end(); ?>