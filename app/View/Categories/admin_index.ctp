<div class="categories index">
	<h2><?php echo __('Categories'); ?></h2>
	<?php echo $this->Form->create("Category",array("div"=>false,)); ?>
	<div class="srch">
		<?php echo $this->element("admins/common",array("place"=>'Search by Category name',"flag"=>false,"pageheader"=>'',"buttontitle"=>'no',"listflag"=>"no","action"=>'no')); ?>
		<div class="rhs_actions right">
			<?php echo $this->Html->link(__('Add Category'), array('action' => 'add')); ?>
		</div>
	</div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo $this->Form->input("id.".$category['Category']['id'],array("class"=>'chk',"value"=>$category['Category']['id'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?><?php echo $this->Form->input("status.".$category['Category']['id'],array("type"=>'hidden',"value"=>($category['Category']['status'] == 1?0:1))); ?></td>
		<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
		<td><?php echo h(empty($category['Category']['status'])?'Inactive':'Active'); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['created']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['name']))); ?>
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
	<?php $this->Form->end(); ?>
</div>
