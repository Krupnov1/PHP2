<?php

namespace app\controllers;

use app\model\Feedback;

class ReviewsController extends Controller {

    public function actionAll() {
        //$reviews = Feedback::getBasketCatalog();
        echo $this->render('reviews', [
           //'reviews' => $reviews,
           'title' => 'Отзывы',
           'buttonText' => 'Добавить'
        ]); 
    }
} 