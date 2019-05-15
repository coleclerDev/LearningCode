<?php 

$title = "Erreur";
ob_start();

?>

<div class="container">
	<br />
	<br />
	<br />
	<div class="row justify-content-md-center">
		<div class="col-md-auto">	
			<img src="public/images/img_error_not_found.jpg" class="img-fluid" alt="img_error_not_found">
		</div>		
	</div>
	<div class="row justify-content-md-center">
		<div class="col-md-auto">	
			<h1> <?= htmlspecialchars($errorMessage) ?> </h1>
		</div>		
	</div>
</div>


<?php

$content = ob_get_clean();

require('template.php');
?>


