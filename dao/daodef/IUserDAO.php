<?php require_once 'IGenericDAO.php';
interface IUserDAO extends IGenericDAO
{
    public function findUserById($object);
}
