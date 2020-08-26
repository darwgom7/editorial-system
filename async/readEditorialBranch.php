<?php
$GLOBALS['asyncRequest'] = true;
require_once '../controllers/EditorialBranchController.php';
$editorialBranchController = new EditorialBranchController();
echo json_encode($editorialBranchController->read());

?>