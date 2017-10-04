<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Sender - Web panel';
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

        <p class="lead">Отправка сообщений</p>


        <!-- Form: Sender  -->

        <?php $form = ActiveForm::begin(); ?>

        <table id = "AddForm" border="1">

            <tr>
                <td>
                    Выбрать абонента:
                </td>
                <td>
                    <?= $form->field($model, 'abnId') ?>
                </td>

            </tr>

            <tr>
                <td>
                    Выбрать список:
                </td>
                <td>
                    <?= $form->field($model, 'lstId') ?>
                </td>

            </tr>


            <tr>
                <td>
                    Сообщение:
                </td>
                <td>
                    <?= $form->field($model, 'text') ?>
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <?= 'Дебаг: ' ?>
                    <?= var_dump($errMes) ?>
                </td>
            </tr>

        </table>


        <?php ActiveForm::end(); ?>
        <br/><br/><br/><br/>





        <form action="index.php?r=sender%2Fsend-msg" method="post">

        <table id = "AddForm" border="1">

            <tr>
                <td>
                    Выбрать абонента:
                </td>
                <td>
                    <select>

                        <?php foreach ($abonents as $abn): ?>

                        <option name="abnId" value="<?= $abn->id ?>"><?= $abn->name ?> - <?= $abn->contact ?></option>

                        <?php endforeach; ?>

                    </select>
                </td>

            </tr>

            <tr>
                <td>
                    Выбрать список:
                </td>
                <td>
                    <select>
                        <?php foreach ($lists as $lst): ?>

                            <option name="lstId" value="<?= $lst->id ?>"><?= $lst->name ?> </option>

                        <?php endforeach; ?>
                    </select>
                </td>

            </tr>


            <tr>
                <td>
                    Сообщение:
                </td>
                <td>
                    <textarea name="text" rows="5" cols="35"></textarea>
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </td>

            </tr>

        </table>

        </form>



    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2></h2>

                <p></p>

                <!--<p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->

            </div>

        </div>

    </div>
</div>
