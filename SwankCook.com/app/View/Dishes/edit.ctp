<div class="dishes form">
<?php echo $this->Form->create('Dish'); ?>
	<fieldset>
		<legend><?php echo __('Edit Dish'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('cuisine_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('images');
		echo $this->Form->input('price');
		echo $this->Form->input('view_from');
		echo $this->Form->input('start_order_from');
		echo $this->Form->input('end_order_date');
		echo $this->Form->input('delivery_date');
		echo $this->Form->input('delivery_mode');
		echo $this->Form->input('is_deleted');
		echo $this->Form->input('is_locked');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Dish.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Dish.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuisines'), array('controller' => 'cuisines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuisine'), array('controller' => 'cuisines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dish Ratings'), array('controller' => 'dish_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Rating'), array('controller' => 'dish_ratings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
