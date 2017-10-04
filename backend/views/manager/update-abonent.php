<?php

/* @var $this yii\web\View */

// use yii\helpers\Inflector;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\grid\GridView;
use yii\grid\ActionColumn;

$this->title = 'Update Abonent';



$renderCall = function ($string) {
    return $string;
}

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


        <!-- Form: Add Abonent  -->

        <?php $form = ActiveForm::begin(); ?>

        <table id = "AddForm" border="1">

            <tr>
                <td>
                    <?= $form->field($model, 'name') // ->render($renderCall($entity->contact)) // ($entity->name) { return }) ?>
                    <?= $entity->name ?>
                </td>
                <td>
                    <?= $form->field($model, 'description') ?>
                    <?= $entity->description ?>
                </td>
                <td>
                    <?= $form->field($model, 'contact') ?>
                    <?= $entity->contact ?>
                </td>
                <td>
                    <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>
                </td>
            </tr>

        </table>
        <br/>

        <?php ActiveForm::end(); ?>



        <!-- // Form: Add Abonent  -->
        </div>
