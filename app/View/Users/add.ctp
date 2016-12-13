<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('user_type_id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('registeration_type');
		echo $this->Form->input('password_token');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List User Types'), array('controller' => 'user_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Type'), array('controller' => 'user_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cook Ratings'), array('controller' => 'cook_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cook Rating'), array('controller' => 'cook_ratings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dish Ratings'), array('controller' => 'dish_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Rating'), array('controller' => 'dish_ratings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Track Orders'), array('controller' => 'track_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track Order'), array('controller' => 'track_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Details'), array('controller' => 'user_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Detail'), array('controller' => 'user_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
