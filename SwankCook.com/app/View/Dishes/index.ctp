<div class="dishes index">
	<h2><?php echo __('Dishes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cuisine_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('images'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('view_from'); ?></th>
			<th><?php echo $this->Paginator->sort('start_order_from'); ?></th>
			<th><?php echo $this->Paginator->sort('end_order_date'); ?></th>
			<th><?php echo $this->Paginator->sort('delivery_date'); ?></th>
			<th><?php echo $this->Paginator->sort('delivery_mode'); ?></th>
			<th><?php echo $this->Paginator->sort('is_deleted'); ?></th>
			<th><?php echo $this->Paginator->sort('is_locked'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dishes as $dish): ?>
	<tr>
		<td><?php echo h($dish['Dish']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dish['User']['id'], array('controller' => 'users', 'action' => 'view', $dish['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($dish['Cuisine']['id'], array('controller' => 'cuisines', 'action' => 'view', $dish['Cuisine']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($dish['Category']['name'], array('controller' => 'categories', 'action' => 'view', $dish['Category']['id'])); ?>
		</td>
		<td><?php echo h($dish['Dish']['name']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['description']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['images']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['price']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['view_from']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['start_order_from']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['end_order_date']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['delivery_date']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['delivery_mode']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['is_deleted']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['is_locked']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['status']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['created']); ?>&nbsp;</td>
		<td><?php echo h($dish['Dish']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dish['Dish']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dish['Dish']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dish['Dish']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dish['Dish']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Dish'), array('action' => 'add')); ?></li>
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
