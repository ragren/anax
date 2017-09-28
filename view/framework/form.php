<?php
$comments = $app->comment->fetch();
?>
<form method="post" action="<?=$app->url->create("comments/post")?>">
    <h4>Gravatar</h4>
    <input type="text" name="email">
    <h4>Inlägg</h4>
    <input type="text" name="text" size="40" style="height:5em">
    <input type="hidden" name="index"  value="<?= end($comments)["index"] + 1 ?>">
    <div style="padding-top:20px">
        <input type="submit" class="btn btn-default">
    </div>
</form>
