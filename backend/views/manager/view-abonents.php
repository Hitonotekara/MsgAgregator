<?php

/* @var $this yii\web\View */

// use yii\helpers\Inflector;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\grid\GridView;
use yii\grid\ActionColumn;

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

    #AddForm .btn btn-primary{
        font-size: 10px;
        border: 10px;
    }


</style>

<div class="site-index">

    <div class="jumbotron">
        <h1></h1>

        <!-- Header  -->
        <p class="lead" style="font-size: 26px; font-weight: bold;"> <?= is_object($entinfo) ? $entinfo->title : '' ?></p>
        <br/>
        <!-- // Header  -->


        <!-- Form: Add Abonent  -->

        <?php $form = ActiveForm::begin(); ?>

        <table id = "AddForm" border="1">

            <tr>
                    <td>
                        <?= $form->field($model, 'name') ?>
                    </td>
                    <td>
                        <?= $form->field($model, 'description') ?>
                    </td>
                    <td>
                        <?= $form->field($model, 'contact') ?>
                    </td>
                    <td>
                        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
                    </td>
            </tr>

        </table>
        <br/>

        <?php ActiveForm::end(); ?>

        <!-- // Form: Add Abonent  -->

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
                        'template' => '{update} &nbsp;&nbsp;|&nbsp;&nbsp; {delete}', //{view}
                        'urlCreator' => function ( $action, $model, $key, $index) use (&$entinfo) {
                            $url = new ActionColumn;
                            //$action = $action . '-abonent' . '&ent=' . (is_object($entinfo) ? $entinfo->entity : '') ;
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
