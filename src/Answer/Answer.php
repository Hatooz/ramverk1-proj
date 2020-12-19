<?php

namespace Hami\Answer;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class Answer extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Answer";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;    
    public $body;    
    public $user;
    public $question;
    public $comment;

    public function getComments(int $id) {
        $res = $this->db->select("*")
        ->from("Comment")
        ->where("answer = ?")
        ->execute([$id])
        ->fetchAll();
 
    return $res;
    }
}
