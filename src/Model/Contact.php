<?php

/**
 * @copyright Anthony Alves 
 * @link www.anthonyalves.fr
 */

namespace Src\Model;

use Src\Entity\EntityContact;

/**
 * This Class it's for Video.
 * he manages everything video
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class Contact extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityContact();
        $this->table = 'contact';
    }


    /**
     * ADD NEW MESSAGE ON DATA BASE
     * @return void
     */
    function addMessage()
    {
        if (!empty($_POST)) {

            /* TEST FORM IS VALID AND SUBMIT */
            if (isset($_POST["email"]) && isset($_POST["select"]) && isset($_POST["content"]) && isset($_POST["captcha"])) {

                /* SECURE VARIABLE POST WITH HTMLSPECIALCHARS */

                $email = \htmlspecialchars($_POST["email"]);
                $select = \htmlspecialchars($_POST["select"]);
                $content = \htmlspecialchars($_POST["content"]);
                $captcha = \htmlspecialchars($_POST["captcha"]);

                /* TEST EMAIL IS VALID */
                $this->verifEmailFormat($email);

                /* TEST SUBJECT EXIST */
                $this->verifSubjectExist();
                /* TEST CONTENT EXIST */
                $this->verifContentExist();

                /* TEST CAPTCHA */
                $this->verifcaptcha($captcha);


                if (!isset($_SESSION['ERROR'])) {

                    $stmt = $this->dbConnect()->prepare("INSERT INTO $this->table(`email`, `subject`, `content`) VALUES (?,?,?)");
                    $stmt->execute([$email, $select, $content]);

                    return $_SESSION["SUCCESS"] = "Success : Your message as been sended";
                }
            } else {
                return $_SESSION["ERROR"] = 'Error : Please enter all informations';
            }
        } else {
            unset($_SESSION['ERROR']);
            unset($_SESSION['SUCCESS']);
        }
    }


    /**
     * VERIF FORM SUBJECT EXIST
     * @return void
     */
    function verifSubjectExist()
    {
        if (!isset($_POST['select'])) {
            return $_SESSION["ERROR"] = 'Error : Please select subject';
        }
    }


    /**
     * VERIF FORM CONTENT EXIST
     * @return void
     */
    function verifContentExist()
    {
        if (!isset($_POST['content'])) {
            return $_SESSION["ERROR"] = 'Error : content is empty';
        }
    }
}
