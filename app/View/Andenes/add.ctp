<div class="page-content">

<div class="row">
	<div class="col-md-12">

		<div class="portlet box blue ">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Agregar Nuevo Anden
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<?php echo $this->element('Usermgmt.ajax_validation', array('formId' => 'addAndenForm', 'submitButtonId' => 'addSubmitBtn')); ?>
				<?php echo $this->Form->create('Andene', array('inputDefaults' => array('label' => false, 'div' => false), 'id'=>'addAndenForm', 'class'=>'form-horizontal form-bordered form-row-stripped')); ?>
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Nombre</label>
							<div class="col-md-9">
								<?= $this->Form->input('name', array('placeholder' => 'Nombre', 'class' => 'form-control')); ?>
							</div>
						</div>
						<div class="form-group last">
							<label class="control-label col-md-3">Descripción</label>
							<div class="col-md-9">
								<?= $this->Form->input('description', array('placeholder' => 'Descripción', 'class' => 'form-control')); ?>
							</div>
						</div>
					</div>
					<div class="form-actions fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" id="addSubmitBtn" class="btn green"><i class="fa fa-check"></i> Agregar</button>
									<?= $this->Html->link('Cancelar', '/andenes', array('class' => 'btn default', 'escape' => false)); ?>
								</div>
							</div>
						</div>
					</div>
				<?php echo $this->Form->end(); ?>
				<!-- END FORM-->
			</div>
		</div>


	</div>
</div>
</div>