<?php require_once 'IGenericDAO.php';
interface IEditorialBranchDAO extends IGenericDAO
{
    public function findEditorialBranchById($object);
}
