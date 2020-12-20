<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

// Create urls for navigation
$urlToCreate = url("question/create");
$urlToDelete = url("question/delete");

// var_dump($topusers);
// var_dump($toptags);
// var_dump($c);

$currentUser = $this->di->session->get("loggedInUserName");
?>

<p>
    <a class="detail-button" href="<?= $urlToCreate ?>">Post New Question</a>
    
</p>

<?php if (!$items) : ?>
    <p>There are no items to show.</p>
<?php
    return;
endif;
?>

<h1>Top Users</h1>
<table class="crud-table">

    <tr>
        <th>Email</th>
        
        
    </tr>
    <?php foreach ($topusers as $user) : ?>
    <tr>
        <td>
            <a href="<?= url("user/contributions/{$user->user}"); ?>"><?= $user->user ?></a>
        </td>
        
        
    </tr>
    <?php endforeach; ?>
</table>

<h1>Top Tags</h1>
<table class="crud-table">
    <tr>
       
        <th>Title</th>
        
    </tr>
    <?php foreach ($toptags as $item) : ?>
    <tr>
        <td>
            <a href="<?= url("question/tags/{$item->title}"); ?>"><?= $item->title ?></a>
        </td>
    
    </tr>
    <?php endforeach; ?>
</table>

<h1>Most Recent Questions</h1>
<table class="crud-table">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Tag</th>
        <th>User</th>
    </tr>
    <?php foreach ($latestQuestions as $item) : ?>
    <tr>
        <td>
            <a href="<?= url("question/details/{$item->id}"); ?>"><?= $item->id ?></a>
        </td>
        <td><?= $item->title ?></td>
        <td><?= $item->tag ?></td>
        <td><?= $item->user ?></td>
    </tr>
    <?php endforeach; ?>
</table>
