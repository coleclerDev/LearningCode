<?php 

$title = "Billet " . $_GET['id'];
ob_start();
?>

    <div class="row">
        <p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>
    </div>

    <div class="row card border-dark"> 
        <div class="card-header bg-dark text-white">
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['post_date_fr'] ?></em>
        </div>    
        <div class="card-body text-dark">
        <p class="card-text">
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
        </div>
    </div>

    <br />

    <h3>Commentaires</h3>

    <div class="row">

        <?php $actionform = 'addComment';
        $post_type = 'id=' . $post['billetId'];
        require('formCommentView.php'); ?>

    </div>
    <br />

    <?php while ($comment = $comments->fetch()) { ?>
        
        <div class="row card">
            <div class="card-header">  
                <strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> <a style="float: right;" href="index.php?action=modifyComment&amp;comment=<?= $comment['id'] ?>"> Modifier </a>
            </div>

            <div class="card-body">
                <?= nl2br(htmlspecialchars($comment['comment'])) ?>
            </div>
        </div>
        
    <?php } 

$content = ob_get_clean();

require('template.php');
?>
