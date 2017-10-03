<?php

/* @var $this yii\web\View */

// use yii\helpers\Html;
// use yii\helpers\Inflector;

use yii\grid\GridView;

$this->title = 'Abonents';
?>

<style type="text/css">

    table tr td {
        padding: 5px 10px 5px 10px;
        text-align: left;
    }

    table hr td {
        font-size: 12px;
        font-weight: bold;
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
                        'template' => '{view} -- {update} -- {delete}',
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
