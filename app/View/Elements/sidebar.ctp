<?php
$here = $this->params;

$plugin = strtolower($here['plugin']);
$controller = strtolower($here['controller']);
$action = strtolower($here['action']);

$target = $controller."_".$action;

//selected
$selected = "";
$active = "";

//debug("Plugin: ".$plugin." Controller: ".$controller." Action: ".$action);

?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<ul class="page-sidebar-menu" data-auto-scroll="false" data-auto-speed="200">
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			<li class="sidebar-toggler-wrapper">
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				<div class="sidebar-toggler">
				</div>
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			</li>
			<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
			<li class="sidebar-search-wrapper hidden-xs">
				<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
				<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
				<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
				<form class="sidebar-search" action="#" method="POST">
					<a href="javascript:;" class="remove">
					</a>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
						<!-- DOC: value=" ", that is, value with space must be passed to the submit button -->
						<input class="btn submit" type="button" type="button" value=" "/>
						</span>
					</div>
				</form>
				<!-- END RESPONSIVE QUICK SEARCH FORM -->
			</li>

			<?php if($action == "dashboard") { $selected = "selected"; } ?>
			<li class="start <?= $action == "dashboard" ? "active" : ""; ?>">
				<?= $this->Html->link('<i class="fa fa-home"></i><span class="title">Tablero</span><span class="'.$selected.'"></span>', '/dashboard', array('escape' => false)); ?>
			</li>

<?php
if( $this->UserAuth->isAdmin() ) {
	$active = "";
	$selected = "";
	$actions = array("adduser", "edituser", "changeuserpassword", "viewuserpermissions", "index", "online", "addgroup", "sendtouser");
	if($controller == "users" || $controller == "useremails" || $controller == "usergroups" || $controller == "usergrouppermissions" || $controller == "user_group_permissions") {
		if( in_array($action, $actions) ) {
			$selected = "selected";
			$active = "active";
		}
	}
?>
			<li class="<?= $active; ?>">
				<?= $this->Html->link('<i class="fa fa-home"></i><span class="title">Usuarios</span><span class="'.$selected.'"></span>', 'javascript:;', array('escape' => false)); ?>
				<ul class="sub-menu">
					<li class="<?= $target == "users_index" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Ver todos', '/usermgmt/Users', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "users_adduser" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Agregar Nuevo', '/usermgmt/Users/addUser', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "users_online" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Usuarios Online', '/usermgmt/Users/online', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "usergroups_index" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Grupos', '/usermgmt/UserGroups', array('escape' => false)); ?>
					</li>
					<?php
					$mixed = array("usergrouppermissions_index", "user_group_permissions_index");
					?>
					<li class="<?= in_array($controller."_".$action, $mixed) ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Permisos de grupos', '/usermgmt/UserGroupPermissions', array('escape' => false)); ?>
					</li>
				</ul>
			</li>

<?php
	$active = "";
	$selected = "";
	$actions = array("index", "editsetting", "cakelog");
	if($controller == "usersettings") {
		if( in_array($action, $actions) ) {
			$selected = "selected";
			$active = "active";
		}
	}
?>
			<li class="<?= $active; ?>">
				<?= $this->Html->link('<i class="fa fa-cogs"></i><span class="title">Administracion</span><span class="'.$selected.'"></span>', 'javascript:;', array('escape' => false)); ?>
				<ul class="sub-menu">
					<?php $mixed = array("usersettings_index", "usersettings_editsetting"); ?>
					<li class="<?= in_array($controller."_".$action, $mixed) ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Configuracion general', '/usermgmt/UserSettings', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "usersettings_cakelog" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Cake Log', '/usermgmt/UserSettings/cakelog', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "users_deletecache" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Borrar Cache', '/usermgmt/Users/deleteCache', array('escape' => false)); ?>
					</li>
				</ul>
			</li>

<?php
	$active = "";
	$selected = "";
	$actions = array("index", "add", "edit", "delete");
	if($controller == "andenes") {
		if( in_array($action, $actions) ) {
			$selected = "selected";
			$active = "active";
		}
	}
?>
			<li class="<?= $active; ?>">
				<?= $this->Html->link('<i class="fa fa-cogs"></i><span class="title">Andenes</span><span class="'.$selected.'"></span>', 'javascript:;', array('escape' => false)); ?>
				<ul class="sub-menu">
					<li class="<?= $target == "andenes_index" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Ver andenes', '/andenes', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "andenes_add" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Agregar nuevo', '/andenes/add', array('escape' => false)); ?>
					</li>
				</ul>
			</li>

<?php
	$active = "";
	$selected = "";
	$actions = array("index", "add", "edit", "delete");
	if($controller == "calendarios") {
		if( in_array($action, $actions) ) {
			$selected = "selected";
			$active = "active";
		}
	}
?>
			<li class="<?= $active; ?>">
				<?= $this->Html->link('<i class="fa fa-cogs"></i><span class="title">Calendarios</span><span class="'.$selected.'"></span>', 'javascript:;', array('escape' => false)); ?>
				<ul class="sub-menu">
					<li class="<?= $target == "calendarios_index" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Ver calendarios', '/calendarios', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "calendarios_add" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Agregar nuevo', '/calendarios/add', array('escape' => false)); ?>
					</li>
				</ul>
			</li>

<?php
	$active = "";
	$selected = "";
	$actions = array("index", "add", "edit", "delete");
	if($controller == "citas") {
		if( in_array($action, $actions) ) {
			$selected = "selected";
			$active = "active";
		}
	}
?>
			<li class="<?= $active; ?>">
				<?= $this->Html->link('<i class="fa fa-cogs"></i><span class="title">Citas</span><span class="'.$selected.'"></span>', 'javascript:;', array('escape' => false)); ?>
				<ul class="sub-menu">
					<li class="<?= $target == "citas_index" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Ver Citas', '/citas', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "citas_add" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Agregar nueva', '/citas/add', array('escape' => false)); ?>
					</li>
				</ul>
			</li>

<?php
	$active = "";
	$selected = "";
	$actions = array("index", "add", "edit", "delete");
	if($controller == "vehiculos" || $controller == "horarios") {
		if( in_array($action, $actions) ) {
			$selected = "selected";
			$active = "active";
		}
	}
?>
			<li class="<?= $active; ?>">
				<?= $this->Html->link('<i class="fa fa-cogs"></i><span class="title">Ajustes</span><span class="'.$selected.'"></span>', 'javascript:;', array('escape' => false)); ?>
				<ul class="sub-menu">
					<li class="<?= $target == "vehiculos_index" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Ver vehiculos', '/vehiculos', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "vehiculos_add" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Nuevo vehículo', '/vehiculos/add', array('escape' => false)); ?>
					</li>
					<li class="<?= $target == "horarios_index" ? "active" : ""; ?>">
						<?= $this->Html->link('<i class="fa fa-home"></i> Ver horarios', '/horarios', array('escape' => false)); ?>
					</li>
				</ul>
			</li>
<?php
}
?>  
			<li class="last ">
				<?= $this->Html->link('<i class="fa fa-home"></i> Salir', '/logout', array('escape' => false)); ?>
			</li>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR -->