<?php
if ($asyncRequest) {
    require_once '../dao/daoimpl/ViewDAO.php';
} else {
    require_once './dao/daoimpl/ViewDAO.php';
}
class ViewController extends ViewDAO
{
    public function getTemplateController()
    {
        return require_once './views/template.php';
    }
    public function getViewController()
    {
        if (isset($_GET['views'])) {
            $route = explode('/', $_GET['views']);
            $response = self::getViewDAO($route[0]);
        } else {
            $response = 'client';
        }
        return $response;
    }
}
?>
