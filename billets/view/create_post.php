<?php 
$title = "Create Billet";
ob_start();
?>


<form action="index.php?action=createPost" method="post">
	<div class="form-group">
		<label> Titre : </label><br />
		<input class="form-control" type="string" name="title" />
	</div>

	<div class="form-group">
		<label> Contenu : </label><br />
		<textarea class="form-control" name="content" rows="10" cols="50"></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" />
	</div>
</form>

<?php

$content = ob_get_clean();
require('template.php');

?>