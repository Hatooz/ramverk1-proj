<?php

namespace Anax\View;

use DateTime;

// use Date;
// $email = "hatem.mohieldin@gmail.com";
// $default = "https://image.shutterstock.com/image-photo/picutre-royal-bengal-tiger-260nw-1422430673.jpg";
// $size = 40;
// $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
// function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
//     $url = 'https://www.gravatar.com/avatar/';
//     $url .= md5( strtolower( trim( $email ) ) );
//     $url .= "?s=$s&d=$d&r=$r";
//     if ( $img ) {
//         $url = '<img src="' . $url . '"';
//         foreach ( $atts as $key => $val )
//             $url .= ' ' . $key . '="' . $val . '"';
//         $url .= ' />';
//     }
//     return $url;
// }
// var_dump($allQuestions);
$date = new DateTime();
?>
<h1><?= $user->username ?>'s profile</h1>
<h1><?= date('Y/m/d', $user->created) ?>'s profile</h1>
<img src="<?php echo $user->gravatar; ?>" alt="" />
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

<form action="" method="post">
    <input type="submit" name="logout" id="logout" value="Logout">
    <a class="detail-button" href="<?= url("user/update/{$user->id}"); ?>">Update profile</a>
</form>
