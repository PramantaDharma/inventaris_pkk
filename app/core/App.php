<?php

class App {
    protected $controller = 'Auth',
              $method = 'index',
              $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // controller
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }else {
                return $this->controller;
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($controller, $url[1])) { // parameter pertama itu harus object, jadinya perlu instansiasi dulu jadi $controller
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params / parameter
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([ $controller, $this->method], $this->params);
    }

    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $urls = explode('/', $url);
            return $urls;
        }
    }

}

