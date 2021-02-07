<?php

namespace app\controllers;

use app\model\Menu;
use app\model\Users;
use app\engine\Render;
use app\interfaces\IRenderer;
use app\model\Basket;
use app\model\Admin;
use app\model\repositories\AdminRepository;
use app\model\repositories\BasketRepository;
use app\model\repositories\MenuRepository;
use app\model\repositories\UsersRepository;

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
                    'authorization' => (new UsersRepository())->isAuth(),
                    'name' => (new UsersRepository())->getName()
                ]),
                'navigation' => $this->renderTemplate('navigation', [
                    'menu' => (new MenuRepository())->getAll(),
                    'count' => (new BasketRepository())->getCountWhere('id_session', session_id()),
                    'isAdmin' => (new AdminRepository())->isAdmin()
                    ]),
                'content' => $this->renderTemplate($template, $params),
                'footer' => $this->renderTemplate('footer', $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }
}