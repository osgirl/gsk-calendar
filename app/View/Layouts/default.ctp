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
			'style1/uniform/uniform.default',
			'style1/gritter/jquery.gritter'
			));
	?>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<?php
		echo $this->Html->css(array(
			'style1/bootstrap-daterangepicker/daterangepicker-bs3',
			'style1/fullcalendar/fullcalendar',
			'style1/jqvmap/jqvmap'
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
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<?= $this->Html->link( $this->Html->image('style1/admin/layout/logo.png', array('alt' => 'GSK', 'class' => 'logo-default') ), '#', array('escape' => false) ); ?>
				<div class="menu-toggler sidebar-toggler hide">
					<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
				</div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<div class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></div>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<?= $this->element('top_navigation'); ?>
		</div>
		<!-- END HEADER INNER -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<?= $this->element('sidebar'); ?>

		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<?php echo $this->Session->flash('success', array('params' => array('titulo' => 'Operación Exitosa'), 'element' => 'flash_gritter') ); ?>
			<?php echo $this->Session->flash('error', array('params' => array('titulo' => 'Error'), 'element' => 'flash_gritter') ); ?>
			<?php echo $this->element('Usermgmt.message'); ?>
			<?php echo $this->element('Usermgmt.message_validation'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<!-- END CONTENT -->
	</div>
	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
			 2014 &copy; Areté Software.
		</div>
		<div class="page-footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->

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
		'style1/bootstrap-daterangepicker/moment.min',
		'style1/bootstrap-daterangepicker/daterangepicker',
		'style1/jquery-easypiechart/jquery.easypiechart.min',
		'style1/jquery.sparkline.min',
		'style1/jquery.pulsate.min'
		));
?>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php
	echo $this->Html->script(array(
		'style1/metronic',
		'style1/admin/layout/layout',
		'style1/admin/pages/index',
		'style1/admin/pages/tasks'
		));
?>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Index.initIntro();   
   Index.initDashboardDaterange();
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Index.initIntro();
   Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
</html>
