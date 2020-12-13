<?php

namespace Anax\View;

var_dump($allQuestions);
?><h1>View all items</h1>
 
 

<p><?= $user->username ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Body</th>
        <th>Tag</th>
        <th>User</th>
    </tr>
    <?php foreach ($allQuestions as $question) : ?>
    <tr>
        <td>
            <a href="<?= url("question/update/{$question->id}"); ?>"><?= $question->id ?></a>
        </td>
        <td><?= $question->body ?></td>
        <td><?= $question->tag ?></td>
        <td><?= $question->user ?></td>
    </tr>
    <?php endforeach; ?>
</table>
