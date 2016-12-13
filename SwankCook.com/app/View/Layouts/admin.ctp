<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6"><![endif]-->
<!--[if IE 7]><html class="no-js ie7"><![endif]-->
<!--[if IE 8]><html class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html class="ie9"> <![endif]-->
<!--[if !IE]><!--><script>  
if (/*@cc_on!@*/false) {  
    document.documentElement.className+=' ie10';  
}  
</script><!--<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class=""> <!--<![endif]-->

<head>
    <?php echo $this->Html->charset(); ?>
    <title>
		<?php echo "SwankCook"; ?>:
        <?php echo $title_for_layout; ?>
    </title>
    
    <?php    
    echo $this->Html->meta('icon');    
	echo $this->Html->css(array('admin/admin','admin/jquery-ui','admin/ui'));
    echo $this->Html->script(array('jquery-1.9.1','jquery.validate','admin/validate','validationmessages','additional-methods.min','jquery-ui'));
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <script type="text/javascript">			
		var DEFAULT_LINK = "<?php echo "http://".$_SERVER['SERVER_NAME'].$this->params->base."/"; ?>";		
		var BASE_URL = "<?php echo $this->base; ?>";
        var SITE_LINK = "<?php echo $this->base; ?>";
        var admin = 1;        
		  $(document).ready(function(){
			$("#flashMessage").fadeOut(8000);
			//jQuery('#userInfo').tablesorter(); 
           
	   });		
	</script>
	<?php ?>
</head>
<body>
    <div class="main_box">
        <?php echo $this->element("adminheader"); //include admin header  ?>
        <div id="container">
            <div id="content">
                <div id="userstatus" class="message status" style="display: none"></div>
                <?php echo $this->Session->flash(); ?>
                <?php
                // -- to set the design on login page
                if ($this->params['action'] == 'forgotpassword' || $this->params['action'] == 'login'|| $this->params['action'] == 'changepass')
                    $ContentId = '';
                else
                    $ContentId = 'content-for-layout';
                ?>

                <?php echo (empty($ContentId) ? '' : $this->element('adminleft')); ?>
                <div id="<?= $ContentId; ?>">
                   <?php echo $content_for_layout; ?>
                </div>
                
            </div>
        </div>
        <?php 
			  echo $this->element("adminfooter"); //include admin footer  ?>
        

    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>

</html>
