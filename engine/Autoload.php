<?php

namespace app\engine;

class Autoload {

    public function loadClass($className) {
        $fileName = str_ireplace('app', '..', $className) . ".php";
        $fileName = str_ireplace('\\', '/', $fileName);
        if (file_exists($fileName)) {
            include $fileName;
        }   
    }
}