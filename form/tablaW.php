<?php
/**
 * Dashboard Administration Screen
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Bootstrap */
require_once('./admin.php');

/** Load WordPress dashboard API */
require_once(ABSPATH . 'wp-admin/includes/dashboard.php');



$title = __('Dashboard');


include (ABSPATH . 'wp-admin/admin-header.php');

	$link = mysql_connect('contactodb.cfmlmwuxja6y.us-west-2.rds.amazonaws.com', 'mtdgo', 'maldonado');
	if (!$link) {
	   die('Error conexion : ' . mysql_error());
	}

	// make foo the current db
	$db_selected = mysql_select_db('afileate', $link);
	if (!$db_selected) {
	   die ('Can\'t use foo : ' . mysql_error());
	}
	$result = mysql_query("SELECT * FROM afileate") or die(mysql_error());
?>

<div class="wrap">
<?php screen_icon(); ?>
	<style type="text/css" title="currentStyle">
		.sorting_asc{text-align:right; margin-right:10px; color:#797979;}
	</style>
	<h2>Reportes de afiliaciones.</h2>
	<div id="dashboard-widgets-wrap">
		<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
			@import "media/css/jquery-ui-1.8.17.custom.css";
		</style>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.js"></script>
	    <script type="text/javascript" src="media/js/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function() {
				$('#datatables').dataTable();
			});
		</script>
		<div id="container">
			<table cellpadding="0" cellspacing="0" border="0" id="datatables" class="display">
				<thead>
					<tr style="text-align:left;">
						<th>ID</th>
						<th>Nombre Completo</th>
						<th>Dirección</th>
						<th>E-mail</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while ($row = mysql_fetch_array($result)){
						?>
						<tr>
							<td><?=$row['idAfileacion']?></td>
							<td><?=$row['name']?></td>
							<td><?=$row['domicilio']?></td>
							<td><?=$row['email']?></td>		
						</tr>
						<?php
						}
					?>


				</tbody>
			</table>
		</div>	
<?php wp_dashboard(); ?>

<div class="clear"></div>
</div>
</div>

<?php require(ABSPATH . 'wp-admin/admin-footer.php'); ?>