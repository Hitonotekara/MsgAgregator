<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Inflector;

$this->title = 'Main manager';
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

        <table border="1">

            <hr>
                <td>
                    ID
                </td>
                <td>
                    Имя
                </td>
                <td>
                    Описание
                </td>
                <td>
                    Контакт
                </td>
                <td>
                    Действие
                </td>
                <td>
                    Удаление
                </td>
            </hr>

            <?php foreach ($entitys as $ent): ?>

                <tr>
                    <td>
                        <?= $ent->id ?>
                    </td>
                    <td>
                    <a href="index.php?r=manager%2Fedit-abonent&id=<?= $ent->id ?>">
                        <?= $ent->name ?>
                    </a>
                    </td>
                    <td>
                        <?= $ent->description ?>
                    </td>
                    <td>
                        <?= $ent->contact ?>
                    </td>
                    <td>
                        <a class="btn btn-default" style="font-size: 10px; background: #99ff5f" href="index.php?r=manager%2Findex">Редактировать</a>
                    </td>
                    <td>
                        <a class="btn btn-default" style="font-size: 10px; background: #ffa0a8 " href="index.php?r=manager%2Findex">Удалить</a>
                    </td>
                </tr>

            <?php endforeach; ?>

            <tr>
                <form>
            <td>
                <input name="id" value="" size="4">
            </td>
            <td>
                <input name="name" value="" size="25">
            </td>
            <td>
                <input name="description" value="" size="35">
            </td>
            <td>
                <input name="contact" value="" size="15">
            </td>
            <td>
                <a class="btn btn-default" style="font-size: 10px; background: #ffe347" href="index.php?r=manager%2Findex">Добавить</a>
            </td>
            <td>

            </td>
                </form>
            </tr>

        </table>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2></h2>

                <p></p>

                <p>
                    <a class="btn btn-default" style="background: #189eff;" href="index.php?r=manager%2Findex">Обратно</a>
                    <!-- <a class="btn btn-default" style="background: #ffe347" href="index.php?r=manager%2Findex">Добавить</a> -->

                </p>
            </div>

        </div>

    </div>
</div>
