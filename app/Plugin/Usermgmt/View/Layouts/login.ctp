<?php
/**
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
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="GSK - Gestor de Citas" name="description"/>
	<meta content="Areté Software" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<?php
		echo $this->Html->css(array(
			'style1/font-awesome/font-awesome.min',
			'style1/simple-line-icons/simple-line-icons.min',
			'style1/bootstrap/bootstrap.min',
			'style1/uniform/uniform.default'
			));
	?>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<?php
		echo $this->Html->css(array(
			'style1/select2/select2',
			'style1/select2/select2-bootstrap',
			'style1/admin/pages/login-soft',
			'style1/gritter/jquery.gritter'
			));
	?>
<!-- END PAGE LEVEL PLUGIN STYLES -->

<!-- BEGIN PAGE STYLES -->
	<?php
		echo $this->Html->css(array(
			'style1/pages/tasks'
			));
	?>
<!-- END PAGE STYLES -->

<!-- BEGIN THEME STYLES -->
	<?php
		echo $this->Html->css(array(
			'style1/components',
			'style1/plugins',
			'style1/admin/layout/layout',
			'style1/admin/layout/custom'
			));

		echo $this->Html->css('style1/admin/layout/themes/default', '', array('id' => 'style_color') );
	?>
<!-- END THEME STYLES -->

	<?php
		echo $this->Html->meta('icon');

		/* Bootstrap CSS */
		//echo $this->Html->css('bootstrap/bootstrap.css?q='.QRDN);
		
		/* Usermgmt Plugin CSS */
		echo $this->Html->css('/usermgmt/css/umstyle.css?q='.QRDN);
		
		/* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
		echo $this->Html->css('/plugins/bootstrap-datepicker/css/datepicker3.css?q='.QRDN);

		/* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
		echo $this->Html->css('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css?q='.QRDN);
		
		/* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
		echo $this->Html->css('/plugins/chosen/chosen.css?q='.QRDN);

		//Jquery
		echo $this->Html->script('jquery-1.11.1.min');

		/* Bootstrap JS */
		//echo $this->Html->script('bootstrap/bootstrap.js?q='.QRDN);

		/* Bootstrap Datepicker is taken from https://github.com/eternicode/bootstrap-datepicker */
		echo $this->Html->script('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js?q='.QRDN);

		/* Bootstrap Datepicker is taken from https://github.com/smalot/bootstrap-datetimepicker */
		echo $this->Html->script('/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js?q='.QRDN);
		
		/* Bootstrap Typeahead is taken from https://github.com/biggora/bootstrap-ajax-typeahead */
		echo $this->Html->script('/plugins/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js?q='.QRDN);
		
		/* Chosen is taken from https://github.com/harvesthq/chosen/releases/ */
		echo $this->Html->script('/plugins/chosen/chosen.jquery.min.js?q='.QRDN);

		/* Usermgmt Plugin JS */
		echo $this->Html->script('/usermgmt/js/umscript.js?q='.QRDN);
		echo $this->Html->script('/usermgmt/js/ajaxValidation.js?q='.QRDN);

		echo $this->Html->script('/usermgmt/js/chosen/chosen.ajaxaddition.jquery.js?q='.QRDN);


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<?= $this->Html->link( $this->Html->image('style1/admin/layout/logo-big.png', array('alt' => 'GSK') ), '#', array('escape' => false) ); ?>
	</div>
	<!-- END LOGO -->
	<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	<div class="menu-toggler sidebar-toggler">
	</div>
	<!-- END SIDEBAR TOGGLER BUTTON -->

	<!-- BEGIN LOGIN -->
	<div class="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->element('Usermgmt.message'); ?>
		<?php echo $this->element('Usermgmt.message_validation'); ?>

		<?php echo $this->fetch('content'); ?>
	</div>
	<!-- END LOGIN -->

	<!-- BEGIN COPYRIGHT -->
	<div class="copyright">
		 2014 &copy; Areté Software
	</div>
	<!-- END COPYRIGHT -->

	<?php //echo $this->element('sql_dump'); ?>

<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<?php
	echo $this->Html->script(array(
		'style1/respond.min',
		'style1/excanvas.min'
		));
?>
<![endif]-->

<?php
	echo $this->Html->script(array(
		'style1/jquery-migrate-1.2.1.min',
		'style1/jquery-ui/jquery-ui-1.10.3.custom.min',
		'style1/bootstrap/bootstrap.min',
		'style1/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min',
		'style1/jquery-slimscroll/jquery.slimscroll',
		'style1/jquery.blockui.min',
		'style1/jquery.cokie.min',
		'style1/uniform/jquery.uniform.min',
		'style1/gritter/jquery.gritter.min'
		));
?>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php
	echo $this->Html->script(array(
		'style1/backstretch/jquery.backstretch.min',
		'style1/select2/select2.min'
		));
?>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php
	echo $this->Html->script(array(
		'style1/metronic',
		'style1/admin/layout/layout',
		'style1/admin/pages/login-soft'
		));
?>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Login.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
</html>
