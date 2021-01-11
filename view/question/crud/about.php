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


<h1>About</h1>


<p>This site is dedicated to all things related to cygwin. It is a forum where you can ask, discuss, write tips or generally talk about how awesome cygwin is. If you find this interesting and have some burning stuff you want to share about cygwin, please make your account and start sharing now!</p>

<p>You can find the git rep for this site [here](https://github.com/Hatooz/ramverk1-proj).</p>

<p>About me:<br>
My name is Hatem. I am a student at BTH university doing my second year on their webprogramming degree. This project is the culmination for the course about frameworks and how they work. This site is written in PHP using the Anax framework.</p>

