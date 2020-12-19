<?php

namespace Anax\View;

/**
 * View to create a new book.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$item = isset($item) ? $item : null;
// var_dump($form);
// var_dump($answers);
// var_dump($comments);
// var_dump($showcomments);
// var_dump($commentsAnswer);

// Create urls for navigation
$urlToView = url("question");
$urlToAnswer = url("answer/create");
$urlToComment = url("comment/create");



?>
<h1><?= $question->title ?></h1>

<div class="question">
Tags: <?php foreach ($tag as $tag) : ?>   
    <a href="<?= url("question/tags/{$tag}"); ?>"><?= $tag ?></a>
<?php endforeach; ?> 

<h4>Question by <?= $question->user ?></h4>


<p><?= $body ?></p>

    <?php if ($showcomments) : ?> 
    <div class="comments">
        <b>Comments</b>
        <?php foreach ($comments as $key => $comment) : ?>
        
        <p><?= $comment->body ?></p>
        

        <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <form  class="detail-buttons" action="" method="post">
        <input class="detail-button" type="submit" name="doShowComments" id="doShowComments" value="Show/Hide comments">
        <a class="detail-button" href="<?= $urlToView ?>">View all</a>
        <a class="detail-button" href="<?= $urlToAnswer ?>">Answer</a>
        <a class="detail-button" href="<?= $urlToComment ?>">Comment</a>
    </form>
 
</div>



<?php foreach ($answers as $key => $answer) : ?>
   
    <div class="answer">
        <h4>Answer by <?= $answer->user ?></h4>
        <p><?= $answer->body ?></p>
    
        <?php if ($showcomments) : ?> 
            <div class="comments">
            <b>Comments</b>
            <?php foreach ($answer->comment as $key => $comment) : ?>
            <p><?= $comment->body ?></p>
            <?php endforeach; ?></h6>
            </div>
        <?php endif; ?>
        <form  class="detail-buttons" action="" method="post">
        <a href="<?= url("comment/create/{$answer->id}"); ?>">Comment</a>
    </form>
     
       </div>

<?php endforeach; ?> 




