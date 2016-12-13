<div class="locations view">
<h2><?php echo __('Location'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($location['Location']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($location['Location']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($location['Location']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($location['Location']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location'), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location'), array('action' => 'delete', $location['Location']['id']), array(), __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Details'), array('controller' => 'user_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Detail'), array('controller' => 'user_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related User Details'); ?></h3>
	<?php if (!empty($location['UserDetail'])): ?>
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
	<?php foreach ($location['UserDetail'] as $userDetail): ?>
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
