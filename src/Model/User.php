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
        }

        unset($_SESSION['ERROR']);
        unset($_SESSION['SUCCESS']);
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
                    $avatar = "images/user/1.png";
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

    function updateProfile()
    {

        if (isset($_POST)) {

            if (isset($_POST['actual-password'])) {

                $password = $_SESSION['user']->getPassword();
                $encryptedpassword = (new User())->encryptPassword($_POST['actual-password']);
                $this->verifPassword($password, $encryptedpassword);

                if (!isset($_SESSION['ERROR'])) {

                    if (!empty($_POST['firstname'])) {
                        if (strlen($_POST['firstname']) > 3) {
                            $firstname = \htmlspecialchars($_POST['firstname']);
                            $this->updateInfo('firstname', $_SESSION['user']->getId(), $_POST['firstname']);
                            $_SESSION['user']->setFirstname($firstname);
                            $_SESSION["SUCCESS"] = 'Success : Your information is updated';
                        } else {
                            return $_SESSION["ERROR"] = 'Error : Please enter minimum 3 charactere';
                        }
                    }

                    if (!empty($_POST['lastname'])) {
                        if (strlen($_POST['lastname']) > 3) {
                            $lastname = \htmlspecialchars($_POST['lastname']);
                            $this->updateInfo('lastname', $_SESSION['user']->getId(), $_POST['lastname']);
                            $_SESSION['user']->setLastname($lastname);
                            $_SESSION["SUCCESS"] = 'Success : Your information is updated';
                        } else {
                            return $_SESSION["ERROR"] = 'Error : Please enter minimum 3 charactere';
                        }
                    }

                    if (!empty($_POST['lang'])) {

                        $lang = \htmlspecialchars($_POST['lang']);
                        $this->updateInfo('lang', $_SESSION['user']->getId(), $lang);
                        $_SESSION['user']->setLang($lang);
                        $_SESSION["SUCCESS"] = 'Success : Your information is updated';
                    }

                    if (!empty($_POST['new-password'])) {

                        if ($_POST['new-password'] == $_POST['retry-new-password']) {

                            $password = (new User())->encryptPassword($_POST['new-password']);
                            $this->updateInfo('password', $_SESSION['user']->getId(), $password);
                            $_SESSION['user']->setPassword($password);

                            $_SESSION["SUCCESS"] = 'Success : Your information is updated';
                        } else {
                            return $_SESSION["ERROR"] = 'Error : New password is not same';
                        }
                    }

                    if (!empty($_POST['change-avatar'])) {
                        if ($_POST['change-avatar'] == ("images/user/1.png" || "images/user/2.png" || "images/user/3.png" || "images/user/4.png" || "images/user/5.png" || "images/user/6.png" || "images/user/7.png" || "images/user/8.png" || "images/user/9.png")) {
                            $this->updateInfo('avatar', $_SESSION['user']->getId(), $_POST['change-avatar']);
                            $_SESSION['user']->setavatar($_POST['change-avatar']);
                            $_SESSION["SUCCESS"] = 'Success : Your information is updated';
                        } else {
                            return $_SESSION["ERROR"] = 'Error : Personal image not accepted ';
                        }
                    }
                }
            } else {
                unset($_SESSION["ERROR"]);
                unset($_SESSION["SUCCESS"]);
            }
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
