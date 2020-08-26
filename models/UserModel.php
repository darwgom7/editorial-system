<?php
class UserModel
{
    private $id;
    private $name;
    private $lastname;
    private $nick;
    private $pass;
    public function __cosntruct($id, $name, $lastname, $nick, $pass)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->nick = $nick;
        $this->pass = $pass;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function getNick()
    {
        return $this->nick;
    }
    public function setNick($nick)
    {
        $this->nick = $nick;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }
}
