<?php

include_once 'data-cls/comment.php';

$comment = new comment();



?>

<div class="row cmment-wrapp">
    <?php foreach ($comment->GetAllBiIdPage($_GET['id']) as $comment): ?>
    <div class="single-comment">
        <h3><?php echo $comment->person_name; ?></h3>
        <div class="comment">
            <?php echo  $comment->content;?>
        </div>
    </div>
    <?php endforeach; ?>
</div>

