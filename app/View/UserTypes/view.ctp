<div class="userTypes view">
<h2><?php echo __('User Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userType['UserType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($userType['UserType']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($userType['UserType']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userType['UserType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userType['UserType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Type'), array('action' => 'edit', $userType['UserType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Type'), array('action' => 'delete', $userType['UserType']['id']), array(), __('Are you sure you want to delete # %s?', $userType['UserType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($userType['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Type Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Registeration Type'); ?></th>
		<th><?php echo __('Password Token'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userType['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['user_type_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['registeration_type']; ?></td>
			<td><?php echo $user['password_token']; ?></td>
			<td><?php echo $user['status']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
