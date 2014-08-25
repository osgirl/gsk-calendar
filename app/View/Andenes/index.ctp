<div class="page-content">

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet box red">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cogs"></i>Andenes
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="btn-group">
							<?= $this->Html->link('Agregar Nuevo <i class="fa fa-plus"></i>', '/andenes/add', array('class' => 'btn green', 'escape' => false)); ?>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-hover">
						<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Calendario</th>
							<th>Creador</th>
						</tr>
						</thead>
						<tbody>
						<?php
						//debug($andenes);
						if(!empty($andenes)) {
						$i =1;
						foreach($andenes as $item):
						?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $item['Andene']['name']; ?></td>
							<td><?= $item['Andene']['description']; ?></td>
							<td></td>
							<td><?= $item['Creator']['username']; ?></td>
						</tr>
						<?php
						endforeach;
						} else {
						?>
						<tr>
							<td colspan="5">No existen andenes por el momento.</td>
						</tr>
						<?php
						$i++;
						}
						?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- END SAMPLE TABLE PORTLET-->
		</div>
	</div>

</div>