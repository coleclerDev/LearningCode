<form class="col-md-4" action="index.php?action=<?= $actionform ?>&amp;<?= $post_type ?>" method="post">

    <div class="form-group">
        <label for="author">Auteur</label><br />
        <input class="form-control" type="text" id="author" name="author" value="<?= $comment['author'] ?>" />
    </div>

    <div class="form-group">
        <label for="comment">Commentaire</label><br />
        <textarea class="form-control" id="comment" name="comment"><?= $comment['comment'] ?></textarea>
    </div>

    <div>
        <input class="btn btn-primary" type="submit" />
    </div>

</form>