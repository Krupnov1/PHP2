<?php

namespace app\controllers;

use app\model\Menu;

class Controller {

    private $action;
    private $defaultAction = 'index';
    private $defaultLayout = 'main';
    private $useLayout = true;

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        }
    }
    
    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->defaultLayout}", [
                'title' => $this->renderTemplate('title', $params),
                'header' => $this->renderTemplate('header', Menu::getAll()),
                'form' => $this->renderTemplate('form', $params),
                'content' => $this->renderTemplate($template, $params),
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }
    
    public function renderTemplate($template, $params = []) {
        
        ob_start();
        if (!is_null($params)) {
            extract($params);
        }
        $templatePath = TEMPLATE_DIR . $template . ".php";
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean(); 
    }
}