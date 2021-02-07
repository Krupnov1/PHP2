<?php

namespace app\controllers;

use app\model\repositories\ReviewsRepository;

class ReviewsController extends Controller {

    public function actionAll() {
        //$reviews = (new ReviewsRepository())->getBasketCatalog();
        echo $this->render('reviews', [
           //'reviews' => $reviews,
           'title' => 'Отзывы',
           'buttonText' => 'Добавить'
        ]); 
    }
} 