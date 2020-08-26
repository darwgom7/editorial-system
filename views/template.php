<?php
require_once './controllers/ViewController.php';
require_once './controllers/SessionController.php';
$viewController = new ViewController();
$view = $viewController->getViewController();
$session = new SessionController();
$session->startSession();
//if ($view == 'client') {
//   require_once './views/contents/client.php';
//} else {
if (isset($_SESSION['user'])) {

    $_SESSION['user']['loggedin'] = true;

    // Begin dashboard+
    require_once './views/contents/dashboard/pageTop.php';
    require_once './views/contents/dashboard/modal.php';
    ?>
<!--Begin main content-->
<div class="app">
    <?php if ($view !== 'client') {
        require_once $view;
    } 
    
    ?>
    

</div>
<!--End main content-->
<?php require_once './views/contents/dashboard/pageBottom.php';
// End dashboard
} else {
    require_once './views/contents/client.php';
}
//}
?>
