<?php
$GLOBALS['asyncRequest'] = true;
require_once '../controllers/SessionController.php';
require_once '../core/configApp.php';

$session = new SessionController();
$session->startSession();
if (isset($_SESSION['user'])) {
    $session->closeSession();
    echo json_encode([
        'root' => ROOT_URL,
    ]);
}

?>
