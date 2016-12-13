<div class="cuisines view">
<h2><?php echo __('Cuisine'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cuisine['Cuisine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($cuisine['Cuisine']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($cuisine['Cuisine']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cuisine['Cuisine']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cuisine['Cuisine']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cuisine'), array('action' => 'edit', $cuisine['Cuisine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cuisine'), array('action' => 'delete', $cuisine['Cuisine']['id']), array(), __('Are you sure you want to delete # %s?', $cuisine['Cuisine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuisines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuisine'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dishes'), array('controller' => 'dishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Dishes'); ?></h3>
	<?php if (!empty($cuisine['Dish'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cuisine Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Images'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('View From'); ?></th>
		<th><?php echo __('Start Order From'); ?></th>
		<th><?php echo __('End Order Date'); ?></th>
		<th><?php echo __('Delivery Date'); ?></th>
		<th><?php echo __('Delivery Mode'); ?></th>
		<th><?php echo __('Is Deleted'); ?></th>
		<th><?php echo __('Is Locked'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cuisine['Dish'] as $dish): ?>
		<tr>
			<td><?php echo $dish['id']; ?></td>
			<td><?php echo $dish['user_id']; ?></td>
			<td><?php echo $dish['cuisine_id']; ?></td>
			<td><?php echo $dish['category_id']; ?></td>
			<td><?php echo $dish['name']; ?></td>
			<td><?php echo $dish['description']; ?></td>
			<td><?php echo $dish['images']; ?></td>
			<td><?php echo $dish['price']; ?></td>
			<td><?php echo $dish['view_from']; ?></td>
			<td><?php echo $dish['start_order_from']; ?></td>
			<td><?php echo $dish['end_order_date']; ?></td>
			<td><?php echo $dish['delivery_date']; ?></td>
			<td><?php echo $dish['delivery_mode']; ?></td>
			<td><?php echo $dish['is_deleted']; ?></td>
			<td><?php echo $dish['is_locked']; ?></td>
			<td><?php echo $dish['status']; ?></td>
			<td><?php echo $dish['created']; ?></td>
			<td><?php echo $dish['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'dishes', 'action' => 'view', $dish['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'dishes', 'action' => 'edit', $dish['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'dishes', 'action' => 'delete', $dish['id']), array(), __('Are you sure you want to delete # %s?', $dish['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Dish'), array('controller' => 'dishes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
