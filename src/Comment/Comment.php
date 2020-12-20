<?php

namespace Hami\Comment;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class Comment extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Comment";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $body;
    public $user;
    public $question;
    public $answer;

    public function getUserGravatar(string $user) {
        $res = $this->db->select("*")
        ->from("User")
        ->where("username = ?")
        ->execute([$user])
        ->fetch();
        
 
        return $res->gravatar;
    }
}
