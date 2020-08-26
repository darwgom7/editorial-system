<?php
if ($asyncRequest) {
    require_once '../dao/daoimpl/UserDAO.php';
} else {
    require_once './dao/daoimpl/UserDAO.php';
}
class UserController extends UserDAO
{
    public function loginController()
    {
        self::setNick('Nicky');
        return self::getNick();
    }
}
?>
