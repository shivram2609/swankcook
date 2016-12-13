<?php echo $this->Html->script("ckeditor/ckeditor"); ?>
<div class="cmsemails form">
<?php echo $this->Form->create('Cmsemail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cmsemail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('subject');
		echo $this->Form->input('emailfrom');
		echo $this->Form->input('content');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); echo $this->Html->link(__('Back'), array('action' => 'index'),array("class"=>"link")); ?>
</div>
<script>
$(document).ready(function() { CKEDITOR.replace( 'CmsemailContent'); });
</script>