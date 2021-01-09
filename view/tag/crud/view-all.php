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
$urlToCreate = url("tag/create");
$urlToDelete = url("tag/delete");

?><h1>View all items</h1>


<?php if (!$items) : ?>
    <p>There are no items to show.</p>
<?php
    return;
endif;
?>

<table class="crud-table">
    <tr>        
        <th>Title</th>
        <th>Tagged Question</th>
    </tr>
    <?php foreach ($items as $item) : ?>
    <tr>        
        <td><?= $item->title ?></td>
        <td><a href="<?= url("question/details/{$item->questionId}"); ?>"><?= $item->question ?></a></td>
    </tr>
    <?php endforeach; ?>
</table>
