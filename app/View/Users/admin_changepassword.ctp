<?php echo $this->Html->script('admin/changepassword');?>
<div class="users index">
    <div class="public-profile">
<div class="signin-outer">
<section class="sign-in">
		<?php //echo $this->Session->flash(); ?>
		<!--<h1><em class="signin-signup-icn"></em><?php echo 'CHANGE PASSWORD'; ?></h1>-->

		<?php 
			echo $this->Form->create('User',array("id"=>'changepassword'));
		?>
		<fieldset>
		<legend><?php echo ('Change Password'); ?></legend>
		
		<div class="fields">
			<?php echo $this->Form->input("currentpassword",array("type"=>'password',"id"=>'CurrentPassword','placeholder'=>"Current Password",'value'=>'','class'=>'form-control','div'=>false,'label'=>false)); ?>

		</div>	

		<div class="fields">
			<?php echo $this->Form->input("newpassword",array("type"=>'password',"id"=>'UserPassword','placeholder'=>"New Password",'value'=>'','class'=>'form-control','div'=>false ,'label'=>false)); ?>
		</div>	

		<div class="fields">
			<?php echo $this->Form->input("confirmpassword",array("type"=>'password',"id"=>'UserRetypePassword','placeholder'=>"Confirm Password",'value'=>'','class'=>'form-control','div'=>false,'label'=>false)); ?>
		</div>	
       </fieldset>
		<!-- =====Button section start===== -->
		<div class="signup-signin-btn">
			<?php echo $this->Form->Submit('SUBMIT',array("class"=>"button","title"=>"Submit",'div'=>false)); ?>
			<?php echo $this->Html->link('cancel', array('controller' => 'users', 'action' => 'dashboard'),array('class'=>'btn cancel-btn',"title"=>"Cancel"));  ?>
			<?php echo $this->Form->end();?>	
		</div>
		
</section>
</div>
</div>
</div>
