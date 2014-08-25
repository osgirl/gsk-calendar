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
 * @package       Cake.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
			<?php echo __d('cake_dev', 'Database Error'); ?>
			</h3>
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<?= $this->Html->link(__('Inicio'), '/'); ?>
				</li>
			</ul>
			<!-- END PAGE TITLE & BREADCRUMB-->
		</div>
	</div>
	<!-- END PAGE HEADER-->
	<!-- BEGIN PAGE CONTENT-->
	<div class="row">
		<div class="col-md-12 page-404">

			<p class="error">
				<strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
				<?php echo $message; ?>
			</p>
			<?php if (!empty($error->queryString)) : ?>
				<p class="notice">
					<strong><?php echo __d('cake_dev', 'SQL Query'); ?>: </strong>
					<?php echo h($error->queryString); ?>
				</p>
			<?php endif; ?>
			<?php if (!empty($error->params)) : ?>
					<strong><?php echo __d('cake_dev', 'SQL Query Params'); ?>: </strong>
					<?php echo Debugger::dump($error->params); ?>
			<?php endif; ?>
			<p class="notice">
				<strong><?php echo __d('cake_dev', 'Notice'); ?>: </strong>
				<?php echo __d('cake_dev', 'If you want to customize this error message, create %s', APP_DIR . DS . 'View' . DS . 'Errors' . DS . 'pdo_error.ctp'); ?>
			</p>
			<?php echo $this->element('exception_stack_trace'); ?>
			
		</div>
	</div>
	<!-- END PAGE CONTENT-->

<h2></h2>

