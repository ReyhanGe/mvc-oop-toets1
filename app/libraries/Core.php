<?php

class Core
{
    //properties
    public $currentController = 'Landingpages';
    public $currentMethod = 'index';
    public $param = [];

    public function __construct()
    {
        $url = $this->getURL();

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->currentController . '.php';   // echo $this->currentController;

        $this->currentController = new $this->currentController();

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->param = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->param);
    }

    public function getURL()
    {
        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);

            $url = explode('/', $url);

            return $url;
        } else {
            return array('Landingpages', 'index');
        }
    }
}
?>