<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['UserType']['id'], array('controller' => 'user_types', 'action' => 'view', $user['UserType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registeration Type'); ?></dt>
		<dd>
			<?php echo h($user['User']['registeration_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password Token'); ?></dt>
		<dd>
			<?php echo h($user['User']['password_token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Cook Ratings'); ?></h3>
	<?php if (!empty($user['CookRating'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cook Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Reviews'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['CookRating'] as $cookRating): ?>
		<tr>
			<td><?php echo $cookRating['id']; ?></td>
			<td><?php echo $cookRating['cook_id']; ?></td>
			<td><?php echo $cookRating['user_id']; ?></td>
			<td><?php echo $cookRating['rating']; ?></td>
			<td><?php echo $cookRating['reviews']; ?></td>
			<td><?php echo $cookRating['status']; ?></td>
			<td><?php echo $cookRating['created']; ?></td>
			<td><?php echo $cookRating['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cook_ratings', 'action' => 'view', $cookRating['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cook_ratings', 'action' => 'edit', $cookRating['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cook_ratings', 'action' => 'delete', $cookRating['id']), array(), __('Are you sure you want to delete # %s?', $cookRating['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cook Rating'), array('controller' => 'cook_ratings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Dish Ratings'); ?></h3>
	<?php if (!empty($user['DishRating'])): ?>
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
	<?php foreach ($user['DishRating'] as $dishRating): ?>
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
	<h3><?php echo __('Related Dishes'); ?></h3>
	<?php if (!empty($user['Dish'])): ?>
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
	<?php foreach ($user['Dish'] as $dish): ?>
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
<div class="related">
	<h3><?php echo __('Related Track Orders'); ?></h3>
	<?php if (!empty($user['TrackOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Order Status Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['TrackOrder'] as $trackOrder): ?>
		<tr>
			<td><?php echo $trackOrder['id']; ?></td>
			<td><?php echo $trackOrder['user_id']; ?></td>
			<td><?php echo $trackOrder['order_id']; ?></td>
			<td><?php echo $trackOrder['order_status_id']; ?></td>
			<td><?php echo $trackOrder['created']; ?></td>
			<td><?php echo $trackOrder['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'track_orders', 'action' => 'view', $trackOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'track_orders', 'action' => 'edit', $trackOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'track_orders', 'action' => 'delete', $trackOrder['id']), array(), __('Are you sure you want to delete # %s?', $trackOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Track Order'), array('controller' => 'track_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related User Details'); ?></h3>
	<?php if (!empty($user['UserDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UserDetail'] as $userDetail): ?>
		<tr>
			<td><?php echo $userDetail['id']; ?></td>
			<td><?php echo $userDetail['user_id']; ?></td>
			<td><?php echo $userDetail['location_id']; ?></td>
			<td><?php echo $userDetail['title']; ?></td>
			<td><?php echo $userDetail['first_name']; ?></td>
			<td><?php echo $userDetail['last_name']; ?></td>
			<td><?php echo $userDetail['details']; ?></td>
			<td><?php echo $userDetail['created']; ?></td>
			<td><?php echo $userDetail['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_details', 'action' => 'view', $userDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_details', 'action' => 'edit', $userDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_details', 'action' => 'delete', $userDetail['id']), array(), __('Are you sure you want to delete # %s?', $userDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Detail'), array('controller' => 'user_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
