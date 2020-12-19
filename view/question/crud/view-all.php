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



$currentUser = $this->di->session->get("loggedInUserName");
?><h1>View all questions</h1>

<p>
    <a href="<?= $urlToCreate ?>">New Question</a>
    <!-- <a href="<?= $urlToDelete ?>">Delete</a> -->
</p>

<?php if (!$items) : ?>
    <p>There are no items to show.</p>
<?php
    return;
endif;
?>

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
