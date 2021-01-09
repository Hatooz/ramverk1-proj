<?php

namespace Anax\View;

?>

<h1><?= $user->username ?>'s profile</h1>

<img src="<?php echo $user->gravatar; ?>" alt="" />


<?php if (count($allQuestions) > 0) : ?> 
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
<?php endif; ?>

<?php if (count($allQuestions) == 0) : ?>
    <h2>You have no questions in this forum</h2>
<?php endif; ?>

<?php if (count($allAnswers) > 0) : ?> 
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
<?php endif; ?>

<?php if (count($allAnswers) == 0) : ?>
    <h2>You have no answers in this forum</h2>
<?php endif; ?>


<form action="" method="post">
    <input type="submit" name="logout" id="logout" value="Logout">
    <a class="detail-button" href="<?= url("user/update/{$user->id}"); ?>">Update profile</a>
</form>
