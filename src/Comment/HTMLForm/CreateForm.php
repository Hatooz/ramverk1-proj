<?php

namespace Hami\Comment\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Hami\Comment\Comment;

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
                "legend" => "Details of the item",
            ],
            [                
                "body" => [
                    "type" => "textarea",
                    "validation" => ["not_empty"],
                ],
                
                "question" => [
                    "type" => "hidden",
                    // "validation" => ["not_empty"],
                    "readonly" => true,
                    "value" => $this->di->session->get("currentAnswer") ? null : $this->di->session->get("currentQuestion")
                ],
                "answer" => [
                    "type" => "hidden",
                    // "validation" => ["not_empty"],
                    "readonly" => true,
                    "value" => $this->di->session->get("currentAnswer")
                ],
                
                "user" => [
                    "type" => "hidden",
                    "readonly" => true,
                    "value" => $this->di->session->get("loggedInUserName"),
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Submit Comment",
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
        $comment = new Comment();
        $comment->setDb($this->di->get("dbqb"));
        $comment->body  = $this->form->value("body");
        $comment->question  = $this->form->value("question");
        $comment->answer  = $this->form->value("answer");
        $comment->user = $this->form->value("user");
        $comment->save();
        return true;
    }



    /**
     * Callback what to do if the form was successfully submitted, this
     * happen when the submit callback method returns true. This method
     * can/should be implemented by the subclass for a different behaviour.
     */
    public function callbackSuccess()
    {
        $goto = $this->di->session->get("currentQuestion");
        $this->di->get("response")->redirect("question/details/{$goto}")->send();
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
