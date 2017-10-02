<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Inflector;

$this->title = 'Main manager';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1></h1>

        <p class="lead">Управление основными сущностями</p>

    <ul>

    <?php

    //echo '<br/>555 - ' . var_dump($entitys). ' - <br/>';
    // <?= Html::encode("{$ent->entity}") ? >

    foreach ($entitys as $ent): ?>

        <li><a href="index.php?r=manager%2Fview-<?= Inflector::camel2id($ent->entity) ?>&ent=<?= $ent->entity ?>">

                    <?= Html::encode("{$ent->title}") ?>

            </a>
        </li>
        <?php endforeach; ?>

    </ul>

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
