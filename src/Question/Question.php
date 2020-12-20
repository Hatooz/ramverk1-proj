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
    public $created;

    public function createdAt() {
        $date = new \DateTime();
        $this->created = $date->getTimestamp();
    }

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
    public function findTopUsers() 
    {
        // $sql = 'select user, COUNT(*) from question group by user order by 2 desc;';
        $sql = 'select * from question;';
        $res = $this->db->select("user, COUNT(*)")
               ->from("Question")            
               ->groupBy("user")
               ->orderBy("2 desc")
               ->limit(10)
               ->execute()
               ->fetchAll();
        
        return $res;
    }
    public function findTopTags() 
    {
        // $sql = 'select user, COUNT(*) from question group by user order by 2 desc;';
        $sql = 'select * from tag;';
        $res = $this->db->select("title, COUNT(*)")
               ->from("Tag")            
               ->groupBy("title")
               ->orderBy("2 desc")
               ->limit(10)
               ->execute()
               ->fetchAll();
        
        return $res;
    }
    public function findLatestQuestions() 
    {
        // $sql = 'select user, COUNT(*) from question group by user order by 2 desc;';
        $sql = 'select * from tag;';
        $res = $this->db->select("*")
               ->from("Question")            
               ->groupBy("created")
               ->orderBy("2 asc")
               ->limit(10)
               ->execute()
               ->fetchAll();
        
        return $res;
    }
}
