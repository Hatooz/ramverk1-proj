<?php

namespace Hami\Answer\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
use Hami\Answer\Answer;

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
                    "validation" => ["not_empty"],
                    "readonly" => true,
                    "value" => $this->di->session->get("currentQuestion")
                ],
                
                "user" => [
                    "type" => "hidden",
                    "readonly" => true,
                    "value" => $this->di->session->get("loggedInUserName"),
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Submit Answer",
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
        $answer = new Answer();
        $answer->setDb($this->di->get("dbqb"));
        $answer->body  = $this->form->value("body");
        $answer->question  = $this->form->value("question");
        $answer->user = $this->form->value("user");
        $answer->save();
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
