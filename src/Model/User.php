<?php

/**
 * @copyright Anthony Alves 
 * @link www.anthonyalves.fr
 */

namespace Src\Model;

use Src\Entity\EntityUser;

/**
 * This Class it's for User.
 * he manages everything user
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class User extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityUser();
        $this->table = 'user';
    }

    function loginUser()
    {
        if (isset($_POST)) {
            if (isset($_POST['email']) && isset($_POST['password'])) {



                /* SECURE V POST WITH HTMLSPECIALCHARS */
                $email = \htmlspecialchars($_POST['email']);
                $password = \htmlspecialchars($_POST['password']);

                /* FIND USER ON DATABASE */
                $user = (new User())->findEmail($email);


                if (!empty($user)) {

                    /* ENCRYPT PASSWORD FOR VERIFICATION */
                    $encryptpassword = (new User())->encryptPassword($password);

                    /* VERIF PASSWORD IS SAME ON DATABASE */
                    if ($encryptpassword == $user[0]->getPassword()) {

                        /* INIT SESSION USER */
                        $_SESSION['connect'] = 1;
                        $_SESSION['user'] = $user[0];

                        header('location: /');
                    } else {
                        $_SESSION["ERROR"] = "Error : User exist on database or password is not correct";
                    }
                } else {
                    $_SESSION["ERROR"] = "Error : User exist on database or password is not correct";
                }
            } else {
                $_SESSION["ERROR"] = "Error : password and email is require";
            }
        } else {
            unset($_SESSION['ERROR']);
            unset($_SESSION['SUCCESS']);
        }
    }

    /**
     * ADD NEW USER
     *
     * @return void
     */
    function addUser()
    {

        if (!empty($_POST)) {

            if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["retry-password"]) && isset($_POST['captcha'])) {

                /* SECURE V POST WITH HTMLSPECIALCHARS */
                $firstname = \htmlspecialchars($_POST["firstname"]);
                $lastname = \htmlspecialchars($_POST["lastname"]);
                $email = \htmlspecialchars($_POST["email"]);
                $password = \htmlspecialchars($_POST["password"]);
                $retypassword = \htmlspecialchars($_POST["retry-password"]);
                $captcha = \htmlspecialchars($_POST['captcha']);
                /* TEST EMAIL EXIST */
                $this->verifEmailExistAndFormat($email);
                /* TEST PASSWORD IS EGUAL TO PASSWORD RETRY */
                $this->verifPassword($password, $retypassword);
                /* TEST CAPTCHA IS VALID */
                $this->verifcaptcha($captcha);
                /* TEST TERMS AND CONDITIONS IS CHECKED */
                $this->verifConditionChecked();

                if (!isset($_SESSION["ERROR"])) {

                    /* ENCRYPT PASSWORD */
                    $password = $this->encryptPassword($password);

                    /* DEFINE DEFAULT VALUE */
                    $avatar = "/images/user/user.jpg";
                    $roles = "[\"ROLE_USER\"]";
                    $banned = 0;
                    $active = 0;
                    $createdat = date_create('now')->format('Y-m-d H:i:s');


                    $stmt = $this->dbConnect()->prepare("INSERT INTO $this->table(`id`,`firstname`, `lastname`, `email`, `roles`, `password`, `avatar`, `createdat`, `actived`, `banned`) VALUES (NULL,?,?,?,?,?,?,?,?,?)");
                    $stmt->execute([$firstname, $lastname, $email, $roles, $password, $avatar, $createdat, $active, $banned]);

                    $_SESSION["SUCCESS"] = 'Success : Account is created';
                }
            } else {
                $_SESSION["ERROR"] = 'Error : all input is require';
            }
        } else {
            unset($_SESSION["ERROR"]);
            unset($_SESSION["SUCCESS"]);
        }
    }


    /**
     * FIND EMAIL
     * @param string $email
     * @return void
     */
    function findEmail($email)
    {
        $list = [];

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE email = ?");
        $stmt->execute([$email]);
        $items = $stmt->fetchAll();


        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }


    /**
     * VERIF FORMAT AND IF EMAIL EXIST ON DATABASE
     * @param string $email
     * @return void
     */
    function verifEmailExistAndFormat($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $_SESSION["ERROR"] = 'Error : Enter Valid email';
        }

        $emailexist = $this->findEmail($email);

        if (!empty($emailexist)) {
            return $_SESSION["ERROR"] = 'Error : Your Email is allready exist';
        }
    }


    /**
     * VERIF EMAIL FORMAT
     * @param string $email
     * @return void
     */
    function verifEmailFormat($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $_SESSION["ERROR"] = 'Error : Enter Valid email';
        }
    }

    /**
     * VERIF PASSWORD IS SAME
     * @param string $password
     * @param string $verif_password
     * @return void
     */
    function verifPassword($password, $verif_password)
    {
        if ($password != $verif_password) {
            return $_SESSION["ERROR"] = 'Error : password dont match';
        }
    }

    /**
     * VERIF IS CONDITIONS AND TERM IS CHECKED
     *
     * @return void
     */
    function verifConditionChecked()
    {
        if (!isset($_POST['terms-accepted'])) {
            return $_SESSION["ERROR"] = 'Error : you have dont accept term and conditions';
        }
    }
}
