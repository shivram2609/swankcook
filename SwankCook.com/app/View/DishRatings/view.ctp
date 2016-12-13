<div class="dishRatings view">
<h2><?php echo __('Dish Rating'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dishRating['DishRating']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dish'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dishRating['Dish']['name'], array('controller' => 'dishes', 'action' => 'view', $dishRating['Dish']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dishRating['User']['id'], array('controller' => 'users', 'action' => 'view', $dishRating['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($dishRating['DishRating']['rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reviews'); ?></dt>
		<dd>
			<?php echo h($dishRating['DishRating']['reviews']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($dishRating['DishRating']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dishRating['DishRating']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dishRating['DishRating']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dish Rating'), array('action' => 'edit', $dishRating['DishRating']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dish Rating'), array('action' => 'delete', $dishRating['DishRating']['id']), array(), __('Are you sure you want to delete # %s?', $dishRating['DishRating']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dish Ratings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish Rating'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
