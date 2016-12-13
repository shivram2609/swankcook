<style>
#flashMessage{ margin:auto; width:32%; margin-top:20px; float:none!important; background:#F2FFEA!important; border: 1px solid #49B727!important;}
</style>
<?php echo $this->Session->flash(); ?>

<div class="login_outer">
	<h1><?php echo __('Forgot your password') ?></h1>
<?php
echo $this->Form->create("User");
echo $this->Form->input("email",array("type"=>"text","div"=>false,"label"=>'Email',"autofocus"=>true,"class"=>"email"));
echo $this->Form->end("Submit");
?>
<div class="login-as"><?php echo $this->Html->link("Login",'/'); ?></div>
<div class="clear"></div>
</div>
