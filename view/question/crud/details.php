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



?><h1><?= $question->title ?></h1>
<h6>Tags: <?php foreach ($tag as $tag) : ?>
   
    <a href="<?= url("question/tags/{$tag}"); ?>"><?= $tag ?></a>
   

<?php endforeach; ?></h6>


<p><?= $body ?></p>

<div class="answer">
<h6><?php foreach ($answers as $key => $answer) : ?>
   

       <p><?= $answer->body ?></p>
    
       <?php if ($showcomments) : ?> 
       <?php foreach ($answer->comment as $key => $comment) : ?>
       <p><?= $comment->body ?></p>
       <?php endforeach; ?></h6>
       <?php endif; ?>
    
       <a href="<?= url("comment/create/{$answer->id}"); ?>">Comment</a>

   </div>

<?php endforeach; ?></h6>
 

<form action="" method="post">
    <input type="submit" name="doShowComments" id="doShowComments" value="Show/Hide comments">
</form>

<?php if ($showcomments) : ?> 

<h6><?php foreach ($comments as $key => $comment) : ?>
   
   <p><?= $comment->body ?></p>
  

<?php endforeach; ?></h6>
<?php endif; ?>

<p>
    <a href="<?= $urlToView ?>">View all</a>
    <a href="<?= $urlToAnswer ?>">Answer</a>
    <a href="<?= $urlToComment ?>">Comment</a>
</p>
 