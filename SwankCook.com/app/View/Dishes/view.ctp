<div class="dishes view">
<h2><?php echo __('Dish'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dish['User']['id'], array('controller' => 'users', 'action' => 'view', $dish['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cuisine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dish['Cuisine']['id'], array('controller' => 'cuisines', 'action' => 'view', $dish['Cuisine']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dish['Category']['name'], array('controller' => 'categories', 'action' => 'view', $dish['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Images'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['images']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('View From'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['view_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Order From'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['start_order_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Order Date'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['end_order_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivery Date'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['delivery_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivery Mode'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['delivery_mode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Deleted'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['is_deleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Locked'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['is_locked']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dish['Dish']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dish'), array('action' => 'edit', $dish['Dish']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dish'), array('action' => 'delete', $dish['Dish']['id']), array(), __('Are you sure you want to delete # %s?', $dish['Dish']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Dish Ratings'); ?></h3>
	<?php if (!empty($dish['DishRating'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dish Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Reviews'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dish['DishRating'] as $dishRating): ?>
		<tr>
			<td><?php echo $dishRating['id']; ?></td>
			<td><?php echo $dishRating['dish_id']; ?></td>
			<td><?php echo $dishRating['user_id']; ?></td>
			<td><?php echo $dishRating['rating']; ?></td>
			<td><?php echo $dishRating['reviews']; ?></td>
			<td><?php echo $dishRating['status']; ?></td>
			<td><?php echo $dishRating['created']; ?></td>
			<td><?php echo $dishRating['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'dish_ratings', 'action' => 'view', $dishRating['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'dish_ratings', 'action' => 'edit', $dishRating['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'dish_ratings', 'action' => 'delete', $dishRating['id']), array(), __('Are you sure you want to delete # %s?', $dishRating['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Dish Rating'), array('controller' => 'dish_ratings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($dish['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dish Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Payment'); ?></th>
		<th><?php echo __('Commission'); ?></th>
		<th><?php echo __('Is Paid'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dish['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['dish_id']; ?></td>
			<td><?php echo $order['quantity']; ?></td>
			<td><?php echo $order['payment']; ?></td>
			<td><?php echo $order['commission']; ?></td>
			<td><?php echo $order['is_paid']; ?></td>
			<td><?php echo $order['created']; ?></td>
			<td><?php echo $order['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), array(), __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
