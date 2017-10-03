<?php

/* @var $this yii\web\View */

// use yii\helpers\Html;
// use yii\helpers\Inflector;

use yii\grid\GridView;
use yii\grid\ActionColumn;

$this->title = 'Abonents';
?>

<style type="text/css">

    table tr td {
        text-align: left;
    }


</style>

<div class="site-index">

    <div class="jumbotron">
        <h1></h1>

        <p class="lead"> <?= $entinfo->title ?></p>

        <p>
            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [

                    [
                        'attribute' => 'id',
                        'visible' => 1,
                    ],
                    [
                        'attribute' => 'name',
                        'visible' => 1,
                    ],
                    [
                        'attribute' => 'description',
                        'visible' => 1,
                    ],
                    [
                        'attribute' => 'contact',
                        'visible' => 1,
                    ],
                    [
                        'attribute' => 'status',
                        'visible' => 0,
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} &nbsp;&nbsp; {update} &nbsp;&nbsp; {delete}',
                        'urlCreator' => function ( $action, $model, $key, $index) {
                            $url = new ActionColumn;
                            $action = $action . '-abonent';

                            //return string;
                            return $url->createUrl($action, $model, $key, $index);
                        },
                    ],

                ],
    ]);


            ?>
        </p>



    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2></h2>



                <p>
                    <a class="btn btn-default" style="background: #189eff;" href="index.php?r=manager%2Findex">Обратно</a>
                    <!-- <a class="btn btn-default" style="background: #ffe347" href="index.php?r=manager%2Findex">Добавить</a> -->

                </p>
            </div>

        </div>

    </div>
</div>
