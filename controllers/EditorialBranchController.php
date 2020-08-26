<?php
if ($asyncRequest) {
    require_once '../dao/daoimpl/EditorialBranchDAO.php';
} else {
    require_once './dao/daoimpl/EditorialBranchDAO.php';
}
class EditorialBranchController extends EditorialBranchDAO
{
    public function readController()
    {
        return self::read();
    }
}
?>
