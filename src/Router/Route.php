<?php

namespace App\Router;

class Route {

    private $path;
    private $callable;
    private $matches;

    public function __construct($path, $callable) {

        $this->path = trim($path, '/');
        $this->callable = $callable;

    }

    public function match($url) {
        // remove '/'
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        //watch if url = path
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }

        // Delete the first element of matches array
        array_shift($matches);

        $this->matches = $matches;

        return true;

    }

    public function call() {

        return call_user_func_array($this->callable, $this->matches);

    }

}