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
var_dump($answers);

// Create urls for navigation
$urlToView = url("question");
$urlToAnswer = url("answer/create");



?><h1><?= $question->title ?></h1>
<h6>Tags: <?php foreach ($tag as $tag) : ?>
   
    <a href="<?= url("question/tags/{$tag}"); ?>"><?= $tag ?></a>
   

<?php endforeach; ?></h6>


<p><?= $body ?></p>


<h6><?php foreach ($answers as $key => $answer) : ?>
   
   <p><?= $answer->body ?></p>
  

<?php endforeach; ?></h6>

<p>
    <a href="<?= $urlToView ?>">View all</a>
    <a href="<?= $urlToAnswer ?>">Answer</a>
</p>
