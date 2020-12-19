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


var_dump($items);
 
?><h1>tags</h1>

<p>
    <a href="<?= $urlToCreate ?>">Create</a> | 
    <a href="<?= $urlToDelete ?>">Delete</a>
</p>

 
<table>
    <tr>
        <th>Id</th>
        <th>Body</th>
        <th>Tag</th>
        <th>User</th>
    </tr>
    <?php foreach ($items as $key => $item) : ?>
    <tr>
        <td>
            <a href="<?= url("question/details/{$item->id}"); ?>"><?= $item->id ?></a>
        </td>
        <td><?= $item->body ?></td>
        <td><?= $item->tag ?></td>
        <td><?= $item->user ?></td>
    </tr>
    <?php endforeach; ?>
</table>
