<?php 

$title = "Modify Comment";
ob_start();

$actionform = 'modifyComment';
$post_type = 'comment=' . $_GET['comment'];

require('formCommentView.php');

$content = ob_get_clean();

require('template.php');
?>