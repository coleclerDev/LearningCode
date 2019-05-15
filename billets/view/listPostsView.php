<?php $title = "Mon Super Blog !";
ob_start(); ?>


	<br />
	<div class="row">
		<a class="btn btn-primary" href="index.php?action=createPost">Nouveau billet </a>
	</div>
	<br />
	<br />

	<div class="row">
		<section class="table-responsive">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th class="col-md-8">Titre</th>
						<th class="col-md-4">Date</th>
					</tr>
            	</thead>
            	<tbody>
		
					<?php while ($data = $posts->fetch()) { ?>
						
					<tr>
						<td><a href="index.php?action=post&id=<?= $data['billetId']; ?>"> <?= htmlspecialchars($data['title']) ?> </a></td>
						<td> <?= htmlspecialchars($data['new_date']) ?> </td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
		</section>
	</div>

</div>

<?php 
$posts->closeCursor();

$content = ob_get_clean(); 

require('template.php');
?>

