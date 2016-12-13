<div class="categories form">
<?php echo $this->Form->create('Category',array("novalidate"=>true)); ?>
	<fieldset>
		<legend><?php echo __('Add Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('status',array("label"=>"Active"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); 
echo $this->Html->link(__('Back'), array('action' => 'index'),array("class"=>"link")); ?>
</div>
