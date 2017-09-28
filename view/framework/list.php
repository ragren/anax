<?php foreach ($comments as $comment) :
    $gravatar = "http://www.gravatar.com/avatar/" . md5(strtolower($comment["email"]));
?>
<hr>
<div>
    <img src="<?= $gravatar ?>">
    <h4><?= $comment["email"] ?></h4>
    <p><?= $app->textfilter->markdown($comment["text"]) ?></p>
    <div>
        <a href="<?= $app->url->create('comments/delete') . "/" . $comment["index"] ?>"><span>radera</span></a>
    </div>
</div>
<?php endforeach; ?>
