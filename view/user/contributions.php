<?php

namespace Anax\View;

// var_dump($allQuestions);
// var_dump($user);
?>
<h1>Contributions by <?= $user->username ?></h1>

<table class="crud-table">
    <h2>Questions by <?= $user->username ?> </h2>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Tag</th>
        <th>User</th>
    </tr>
    <?php foreach ($allQuestions as $question) : ?>
    <tr>
        <td>
            <a href="<?= url("question/details/{$question->id}"); ?>"><?= $question->id ?></a>
        </td>
        <td><?= $question->title ?></td>
        <td><?= $question->tag ?></td>
        <td><?= $question->user ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<table class="crud-table">
    <h2>Answers by <?= $user->username ?> </h2>
    <tr>
        <th>Id</th>
        <th>Question Id</th>
        <th>Body</th>
    </tr>
    <?php foreach ($allAnswers as $answer) : ?>
    <tr>
        <td>
             <?= $answer->id ?> 
        </td>
        <td>
            <a href="<?= url("question/details/{$answer->question}"); ?>"><?= $answer->question ?></a>
        </td>
        
        
        <td><?= $answer->body ?></td>
    </tr>
    <?php endforeach; ?>
</table>

