<?php
$GLOBALS['asyncRequest'] = true;
require_once '../controllers/UserController.php';
require_once '../controllers/SessionController.php';
require_once '../core/configApp.php';
if (
    isset($_POST['nick']) &&
    !empty($_POST['nick']) &&
    isset($_POST['pass']) &&
    !empty($_POST['pass'])
) {
    $userController = new UserController();
    $user = new UserModel();
    $user->setNick($_POST['nick']);
    $user->setPass($_POST['pass']);
    $response = $userController->login($user);
    if ($response) {
        $session = new SessionController();
        $session->startSession();
        $session->setCurrentUser($user);
        echo json_encode(['response' => $response, 'root' => ROOT_URL]);
    } else {
        echo json_encode($response);
    }
}
?>
