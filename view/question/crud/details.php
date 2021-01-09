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

// Create urls for navigation
$urlToView = url("question");
$urlToAnswer = url("answer/create");
$urlToComment = url("comment/create");



?>

<h1><?= $question->title ?></h1>
<form  action="" method="post">
    <input class="detail-button" type="submit" name="doShowComments" id="doShowComments" value="Show/Hide comments">   
    <a class="detail-button question-buttons" href="<?= $urlToView ?>">Back to all questions</a>     
</form>

<div class="question">
Tags: <?php foreach ($tag as $tag) : ?>   
    <a class="tag" href="<?= url("question/tags/{$tag}"); ?>"><?= $tag ?></a>
<?php endforeach; ?> 

<h4>Question by <a class="" href="<?= url("user/contributions/{$question->user}"); ?>"><?= $question->user ?></a></h4>


<p><?= $body ?></p>

    <?php if ($showcomments) : ?> 
    <div class="comments">
        <b>Comments</b>
        <?php foreach ($comments as $key => $comment) : ?>
        
        <p><?= $comment->body ?> - by <a class="" href="<?= url("user/contributions/{$comment->user}"); ?>"><?= $comment->user ?></a></p>
        

        <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
   
        
    <a class="detail-button question-buttons" href="<?= $urlToComment ?>">Comment</a>
        <a class="detail-button question-buttons" href="<?= $urlToAnswer ?>">Answer</a>
</div>


<h1>Answers</h1>
<?php foreach ($answers as $key => $answer) : ?>
   
    <div class="answer">

        
        <p><?= $answer->body ?></p>
    
        <?php if ($showcomments) : ?> 
            <div class="comments">
            <b class="comment">Comments</b>
            <?php foreach ($answer->comment as $key => $comment) : ?>
             <div class="comment"> 
                <?= $comment->body ?>
                Comment by <a class="" href="<?= url("user/contributions/{$comment->user}"); ?>"><?= $comment->user ?></a>            
            </div>

            <?php endforeach; ?></h6>
            </div>
        <?php endif; ?>
        
    <div><a class="detail-button answer-button" href="<?= url("comment/create/{$answer->id}"); ?>">Comment</a></div>
        

        <div class="profile-bubble">
            Answer by <a class="" href="<?= url("user/contributions/{$answer->user}"); ?>"><?= $answer->user ?></a><br>
            <img class="detail-gravatar" src="<?php echo $answer->gravatar; ?>" alt="" />

        </div>
     
    </div>

<?php endforeach; ?> 




