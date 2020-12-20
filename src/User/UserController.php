<?php

namespace Hami\User;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\User\User;
use Hami\Answer\Answer;
use Hami\Question\Question;
use Hami\User\HTMLForm\UserLoginForm;
use Hami\User\HTMLForm\CreateUserForm;
use Hami\User\HTMLForm\UpdateUserForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class UserController implements ContainerInjectableInterface
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
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $res = $user->findUser($this->di->session->get("loggedInUserName"));

        $questions = new Question();
        $questions->setDb($this->di->get("dbqb"));
        $allQuestions = $questions->findQuestionsForUser($res->username);

        $answers = new Answer();
        $answers->setDb($this->di->get("dbqb"));
        $allAnswers = $answers->findAllWhere("user = ?", $user->username);
        

        if (null != $this->di->session->get("loggedInUserName")) {
            $page->add("user/dashboard", [
                "content" => "An index page",
                "user" => $res ?? null,
                "allQuestions" => $allQuestions ?? null,
                "allAnswers" => $allAnswers ?? null,
            ]);
        } else {
            $this->di->get("response")->redirect("user/login")->send();
        }

        return $page->render([
            "title" => "A index page",
        ]);
    }
    public function indexActionPost() 
    {
        $logout = $this->di->get("request")->getPost("logout");
        if ($logout) {
            $this->di->session->set("loggedInUserName", null);
            $this->di->get("response")->redirect("user")->send();
        }
    }


    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function loginAction() : object
    {
        if (null != $this->di->session->get("loggedInUserName")) {
            $this->di->get("response")->redirect("user")->send();
        } 
        $page = $this->di->get("page");
        $form = new UserLoginForm($this->di);
        $form->check();

        $page->add("user/login", [
            "content" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "A login page",
        ]);
    }


public function contributionsActionGet(string $username = null) : object
    {
        $page = $this->di->get("page");
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $res = $user->findUser($username);

        $questions = new Question();
        $questions->setDb($this->di->get("dbqb"));
        $allQuestions = $questions->findQuestionsForUser($res->username);

        $answers = new Answer();
        $answers->setDb($this->di->get("dbqb"));
        $allAnswers = $answers->findAllWhere("user = ?", $user->username);

        $page->add("user/contributions", [
            "content" => "An index page",
            "user" => $res ?? null,
            "allQuestions" => $allQuestions ?? null,
            "allAnswers" => $allAnswers ?? null,
        ]);
        
        return $page->render([
            "title" => "A index page",
        ]);
    }


    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function createAction() : object
    {
        $page = $this->di->get("page");
        $form = new CreateUserForm($this->di);
        $form->check();

        $page->add("anax/v2/article/default", [
            "content" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "A create user page",
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
        $form = new UpdateUserForm($this->di, $id);
        $form->check();

        $page->add("user/update", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Update an item",
        ]);
    }
}
