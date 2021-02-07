<?php

namespace app\controllers;

use app\engine\Request;
use app\model\Products;
use app\model\repositories\ProductsRepository;

class ProductController extends Controller {


    public function actionIndex() {
        echo $this->render('index', [
            'title' => 'Главная'
        ]); 
    }
    
    public function actionCatalog() {
        $request = new Request();
        $page = $request->getParams()['page'] ?: 0;
        $catalog = (new ProductsRepository())->getLimit(($page + 1) * PRODUCT_PER_PAGE);
        //$catalog = Products::getAll();
        echo $this->render('catalog', [
           'catalog' => $catalog,
           'page' => ++$page,
           'title' => 'Каталог'
        ]); 
    }

    public function actionCard() {
        $request = new Request();
        $id = $request->getParams()['id'];
        $good = (new ProductsRepository())->getOne($id);
        echo $this->render('card', [
            'good' => $good,
            'title' => 'Карточка товара',
        ]);
    }
}