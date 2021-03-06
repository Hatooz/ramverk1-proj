<?php

namespace Hami\Question\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Hami\Question\Question;
use Hami\Tag\Tag;

/**
 * Form to create an item.
 */
class CreateForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Psr\Container\ContainerInterface $di a service container
     */
    public function __construct(ContainerInterface $di)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Question details",
            ],
            [
                "title" => [
                    "type" => "text",
                    "validation" => ["not_empty"],
                ],
                "body" => [
                    "type" => "textarea",
                    "validation" => ["not_empty"],
                ],
                        
                "tag" => [
                    "type"      => "text",
                    "label"     => "Add as many tags as you like separated by a comma:",
                ],               

                "user" => [
                    "type" => "hidden",
                    "readonly" => true,
                    "value" => $this->di->session->get("loggedInUserName"),
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Create item",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return bool true if okey, false if something went wrong.
     */
    public function callbackSubmit() : bool
    {
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));
        $question->title  = $this->form->value("title");
        $question->body  = $this->form->value("body");
        $question->tag = $this->form->value("tag");
        $question->createdAt();
        
        $separateTags = explode(", ", $this->form->value("tag"));
        
        foreach ($separateTags as $newTag) {
            $tag = new Tag();
            $tag->setDb($this->di->get("dbqb"));
            $tag->title = $newTag;
            $tag->question = $this->form->value("title");            
            $tag->save();
        }


        $question->user = $this->form->value("user");
        $question->save();
        return true;
    }



    /**
     * Callback what to do if the form was successfully submitted, this
     * happen when the submit callback method returns true. This method
     * can/should be implemented by the subclass for a different behaviour.
     */
    public function callbackSuccess()
    {
        $this->di->get("response")->redirect("question")->send();
    }



    // /**
    //  * Callback what to do if the form was unsuccessfully submitted, this
    //  * happen when the submit callback method returns false or if validation
    //  * fails. This method can/should be implemented by the subclass for a
    //  * different behaviour.
    //  */
    // public function callbackFail()
    // {
    //     $this->di->get("response")->redirectSelf()->send();
    // }
}
