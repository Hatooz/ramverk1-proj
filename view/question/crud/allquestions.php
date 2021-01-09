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

<h1>All Questions</h1>
<table class="crud-table">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Tag</th>
        <th>User</th>
    </tr>
    <?php foreach ($items as $item) : ?>
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
