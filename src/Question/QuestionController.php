<?php

namespace Hami\Question;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Hami\Answer\Answer;
use Hami\MyTextFilter\MyTextFilter;
use Hami\Question\HTMLForm\CreateForm;
use Hami\Question\HTMLForm\EditForm;
use Hami\Question\HTMLForm\DeleteForm;
use Hami\Question\HTMLForm\UpdateForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class QuestionController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var $data description
     */
    //private $data;



    // /**
    //  * The initialize method is optional and will always be called before the
    //  * target method/action. This is a convienient method where you could
    //  * setup internal properties that are commonly used by several methods.
    //  *
    //  * @return void
    //  */
    // public function initialize() : void
    // {
    //     ;
    // }



    /**
     * Show all items.
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));

        $page->add("question/crud/view-all", [
            "items" => $question->findAll(),
        ]);

        return $page->render([
            "title" => "A collection of items",
        ]);
    }
    /**
     * Show one question.
     *
     * @return object as a response object
     */
    public function detailsActionGet(int $id) : object
    {
        $page = $this->di->get("page");
        $filter = new MyTextFilter();
        
        $question = new Question();
        $question->setDb($this->di->get("dbqb"));

        $answers = new Answer();
        $answers->setDb($this->di->get("dbqb"));

        $resAnswers = $answers->findAllWhere("question = ?", $id);


        $res = $question->find("id", $id);
        $body = $filter->markdown($res->body);
        $page->add("question/crud/details", [
            "question" => $res,
            "body" => $body,
            "tag" => explode(",",$res->tag),
            "items" => $res,
            "answers" => $resAnswers,
        ]);

        $this->di->session->set("currentQuestion", $res->id);

        return $page->render([
            "title" => "Details",
        ]);
    }

    public function tagsActionGet(string $tag) : object
    {
        $page = $this->di->get("page");
        $question = new Question();        
        $question->setDb($this->di->get("dbqb"));
        $res = $question->findAllWhere("tag like ?", "%$tag%");
        
        $page->add("question/crud/tags", [           
            "items" => $res,
        ]);

        return $page->render([
            "title" => "tags",
        ]);
    }



    /**
     * Handler with form to create a new item.
     *
     * @return object as a response object
     */
    public function createAction() : object
    {
        $page = $this->di->get("page");
        $form = new CreateForm($this->di);
        $form->check();

        $page->add("question/crud/create", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Create a item",
        ]);
    }



    /**
     * Handler with form to delete an item.
     *
     * @return object as a response object
     */
    public function deleteAction() : object
    {
        $page = $this->di->get("page");
        $form = new DeleteForm($this->di);
        $form->check();

        $page->add("question/crud/delete", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Delete an item",
        ]);
    }



    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function updateAction(int $id) : object
    {
        $page = $this->di->get("page");
        $form = new UpdateForm($this->di, $id);
        $form->check();

        $page->add("question/crud/update", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Update an item",
        ]);
    }
}
