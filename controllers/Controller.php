<?php

namespace app\controllers;

use app\model\Menu;
use app\model\Users;
use app\engine\Render;
use app\interfaces\IRenderer;
use app\model\Basket;
use app\model\Admin;

class Controller {

    private $action;
    private $defaultAction = 'index';
    private $defaultLayout = 'main';
    private $useLayout = true;
    private $renderer;

    public function __construct(IRenderer $renderer) {
        $this->renderer = $renderer;
    }

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
                'header' => $this->renderTemplate('header', [
                    'menu' => Menu::getAll(),
                    'count' => Basket::getCountWhere('id_session', session_id()),
                    'isAdmin' => Admin::isAdmin()
                    ]),
                'form' => $this->renderTemplate('form', [
                    'authorization' => Users::isAuth(),
                    'name' => Users::getName()
                ]),
                'content' => $this->renderTemplate($template, $params),
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }
}