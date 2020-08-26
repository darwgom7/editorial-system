<?php
class SessionController
{
    public function setCurrentUser($user)
    {
        $_SESSION['user'] = ['nick' => $user->getNick(), 'loggedin' => false];
    }
    public function getCurrentUser()
    {
        return $_SESSION['user'];
    }
    public function startSession()
    {
        session_start();
    }
    public function closeSession()
    {
        session_unset();
        session_destroy();
    }
}
?>
