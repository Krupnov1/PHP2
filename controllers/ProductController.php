<?php

namespace app\controllers;


use app\model\Products;

class ProductController extends Controller {


    public function actionIndex() {
        echo $this->render('index', [
            'title' => 'Главная'
        ]); 
    }
    
    public function actionCatalog() {
        $page = $_GET['page'] ?: 0;
        $catalog = Products::getLimit(($page + 1) * PRODUCT_PER_PAGE);
        //$catalog = Products::getAll();
        echo $this->render('catalog', [
           'catalog' => $catalog,
           'page' => ++$page,
           'title' => 'Каталог'
        ]); 
    }

    public function actionCard() {
        $id = $_GET['id'];
        $good = Products::getOne($id);
        echo $this->render('card', [
            'good' => $good,
            'title' => 'Карточка товара',
        ]);
    }
}