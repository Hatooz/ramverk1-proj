<?php

namespace Hami\Question;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class Question extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Question";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $title;
    public $body;
    public $tag;
    public $user;

    public function findQuestionsForUser($username) 
    {
       
        $res = $this->db->select("*")
               ->from("Question")
               ->where("user = ?")
               ->execute([$username])
               ->fetchAll();
        
        return $res;
    }

    public function findQuestionsForTag($tag) 
    {
       
        $res = $this->db->select("*")
               ->from("Question")
               ->where("title = ?")
               ->execute([$tag])
               ->fetchAll();
        
        return $res;
    }
}
