<?php
require_once($_SERVER['DOCUMENT_ROOT']."/site/model/interfaceDB/IDataBase.php");
require_once($_SERVER['DOCUMENT_ROOT']."/site/model/Database.php");

class User implements IDataBase{
    
    private $login;
    private $pwd;
    private $lastname;
    private $firstname;
    private $mail;
    private $logo;
    
    public function __construct($login, $pwd, $lastname, $firstname, $mail, $logo){
        $this->setLogin($login);
    	$this->setPwd($pwd);
    	$this->setLastName($lastname);
    	$this->setFirstName($firstname);
    	$this->setMail($mail);
    	$this->setLogo($logo);
    }
    
    /**
     * Add an user to the database
     * @param User $object The user to add
     */
    public static function addDB($object) {
        $bdd = Database::connect();
        $req = $bdd->prepare('INSERT INTO User(login, pwd, lastname, firstname, mail, logo) VALUES(:login, :pwd, :lastname, :firstname, :mail, :logo)');
        $req->execute(array(
            'login' => $object->getLogin(),
            'pwd' => $object->getPwd(),
            'lastname' => $object->getLastName(),
            'firstname' => $object->getFirstName(),
            'mail' => $object->getMail(),
            'logo' => $object->getLogo()
            ));
    }

    /**
     * Get an user from the database using his login
     * @param int $id Login of the user wanted
     */
    public static function getDB($id) {
        $bdd = Database::connect();
        
        $reponse = $bdd->query('SELECT * FROM User WHERE login = \''.$id.'\'');
        $donnees = $reponse->fetch();
        $user = new User($id, $donnees['pwd'], $donnees['lastname'], $donnees['firstname'], $donnees['mail'], $donnees['logo']);
        $reponse->closeCursor();
        return $user;
    }
        

    /**
     * Modify user data in the database
     * @param User $object The user to modify
     */
    public static function modifyDB($object) {
        $bdd = Database::connect();
        
        $req = $bdd->prepare('UPDATE User SET pwd = :pwd, lastname = :lastname, firstname = :firstname, mail = :mail, logo = :logo WHERE login = :login');
        $req->execute(array(
            'login' => $object->getLogin(),
            'pwd' => $object->getPwd(),
            'lastname' => $object->getLastName(),
            'firstname' => $object->getFirstName(),
            'mail' => $object->getMail(),
            'logo' => $object->getLogo()
            ));
    }

    /**
     * Delete the given user from the database
     * @param User $object The user to delete
     */
    public static function removeDB($object) {
        $bdd = Database::connect();
        //update some table using the user reference that we still want in the DB ; point to the default user "undefined"
        $bdd->exec('UPDATE DesignPattern SET login = "undefined" WHERE login = \''.$object->getLogin().'\'');
        $bdd->exec('UPDATE Conflit SET login = "undefined" WHERE login = \''.$object->getLogin().'\'');
        $bdd->exec('UPDATE Solution SET login = "undefined" WHERE login = \''.$object->getLogin().'\'');
        //delete
        $bdd->exec('DELETE FROM NoteDesignPattern WHERE login = \''.$object->getLogin().'\''); //delete user notes on dp
        $bdd->exec('DELETE FROM CommentDesignPattern WHERE login = \''.$object->getLogin().'\''); //delete user comments
        $bdd->exec('DELETE FROM Project WHERE login = \''.$object->getLogin().'\''); //delete user projects
        $bdd->exec('DELETE FROM CommentConflit WHERE login = \''.$object->getLogin().'\''); //delete user comments on conflicts
        $bdd->exec('DELETE FROM CommentSolution WHERE login = \''.$object->getLogin().'\''); //delete user comments on solutions
        $bdd->exec('DELETE FROM NoteSolution WHERE login = \''.$object->getLogin().'\''); //delete user notes on solutions
        $bdd->exec('DELETE FROM User WHERE login = \''.$object->getLogin().'\''); //delete User
    }
    
    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getPwd(){
        return $this->pwd;
    }

    public function setPwd($pwd){
        $this->pwd = $pwd;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
    }

    public function getFirstName(){
        return $this->firstname;
    }

    public function setFirstName($firstname){
        $this->firstname = $firstname;
    }

    public function getMail(){
        return $this->mail;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

    public function getLogo(){
        return $this->logo;
    }

    public function setLogo($logo){
        $this->logo = $logo;
    }

}

?>
