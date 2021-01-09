<?php

namespace Hami\Tag;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model using the Active Record design pattern.
 */
class Tag extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Tag";



    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $title;
    public $question;


    public function getQuestion (string $title)
    {
        $res = $this->db->select("*")
        ->from("Question")
        ->where("title = ?")
        ->execute([$title])
        ->fetchAll();
 
 return $res;
    }
}
