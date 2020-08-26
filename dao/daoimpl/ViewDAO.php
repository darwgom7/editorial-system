<?php
class ViewDAO
{
    protected function getViewDAO($view)
    {
        $whiteList = ['home', 'editorialBranch', 'dev'];
        if (in_array($view, $whiteList)) {
            if (is_file('./views/contents/' . $view . '.php')) {
                $contet = './views/contents/' . $view . '.php';
            } else {
                $contet = 'client';
            }
        } elseif ($view == 'client') {
            $contet = 'client';
        } elseif ($view == 'index') {
            $contet = 'client';
        } else {
            $contet = 'client';
        }
        return $contet;
    }
}
?>
