<div class="categories form">
<?php echo $this->Form->create('Category',array("novalidate"=>false)); ?>
	<fieldset>
		<legend><?php echo __('Edit Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('status',array("label"=>"Active"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); echo $this->Html->link(__('Back'), array('action' => 'index'),array("class"=>"link")); ?>
</div>